<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $items,
    'template' => "{items}",
    'htmlOptions' => array('class' => 'grid-view item-table'),
    'columns' => array(
        array('name' => 'id', 'header' => '#'),
        array('name' => 'name', 'header' => 'Название'),
        array('name' => 'description', 'header' => 'Описание'),
        array('name' => 'price', 'header' => 'Цена'),
        array('name' => 'picture', 'header' => 'Картика'),
        array('name' => 'active', 'header' => '', 'htmlOptions' => array('style' => 'width: 10px;')),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'template' => '{update} {delete}',
        ),
    ),
)); ?>
<?php echo CHtml::link('Создать товар', '/admin/item/update', array('class' => 'btn btn-primary btn-small pull-right')) ?>
<script>
    $(document).ready(function () {
            $(".item-table table").tablesorter({
                headers:{
                    4 : {sorter : false},
                    5 : {sorter : false},
                    6 : {sorter : false}
                }
            });
            $(".item-table table").addClass('tablesorter');
        }
    );
</script>