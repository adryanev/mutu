<?php

use Carbon\Carbon;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\S7Akreditasi */
/* @var $dataJenisAkreditasi common\models\JenisAkreditasi[] */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="akreditasi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun')->textInput(['value' => Carbon::now()->year]) ?>

    <?= $form->field($model, 'id_jenis_akreditasi')->widget(Select2::class, [
        'data' => $dataJenisAkreditasi,
        'options' => [
            'placeholder' => 'Pilih Jenis Akreditasi'
        ]
    ])->label('Jenis Akreditasi') ?>

    <?= $form->field($model, 'lembaga')->textInput(['maxlength' => true,'value'=>'BAN-PT','readonly'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-rose']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
