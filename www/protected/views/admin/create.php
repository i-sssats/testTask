<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'horizontal',
    'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>
    <fieldset>

        <legend>Добавить товар</legend>

        <?php echo $form->textFieldRow($model, 'name'); ?>
        <?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5)); ?>
        <img src="/images/<?php echo $model->picture; ?>" class="item-img controls"/>
        <?php echo $form->fileFieldRow($model, 'picture'); ?>
        <?php echo $form->textFieldRow($model, 'price', array('class' => 'input-small')); ?>
        <?php echo $form->checkboxRow($model, 'active'); ?>

    </fieldset>

    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Сохранить')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Сбросить')); ?>
    </div>

<?php $this->endWidget(); ?>