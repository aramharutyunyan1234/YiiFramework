<?php
/* @var $this MigrationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Migrations',
);

$this->menu=array(
	array('label'=>'Create Migration', 'url'=>array('create')),
	array('label'=>'Manage Migration', 'url'=>array('admin')),
);
?>

<h1>Migrations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
