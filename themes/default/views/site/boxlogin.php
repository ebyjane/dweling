
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css"  />
	
  	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/custom.modernizr.js"></script>
  	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.0.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.colorbox-min.js"></script>
	
<div class="row">
<div class="large-4 small-12 columns facebook-login">
	<span>Login with your Facebook Account</span>
    <a href="#" class="facebook_connect">Login with your facebook</a>
</div>
<div class="large-8 small-12 columns login-box">

<div class="login-container">
	<div class="">
		<div class="well-span">
		<div class="row">


        	<div class="content-part advice-wrap">
        		<form>
                      <h2>Login</h2>
					  <small>Please fill out the following form with your login credentials:</small>	
					  <p class="note"><i>Fields with <span class="required">*</span> are required.</i></p>
                </form>
            </div>


	
			<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
						'id'					=>	'login-form',
						'focus'					=>'	input[type="text"]:first',
						'enableAjaxValidation'	=>	true
					)); ?>


</div>
				<div class="form">
				
					<?php if (!Yii::app()->user->isGuest): ?>
					<div class="row">
						<div class="alert alert-info" style="margin-top: 20px;">
						  	<button type="button" class="close" data-dismiss="alert">&times;</button>
						  	<strong>Heads Up!</strong> Looks like you're already logged in as <strong><?php echo Yii::app()->user->email; ?></strong>. You should <strong><?php echo CHtml::link('logout', $this->createUrl('/logout')); ?></strong> before logging in to another account.
						</div>
					</div>	
					<?php else: ?>
					
						<?php if ($model->hasErrors()): ?>
						<div class="row">
							<div class="alert alert-error" style="margin-bottom: -5px;">
							  	<button type="button" class="close" data-dismiss="alert">&times;</button>
							  	<strong>Oops!</strong> We weren't able to log you in using the provided credentials.
							</div>
							<br/>
						</div>	
						<?php endif; ?>
						
						<div class="row">
						<?php echo $form->labelEx($model,'username'); ?>
						<?php echo $form->TextField($model, 'username', array('id'=>'email', 'placeholder'=>'Email Address')); ?>
						<?php /*echo $form->error($model,'username');*/ ?>
						</div>
						<div class="row">
						<?php echo $form->labelEx($model,'password'); ?>
						<?php echo $form->PasswordField($model, 'password', array('id'=>'password', 'placeholder'=>'Password')); ?>
						<?php /*echo $form->error($model,'password');*/ ?>
						</div>

					</div>
					<div class="login-form-footer">
						<?php /*echo CHtml::link('register', Yii::app()->createUrl('/register'), array('class' => 'login-form-links'));*/ ?>
						<!--<span class="login-form-links"> | </span>-->
						<?php /*echo CHtml::link('forgot', Yii::app()->createUrl('/forgot'), array('class' => 'login-form-links'));*/ ?>
						<div class="row buttons">
						<?php /*echo CHtml::submitButton('Login',array('class'=>'blue-btn'));*/ ?>
						<?php $this->widget('bootstrap.widgets.TbButton', array(
								'buttonType' => 'submit',
	    	                    'type' => 'success',
	    	                    'label' => 'Login',
	    	                    'htmlOptions' => array(
	    	                        'id' => 'submit-comment',
	    	                        'class' => 'blue-btn',
	    	                        'style' => 'margin-top: 10px;margin-left:15px'
	    	                    )
	    	                )); ?>						
						</div>

    	            <?php endif; ?>
    	            <?php if (Yii::app()->user->isGuest): ?>
	    	            <?php $config = Yii::app()->getModules(false); ?>
	    	            <?php if (count(Cii::get($config, 'hybridauth', array())) >= 1): ?>
	    	            <div class="clearfix" style="border-bottom: 1px solid #aaa; margin: 15px;"></div>
							<span class="login-form-links">Or sign in with one of these social networks</span>
	    	        	<?php endif; ?>
	    	        	<div class="clearfix"></div>
	    	        	<div class="social-buttons">
		    	            <?php foreach (Cii::get(Cii::get($config, 'hybridauth', array()), 'providers', array()) as $k=>$v): ?>
								<?php if (Cii::get($v, 'enabled', false) == 1): ?>
									<?php echo CHtml::link(NULL, $this->createUrl('/hybridauth/'.$k), array('class' => 'social-icons ' . strtolower($k))); ?>
								<?php endif; ?>
		    	        	<?php endforeach; ?>
		    	        </div>
		    	    <?php endif; ?>
				</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
</div>
        </div>
		
        <!-- content part large-8 ends here -->

    </div>
	<style type="text/css">
	.rememberMe input[type="checkbox"] {
	float: left;
	}
	.rememberMe label {
		left: 7px;
		position: relative;
		top: 4px;
	}
	</style>