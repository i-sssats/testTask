<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type' => 'striped bordered condensed',
    'dataProvider' => $orders,
    'template' => "{items}",
    'htmlOptions' => array('class' => 'order-table'),
    'columns' => array(
        array('name' => 'id', 'header' => '#'),
        array('name' => 'address', 'header' => 'Адрес'),
        array('name' => 'status', 'header' => 'Статус'),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
            'htmlOptions' => array('style' => 'width: 35px;'),
            'template' => '{update} {delete}',
        ),
    ),
)); ?>
<form class="form-inline">
    <select name="status">
        <option value="">Все</option>
        <option value="in_work">В работе</option>
        <option value="not_considered">Не рассмотрен</option>
        <option value="executed">Выполнен</option>
        <option value="rejected">Отклонен</option>
    </select>
    <button type="submit" class="btn btn-primary btn-small">Фильтровать</button>
</form>

<script>
    $(document).ready(function () {
            $(".order-table table").tablesorter({
                headers:{
                    3 : {sorter : false}
                }
            });
            $(".order-table table").addClass('tablesorter');
        }
    );
</script>

