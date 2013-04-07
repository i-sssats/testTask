<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ykpon
 * Date: 4/7/13
 * Time: 4:48 PM
 * To change this template use File | Settings | File Templates.
 */

class ItemOrder extends CActiveRecord
{
    /**
     * @param string $className
     * @return ItemOrder
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string
     */
    public function tableName()
    {
        return 'item_order';
    }

    public function rules()
    {
        return array(
            array('item_id,order_id', 'safe'),
        );
    }

    public function relations()
    {
        return array(
            'item' => array(self::BELONGS_TO,'Item','item_id'),
        );
    }
}