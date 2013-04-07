<?php

class m130407_130821_add_addtess_to_order extends CDbMigration
{
	public function up()
	{
        $this->addColumn('order','address','string');
	}

	public function down()
	{
		echo "m130407_130821_add_addtess_to_order does not support migration down.\n";
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