<?php

/**
 * This is the model class for table "orders".
 *
 * The followings are the available columns in table 'orders':
 * @property integer $id
 * @property integer $order_id
 * @property integer $price
 * @property string $description
 * @property string $available
 */
class Orders extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'orders';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_id, price', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>255),
			array('available', 'length', 'max'=>2),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_id, price, description, available', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_id' => 'Order',
			'price' => 'Price',
			'description' => 'Description',
			'available' => 'Available',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('order_id',$this->order_id);
		$criteria->compare('price',$this->price);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('available',$this->available,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Orders the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function select($where=null){

		$select = Yii::app()->db->createCommand()
				->select('*')
				->from('orders')

				->queryAll();
		return $select;

	}
	public function select_where($order_id){

		$select = Yii::app()->db->createCommand()
				->select('*')
				->from('orders')
				->where("order_id=:order_id",array(':order_id'=>$order_id))
				->queryAll();
		return $select;
	}

	public function add($data){

		foreach($data as $key=>$dat){
			$order_id = $dat['order_id'];
			$price = $dat['price'];
			$description = $dat['description'];
			$available = $dat['available'];
			Yii::app()->db->createCommand("INSERT into `orders`(`order_id`,`price`,`description`,`available`) VALUES(".$order_id.",".$price.",'".$description."',".$available.")")
					->execute();
			;
		}
	}
	public function max_id(){

		$select = Yii::app()->db->createCommand()
				->select('MAX(order_id) max_id')
				->from('orders')
				->queryRow();
		return $select['max_id']+1;
	}

	public function select_orders(){

		$orders = Yii::app()->db->createCommand()
				->select('distinct(orders.order_id) orders')
				->from('orders')
				->queryAll();
		return $orders;

	}
	public function selectFromId($id){

		$select = Yii::app()->db->createCommand()
				->select('*')
				->from('orders')
				->where("id=:id",array(':id'=>$id))
				->queryRow();
		return $select;
	}
	public function edit($data,$id){
		$order_id = $data['order_id'];
		$description = $data['description'];
		$price = $data['price'];
		$available = $data['available'];

		$update = Yii::app()->db->createCommand("UPDATE orders SET `order_id`='".$order_id."',`description`='".$description."',`price`='".$price."',`available`='".$available."' WHERE `id`='".intval($id)."'")
				->execute();

		return $update;
	}

	public function edit_orders($new_order_id,$old_order_id){
		$model = $this->model()->findByAttributes(array('order_id'=>$old_order_id));
		$model->order_id = $new_order_id;
		$model->update('order_id');
	}



}
