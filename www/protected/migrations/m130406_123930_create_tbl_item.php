<?php

class m130406_123930_create_tbl_item extends CDbMigration
{
    public function up()
    {
        $this->createTable('item', array(
            'id' => 'pk',
            'name' => 'varchar(128)',
            'description' => 'text',
            'price' => 'int',
            'picture'=> 'string'
        ),'ENGINE=InnoDB  DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        echo "m130406_123930_create_tbl_item does not support migration down.\n";
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