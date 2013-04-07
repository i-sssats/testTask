<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->bootstrap->register(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/table-sorter.css"/>
    <script type="text/javascript"
            src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tablesorter.min.js"></script>

</head>
<body>
<?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'type' => 'inverse',
    'brand' => 'Магазин',
    'brandUrl' => '/',
    'collapse' => true,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.TbMenu',
            'htmlOptions' => array('class' => ''),
            'items' => array(
                array('label' => 'Корзина('.Cart::model()->getCountItemsInCart().')', 'url' => '/cart/all'),
            ),
        ),
    array(
            'class' => 'bootstrap.widgets.TbMenu',
            'htmlOptions' => array('class' => 'pull-right'),
            'items' => array(
                array('label' => 'Админ/Товары', 'url' => '/admin/item'),
                array('label' => 'Админ/Заказы('.Order::model()->count().')', 'url' => '/admin/order'),
            ),
        ),
    ),
)); ?>
<div class="container">
    <?php echo $content; ?>
</div>
<!-- /container -->
</body>
</html>
