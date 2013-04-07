<?php

class SiteController extends Controller
{

    public function actionIndex($sort = null)
    {
        switch ($sort){
            case null:
            case 'a':
                $items = Item::model()->isActive()->asc()->findAll();
                    break;
            case 'd':
                $items = Item::model()->isActive()->desc()->findAll();
                    break;
        }
        $this->render('items', array('items' => $items));
    }

    public function actionItemView($id = null)
    {
        $item = Item::model()->findByPk($id);
        $this->render('view',array('item' => $item));
    }
}