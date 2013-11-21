<div class="row">
<div class="large-8 small-12 columns content-wrap">
<div class="login-container">
	<div class="">
		<div class="well-span">
		<div class="row">

<?php if (!Yii::app()->user->isGuest): ?>
<?php else: ?>
        	<div class="content-part advice-wrap">
        		<form>
                      <label>Login</label>

                </form>
            </div>
<p>Please fill out the following form with your login credentials:</p>
<p class="note">Fields with <span class="required">*</span> are required.</p>
<?php endif; ?>		
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
						<?php echo $form->error($model,'username'); ?>
						</div>
						<div class="row">
						<?php echo $form->labelEx($model,'password'); ?>
						<?php echo $form->PasswordField($model, 'password', array('id'=>'password', 'placeholder'=>'Password')); ?>
						<?php echo $form->error($model,'password'); ?>
						</div>

					</div>
					<div class="login-form-footer">
						<?php echo CHtml::link('register', Yii::app()->createUrl('/Register'), array('class' => 'login-form-links')); ?>
						<span class="login-form-links"> | </span>
						<?php echo CHtml::link('forgot', Yii::app()->createUrl('/Forgot'), array('class' => 'login-form-links')); ?>
						<?php $this->widget('bootstrap.widgets.TbButton', array(
								'buttonType' => 'submit',
	    	                    'type' => 'success',
	    	                    'label' => 'Submit',
	    	                    'htmlOptions' => array(
	    	                        'id' => 'submit-comment',
	    	                        'class' => 'sharebox-submit pull-right',
	    	                        'style' => 'margin-top: -4px'
	    	                    )
	    	                )); ?>
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

        <div class="large-4 small-12 columns sidebar-wrap">
        	<div class="sidebar">
            	<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add1.jpg" style="margin-bottom:15px" />
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add2.jpg" style="margin-bottom:15px" />
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/add3.jpg" style="margin-bottom:15px" />
            </div>
        </div>
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