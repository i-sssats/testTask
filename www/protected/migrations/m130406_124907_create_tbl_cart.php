<?php

class m130406_124907_create_tbl_cart extends CDbMigration
{
    public function up()
    {
        $this->createTable('cart', array(
            'id' => 'pk',
            'item_id' => 'int(11)'
        ),'ENGINE=InnoDB DEFAULT CHARSET=utf8');
    }

    public function down()
    {
        echo "m130406_124907_create_tbl_cart does not support migration down.\n";
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