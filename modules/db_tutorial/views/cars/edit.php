<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Tables';
?>

<?php
$form = ActiveForm::begin([
    'id' => 'edit-form',
    'options' => ['class' => 'form-horizontal'],
]); ?>
<?= $form->field($model, 'name')->textInput(['value' => $data->name])->label('Name') ?>
<?= $form->field($model, 'color')->dropdownList(
    \app\modules\db_tutorial\models\Color::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt' => 'Select Color']); ?>
<?= $form->field($model, 'mark')->dropdownList(
    \app\modules\db_tutorial\models\Marks::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt' => 'Select Mark']); ?>


<div class="form-group">
    <?= Html:: submitButton(' Edit ', [' class ' => ' btn btn - primary ']) ?>
</div>
<?php ActiveForm::end(); ?>

