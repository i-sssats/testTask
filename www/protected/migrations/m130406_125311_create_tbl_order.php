<?php

class m130406_125311_create_tbl_order extends CDbMigration
{
	public function up()
	{
        $this->createTable('order',array(
            'id' => 'pk',
            'status' => 'enum(\'not_considered\',\'in_work\',\'executed\',\'rejected\')',
        ),'ENGINE=InnoDB DEFAULT CHARSET=utf8');
	}

	public function down()
	{
		echo "m130406_125311_create_tbl_order does not support migration down.\n";
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