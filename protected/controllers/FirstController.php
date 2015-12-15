<?php

class FirstController extends Controller
{
	public function actionIndex(){

		$oMigration = new Migration();
		$migr_select = $oMigration->select();
		$this->render('index',array('migr_selects'=>$migr_select));

	}

	public function actionDelete(){


//		$request = Yii::$app->request;
		$id = $_POST['id'];

		$this->loadModel($id)->delete();

		/*if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/


		echo 1;die;

	}

	public function loadModel($id)
	{
		$model=Migration::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionCreate()
	{
		$model=new Migration();


		//

		if(isset($_POST['test']))
		{

			$add = $model->add($_POST['test']);
			$this->redirect('index');
		}
	}









}