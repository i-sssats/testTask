<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ykpon
 * Date: 4/6/13
 * Time: 6:22 PM
 * To change this template use File | Settings | File Templates.
 */

class ItemController extends Controller
{
    public function actionIndex()
    {
        $items = Item::model()->findAll();
        $gridDataProvider = new CArrayDataProvider($items);
        $this->render('//admin/index', array('items' => $gridDataProvider));
    }

    public function actionUpdate($id = null)
    {
        $flag = 0;
        if ($id) {
            $item = Item::model()->findByPk($id);
        } else {
            $item = new Item();
        }
        $itemattributes = Yii::app()->request->getParam('Item');
        if ($itemattributes) {
            $item->attributes = $itemattributes;
            $item->file = CUploadedFile::getInstance($item, 'picture');
            if ($item->file != null) {
                $name = $item->file->getName();
                $filename = md5(Yii::app()->user->id . microtime() . $name);
                $filename .= "." . $item->file->getExtensionName();
                $item->picture = $filename;
                $flag = 1;
            }
            if ($item->save()) {
                if ($flag == 1) {
                    $item->file->saveAs(Yii::app()->basePath . '/../images/' . $filename);
                }
                $this->redirect($this->createUrl('/admin/item/index'), true);
            }
        }
        $this->render('//admin/create', array('model' => $item));
    }

    public function actionDelete($id = null)
    {
        if ($id) {
            Item::model()->deleteByPk($id);
        }
    }

}