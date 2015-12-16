<?php

class m151215_071837_create_news_tablei extends CDbMigration
{
	public function up()
	{
		$this->createTable('migration', array(
				'id' => 'pk',
				'order_id' => 'string NOT NULL',
				'price' => 'integer',
				'description' => 'varchar',
				'available' => 'tiny integer',
		));
		echo 'migration is upped';
	}

	public function down()
	{
		$this->dropTable('migration');
		echo "m151215_071837_create_news_tablei does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}