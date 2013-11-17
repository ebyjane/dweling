<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
	
	public function actionAdvice()
	{
		// renders the view file 'protected/views/site/advice.php'
		$this->render('advice');
	}	
	
	public function actionBuy()
	{
		// renders the view file 'protected/views/site/buy.php'
		$this->render('buy');
	}		
	
	public function actionEvents()
	{
		// renders the view file 'protected/views/site/events.php'
		$this->render('events');
	}	
	
	public function actionAbout()
	{
		// renders the view file 'protected/views/site/about.php'
		$this->render('about');
	}	

	public function actionTerms()
	{
		// renders the view file 'protected/views/site/terms.php'
		$this->render('terms');
	}		
	
	public function actionPrivacy()
	{
		// renders the view file 'protected/views/site/privacy.php'
		$this->render('privacy');
	}	

	public function actionBoxlogin()
	{
		// renders the view file 'protected/views/site/boxlogin.php'
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
			
			echo CHtml::script("parent.location.reload(true);self.close();");
			
			/*window.parent.$('#colorbox').css('display','none');window.parent.$('#cboxOverlay').css('display','none');*/
                Yii::app()->end();

				$this->redirect(Yii::app()->user->returnUrl);
			}	
		}
		// display the login form
		$this->render('boxlogin',array('model'=>$model));		
	}		
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	/**
	 * Registration page
	 *
	 **/
	public function actionRegister()
	{
		$this->setPageTitle(Yii::app()->name . ' | Sign Up');
		$this->layout = '//layouts/main';
		$model = new RegisterForm();
		$user = new Users();
		
		$error = '';
		if (isset($_POST) && !empty($_POST))
		{
			$model->attributes = $_POST['RegisterForm'];
			
			if ($model->validate())
			{
				if (!function_exists('password_hash'))
					require_once YiiBase::getPathOfAlias('ext.bcrypt.bcrypt').'.php';
				
				// Bcrypt the initial password instead of just using the basic hashing mechanism
				$hash = Users::model()->encryptHash(Cii::get($_POST['RegisterForm'], 'email'), Cii::get($_POST['RegisterForm'], 'password'), Yii::app()->params['encryptionKey']);
				$cost = Cii::getBcryptCost();

				$password = password_hash($hash, PASSWORD_BCRYPT, array('cost' => $cost));

				$user->attributes = array(
					'email'=>Cii::get($_POST['RegisterForm'], 'email'),
					'password'=>$password,
					'firstName'=> NULL,
					'lastName'=> NULL,
					'displayName'=>Cii::get($_POST['RegisterForm'], 'displayName'),
					'user_role'=>1,
					'status'=>0
				);
				
				try 
				{
					if($user->save())
					{
						$hash = mb_strimwidth(hash("sha256", md5(time() . md5(hash("sha512", time())))), 0, 16);
						$meta = new UserMetadata;
						$meta->user_id = $user->id;
						$meta->key = 'activationKey';
						$meta->value = $hash;
						$meta->save();
						
						// Send the registration email
						$this->sendEmail($user, 'Activate Your Account', '//email/register', array('user' => $user, 'hash' => $hash), true, true);
					
						$this->redirect('/register-success');
						return;
					}
				}
				catch(CDbException $e) 
				{
					$model->addError(null, 'The email address has already been associated to an account. Do you want to login instead?');
				}
			}
		}

		$this->render('register', array('model'=>$model, 'error'=>$error, 'user'=>$user));
	}

	/**
	 * Handles successful registration
	 */
	public function actionRegistersuccess()
	{
		$this->setPageTitle(Yii::app()->name . ' | Registration Successful');
		$this->layout = '//layouts/main';
		$this->render('register-success');
	}	
}