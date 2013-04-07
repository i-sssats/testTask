<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ykpon
 * Date: 4/7/13
 * Time: 5:35 PM
 * To change this template use File | Settings | File Templates.
 */

class AdminOrderController extends Controller
{
    public function actionIndex($status = null)
    {
        if ($status) {
            $orders = Order::model()->findAll('status = \'' . $status . '\'');
        } else {
            $orders = Order::model()->findAll();
        }
        $gridData = new CArrayDataProvider($orders);
        $this->render('//admin/ordersView', array('orders' => $gridData));
    }

    public function actionDelete($id = null)
    {
        if (Order::model()->deleteByPk($id)) {
            Yii::app()->request->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actionUpdate($id = null)
    {
        $order = Order::model()->findByPk($id);
        $orderAttributes = Yii::app()->request->getParam('Order');
        if ($orderAttributes) {
            $order->attributes = $orderAttributes;
            if ($order->save()) {
                Yii::app()->request->redirect('/admin/order');
            }
        }
        $this->render('//admin/orderEdit', array('model' => $order));
    }


}