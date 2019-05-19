<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\JenisAkreditasi */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="jenis-akreditasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-rose']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
