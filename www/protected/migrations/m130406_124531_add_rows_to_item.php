<?php

class m130406_124531_add_rows_to_item extends CDbMigration
{
	public function up()
	{
        $this->addColumn('item','active','bool');
	}

	public function down()
	{
		echo "m130406_124531_add_rows_to_item does not support migration down.\n";
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