<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Advice';
$this->breadcrumbs=array(
	'Advice',
);
?>
<div class="row">
    	<div class="large-8 small-12 columns content-wrap">
        	<div class="content-part advice-wrap">
        		<form>
                      <label>Ask for Advice !</label>
                     <div class="row">
                          <div class="large-10 small-10 columns">
                          <input type="text" placeholder="Ask for Advice..." />
                       </div>
                        <div class="large-2 small-2 columns ask-btn">
                        	<input type="submit" class="button prefix" value="Ask" />
                        </div>
                    </div>
                </form>
            </div>
            
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/advice1.jpg" style="margin-top:15px" />
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/advice1.jpg" style="margin-top:15px" />
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/advice1.jpg" style="margin-top:15px" />
            
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
    <!-- content part ends here -->
