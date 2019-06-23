<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\sertifikat\SertifikatInstitusi */
/* @var $model common\models\sertifikat\SertifikatInstitusiForm */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="sertifikat-institusi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_institusi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_lembaga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_akreditasi')->textInput() ?>

    <?= $form->field($model, 'tgl_kadaluarsa')->widget(DatePicker::class, [
        'name' => 'datetime_10',
        'options' => ['placeholder' => 'Select operating time ...'],
        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'ddMMyyyy',
            'startDate' => '01-Mar-2014 12:00 AM'
            ]
    ])?>

    <?= $form->field($model, 'nomor_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_angka')->textInput() ?>

    <?= $form->field($model, 'nilai_huruf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pengajuan')->textInput() ?>

    <?= $form->field($model, 'tanggal_diterima')->textInput() ?>

    <?= $form->field($model, 'is_publik')->widget(Select2::class, [
        'data' => [1 => 'Publik', 0=>'Tidak Publik'],
        'options' => [
            'placeholder' => 'Pilih Keterangan Dokumen'
        ]
    ])->label('Keterangan Dokumen') ?>

    <?= $form->field($model, 'dokumen_sk')->widget(FileInput::class,[
        'options' => ['id'=>'dokumen'],
        'pluginOptions' => [
            'showUpload'=>false
        ]
    ]) ?>

    <?= $form->field($model, 'sertifikat')->widget(FileInput::class,[
        'options' => ['id'=>'dokumen1'],
        'pluginOptions' => [
            'showUpload'=>false
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
