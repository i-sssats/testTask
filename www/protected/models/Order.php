<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ykpon
 * Date: 4/6/13
 * Time: 6:02 PM
 * To change this template use File | Settings | File Templates.
 */

class Order extends CActiveRecord
{
    const STATUS_NOT_CONSIDERED = 'not_considered';
    const STATUS_IN_WORK = 'in_work';
    const STATUS_EXECUTED = 'executed';
    const STATUS_REJECTED = 'rejected';

    public $statuses = array(
        self::STATUS_NOT_CONSIDERED => 'Не рассмотрен',
        self::STATUS_IN_WORK => 'В работе',
        self::STATUS_EXECUTED => 'Выполнен',
        self::STATUS_REJECTED => 'Отклонен',
    );

    /**
     * @param string $className
     * @return Order
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
        return 'order';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return array(
            array('status', 'required'),
            array('status,address', 'safe'),
        );
    }

    public function relations()
    {
        return array(
            'items' => array(self::MANY_MANY, 'Item', 'item_order(order_id, item_id)'),
        );
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return array(
            'status' => 'Статус',
            'address' => 'Адрес',
        );
    }

    public function getItemsInOrder()
    {
        $items = null;
        $items['order_id'] = $this->id;
        foreach (ItemOrder::model()->findAll('order_id=' . $this->id) as $key => $val) {
            $items['items'][$key] = $val->item->attributes;
        }
        return $items;
    }

    protected function afterSave()
    {
        if ($this->isNewRecord) {
            $cart = Cart::model()->findAll();
            if ($cart != null) {
                foreach ($cart as $item) {
                    $itemOrder = new ItemOrder();
                    $itemOrder->item_id = $item->item_id;
                    $itemOrder->order_id = $this->id;
                    $itemOrder->save();
                }
                Cart::model()->deleteAll();
            } else {
                echo 'Вы ничего не добавили в корзину';
                die;
            }
        }
        return parent::afterSave();
    }

}