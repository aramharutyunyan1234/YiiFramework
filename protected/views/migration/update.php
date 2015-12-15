<?php
/* @var $this MigrationController */
/* @var $model Migration */

$this->breadcrumbs=array(
	'Migrations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Migration', 'url'=>array('index')),
	array('label'=>'Create Migration', 'url'=>array('create')),
	array('label'=>'View Migration', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Migration', 'url'=>array('admin')),
);
?>

<h1>Update Migration <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>