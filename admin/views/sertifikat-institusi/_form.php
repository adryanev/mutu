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

    <?= $form->field($model, 'tgl_akreditasi')->widget(DatePicker::class, [
        'name' => 'check_date',
        'removeButton' => false,
//        'options'=> ['placeholder' => 'Tanggal Akreditasi'],
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-MM-yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'tgl_kadaluarsa')->widget(DatePicker::class, [
        'name' => 'check_date2',
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-MM-yyyy'
        ]
    ])?>

    <?= $form->field($model, 'nomor_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_angka')->textInput() ?>

    <?= $form->field($model, 'nilai_huruf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pengajuan')->widget(DatePicker::class, [
        'name' => 'check_date3',
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-MM-yyyy'
        ]
    ]) ?>

    <?= $form->field($model, 'tanggal_diterima')->widget(DatePicker::class, [
        'name' => 'check_date4',
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd-MM-yyyy'
        ]
    ]) ?>

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
