<?php

class m130406_130410_create_tbl_item_order extends CDbMigration
{
	public function up()
	{
        $this->createTable('item_order',array(
            'id' => 'pk',
            'item_id' => 'int(11)',
            'order_id' => 'int(11)',
        ),'ENGINE=InnoDB DEFAULT CHARSET=utf8');
	}

	public function down()
	{
		echo "m130406_130410_create_tbl_item_order does not support migration down.\n";
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