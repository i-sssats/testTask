<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ykpon
 * Date: 4/7/13
 * Time: 4:13 PM
 * To change this template use File | Settings | File Templates.
 */

class OrderController extends Controller
{
    public function actionCreate()
    {
        $order = new Order();
        $orderAttributes = Yii::app()->request->getParam('Order');
        if ($orderAttributes) {
            $order->attributes = $orderAttributes;
            $order->status = $order::STATUS_IN_WORK;
            if (Cart::model()->getCountItemsInCart() > 0) {
                if ($order->save()) {
                    Yii::app()->request->redirect('/');
                }
            } else {
                echo 'Вы ничего не добавили в корзину';die;
            }
        }

        $this->render('create', array('model' => $order));
    }

}