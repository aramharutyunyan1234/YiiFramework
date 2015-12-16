<?php

class OrdersController extends Controller
{
	public function actionIndex($id=null){

		$model = new Orders();
		$max_id = $model->max_id();

		if(is_numeric($id) || is_null($id)){
			if(empty($id)){
				$migr_select = $model->select();
			}else{
				$migr_select = $model->select_where($id);
			}
		}
		$this->render('index',array('migr_selects'=>$migr_select,'max_id'=>$max_id,'order_id'=>$id));
	}

	public function actionDelete(){

		//$id = $_POST['id'];
		$id = Yii::app()->request->getPost('id');
		$this->loadModel($id)->delete();
		echo 1;die;
	}

	public function loadModel($id)
	{
		$model = Orders::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionCreate()
	{

		$model = new Orders();
		if(isset($_POST['test']))
		{
			$add = $model->add($_POST['test']);
			$this->redirect('orders');
		}
	}

	public function actionOrders($order_id=null)
	{

		$model = new Orders();
		$all_orders = $model->select_orders();

		if(isset($_POST['new_order'])){
			$new_order_id = $_POST['new_order'];
			$old_order_id = $_POST['old_order'];
			$model->edit_orders($new_order_id,$old_order_id);
			die;
		}
		$max_id = $model->max_id();
		$this->render('orders',array('all_orders'=>$all_orders,'max_id'=>$max_id));
	}

	public function actionEdit($id)
	{
		$model = new Orders();

		$order_id = Yii::app()->request->getPost('order_id');
		$price = Yii::app()->request->getPost('price');
		$description = Yii::app()->request->getPost('description');
		$available = Yii::app()->request->getPost('available');

		$data = array('description'=>$description,
					'order_id' => $order_id,
					'price' => $price,
					'description' => $description,
					'available' => $available
		);

		if(Yii::app()->request->isPostRequest){
			$model->edit($data,$id);
		}
		$editOrders = $model->selectFromId($id);
		$this->render('edit',array('editOrders'=>$editOrders));
	}
}