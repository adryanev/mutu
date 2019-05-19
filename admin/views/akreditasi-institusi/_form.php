<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AkreditasiInstitusi */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="akreditasi-institusi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_akreditasi')->textInput() ?>

    <?= $form->field($model, 'progress')->textInput() ?>

    <?= $form->field($model, 'peringkat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skor')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
