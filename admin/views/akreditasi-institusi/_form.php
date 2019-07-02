<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\S7AkreditasiInstitusi */
/* @var $form yii\widgets\ActiveForm */
/* @var $dataAkreditasi \common\models\S7Akreditasi[] */
?>


<div class="akreditasi-institusi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_akreditasi')->widget(Select2::class, [
        'data' => $dataAkreditasi,
        'options' => ['placeholder' => 'Pilih Akreditasi']
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
