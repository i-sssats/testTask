<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id' => 'horizontalForm',
    'type' => 'horizontal',
)); ?>
    <fieldset>

        <legend>Создание заказа</legend>

        <?php echo $form->textAreaRow($model, 'address', array('class' => 'span5')); ?>
        <?php echo $form->dropDownListRow($model, 'status', array('in_work' => 'В работе', 'not_considered' => 'Не рассмотрен', 'executed' => 'Выполнен', 'rejected' => 'Отклонен')); ?>

    </fieldset>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => 'Сохранить')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => 'Сбросить')); ?>
    </div>

<?php $this->endWidget(); ?>