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
$("#userForm").submit(function(e){
    var isOk = true;
    if (!dateReg.exec($dateInput.val())) {
        alert("Поле \"Дата рождения\" заполнено неверно. Убедитесь, что формат соответствует dd.mm.Y");
        isOk = false;
    }
    if (!phoneReg.exec($phoneInput.val())) {
        alert("Поле \"Телефон\" заполнено неверно. Убедитесь, что формат соответствует +7 (777) 777-7777");
        isOk = false;
    }
    //prevent yii from validating other fields and calling submit for the second time
    if (!isOk) {
        e.preventDefault();
        e.stopImmediatePropagation();
    }
    return isOk;
});
var $adressesContainer = $("#addressForms");
$("#addAddressForm").click(function(){
    $.get("'.\yii\helpers\Url::toRoute('address/form').'").done(function(data){
        $adressesContainer.append(data);
    });
});
');
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'userForm']); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bornUpdate')->textInput(['id' => 'dateInput']) ?>

    <?= $form->field($model, 'gender')->radioList([
        1 => 'М',
        0 => 'Ж'
    ]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'id' => 'phoneInput']) ?>

    <div id="addressForms">
        <?php foreach ($model -> addresses as $address) {
            echo $this -> render('/address/_form',['model' => $address]);
        } ?>
    </div>

    <div class="form-group">
        <?= Html::button('Добавить адрес', ['class' => 'btn btn-info', 'id' => 'addAddressForm']) ?>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
