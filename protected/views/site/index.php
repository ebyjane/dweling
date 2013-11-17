<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>





<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Dweling Home';
$this->breadcrumbs=array(
	'Dweling Home',
);
?>
<div class="row">
    	<div class="large-8 small-12 columns content-wrap">
        	<div class="content-part advice-wrap">
        		<form>
                      <label>Home</label>
<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
                </form>
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
