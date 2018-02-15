<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\gruz\Address */
/* @var $form ActiveForm */
/* @var $user \app\models\gruz\User */
$this -> registerJs('
    $(".delete").click(function(){
        var $form = $(this).parents(".form");
        var $idHolder = $form.find(".idHolder");
        if ($idHolder.val()) {
            if (confirm("Вы действительно хотите удалить выбранный адрес?")) {
                $.post($(this).attr("href"));
                $form.remove();
                return false;
            }
        } else {
            $form.remove();
        }
        return false;
    });
',\yii\web\View::POS_READY,'deleteAddressHandler');
?>
<div class="form">
    <div class="form-group field-phoneInput">
        <label class="control-label">Название
        <?php echo Html::activeTextInput($model,'name',['name' => 'Address[name][]','class' => 'form-control']);?>
        </label>
        <label class="control-label">Адрес
        <?php echo Html::activeTextInput($model,'address',['name' => 'Address[address][]','class' => 'addressInput form-control']);?>
        </label>
        <?= Html::a('Удалить', ['address/delete', 'id' => $model->id], [
            'class' => 'btn btn-danger delete',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот адрес?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <?php
        echo Html::hiddenInput("Address[id][]",$model -> id,['class' => 'idHolder']);
    ?>

</div><!-- _form -->
