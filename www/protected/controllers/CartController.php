<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ykpon
 * Date: 4/7/13
 * Time: 3:06 PM
 * To change this template use File | Settings | File Templates.
 */

class CartController extends Controller
{
    public function actionAll()
    {
        $items = null;
        $items = Cart::model()->getItemsInCart();
        $this->render('all', array('items' => $items));
    }

    public function actionAdd($id = null)
    {
        $cart = new Cart();
        $cart->item_id = $id;
        if ($cart->save()) {
            Yii::app()->request->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function actionDelete($id = null)
    {
        if ($id) {
            if (Cart::model()->deleteByPk($id)) {
                Yii::app()->request->redirect($_SERVER['HTTP_REFERER']);
            }
        }
    }

}