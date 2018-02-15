<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\gruz\User */
/* @var $form yii\widgets\ActiveForm */

\app\assets\GoogleAsset::register($this);
\app\assets\FormValidateAsset::register($this);
$this -> registerJs('
//did not move to an asset since I want to preserve Url::toRoute versus hardcoding the address into JS
var $adressesContainer = $("#addressForms");
$("#addAddressForm").click(function(){
    $.get("'.\yii\helpers\Url::toRoute('address/form').'").done(function(data){
        var $data = $(data);
        $adressesContainer.append($data);
        createGooglePrompt($data.find(".addressInput").get(0));
    });
});
$(".addressInput").each(function(){
    createGooglePrompt(this);
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
