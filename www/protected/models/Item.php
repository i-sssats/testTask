<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ykpon
 * Date: 4/6/13
 * Time: 4:07 PM
 * To change this template use File | Settings | File Templates.
 */

class Item extends CActiveRecord
{
    public $file;
    /**
     * @param string $className
     * @return Item
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
        return 'item';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return array(
            array('name, price, active', 'required', 'message' => 'Поле {attribute} не может быть пустым'),
            array('name', 'unique', 'message' => 'Товар с таким именем уже существует'),
            array('price', 'match', 'pattern' => '/[0-9]/', 'message' => '{attribute} может сожержать только цифры'),
            array('name, price, active, description', 'safe'),
        );
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return array(
            'name' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'picture' => 'Картинка',
            'activity' => 'Активен?',
        );
    }

    /**
     * @return array
     */
    public function relations()
    {
        return array(
            'inCart' => array(self::HAS_MANY, 'Cart', 'item_id'),
            'orders' => array(self::MANY_MANY, 'Order', 'item_order(item_id, order_id)'),
        );
    }

    /**
     * @return array
     */
    public function scopes()
    {
        return array(
            'isActive' => array(
                'condition' => 'active = 1',
            ),
            'asc' => array(
                'order' => 'price ASC',
            ),
            'desc' => array(
                'order' => 'price DESC',
            ),
        );
    }

}