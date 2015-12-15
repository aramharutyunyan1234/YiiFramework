<?php
/* @var $this MigrationController */
/* @var $model Migration */

$this->breadcrumbs=array(
	'Migrations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Migration', 'url'=>array('index')),
	array('label'=>'Manage Migration', 'url'=>array('admin')),
);
?>

<h1>Create Migration</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>