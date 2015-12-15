<?php
/* @var $this MigrationController */
/* @var $model Migration */

$this->breadcrumbs=array(
	'Migrations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Migration', 'url'=>array('index')),
	array('label'=>'Create Migration', 'url'=>array('create')),
	array('label'=>'Update Migration', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Migration', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Migration', 'url'=>array('admin')),
);
?>

<h1>View Migration #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_id',
		'price',
		'description',
		'available',
	),
)); ?>
