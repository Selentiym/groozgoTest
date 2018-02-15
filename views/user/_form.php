<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\gruz\User */
/* @var $form yii\widgets\ActiveForm */

\yii\web\JqueryAsset::register($this);
$this -> registerJs('
var $phoneInput = $("#phoneInput"),
$dateInput = $("#dateInput"),
dateReg = /^\d{2}\.\d{2}.\d{4}$/,
phoneReg = /^\+7 \(\d{3}\) \d{3}-\d{4}$/;
$("#userForm").submit(function(){
    var isOk = true;
    if (!dateReg.exec($dateInput.val())) {
        alert("Поле \"Дата рождения\" заполнено неверно. Убедитесь, что формат соответствует dd.mm.Y");
        isOk = false;
    }
    if (!phoneReg.exec($phoneInput.val())) {
        alert("Поле \"Телефон\" заполнено неверно. Убедитесь, что формат соответствует +7 (777) 777-7777");
        isOk = false;
    }
    return false;
});
');
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'userForm']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'born')->textInput(['id' => 'dateInput']) ?>

    <?= $form->field($model, 'gender')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'id' => 'phoneInput']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
