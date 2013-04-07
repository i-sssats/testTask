<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ykpon
 * Date: 4/6/13
 * Time: 5:54 PM
 * To change this template use File | Settings | File Templates.
 */

class Cart extends CActiveRecord
{
    /**
     * @param string $className
     * @return Cart
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
        return 'cart';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return array(
            array('item_id', 'required'),
        );
    }

    /**
     * @return array
     */
    public function relations()
    {
        return array(
            'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
        );
    }

    public function getItemsInCart()
    {
        $items = null;
        foreach ($this->findAll() as $key => $val) {
            $items[$key] = $val->item->attributes;
            $items[$key]['cart_id'] = $val->id;
        }

        return $items;
    }

    public function getCountItemsInCart()
    {
        return $this->count();
    }

}