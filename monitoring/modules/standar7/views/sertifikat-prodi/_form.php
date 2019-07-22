<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\sertifikat\SertifikatProdi */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="sertifikat-prodi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_prodi')->textInput() ?>

    <?= $form->field($model, 'nama_lembaga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_akreditasi')->textInput() ?>

    <?= $form->field($model, 'tgl_kadaluarsa')->textInput() ?>

    <?= $form->field($model, 'nomor_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai_angka')->textInput() ?>

    <?= $form->field($model, 'nilai_huruf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pengajuan')->textInput() ?>

    <?= $form->field($model, 'tanggal_diterima')->textInput() ?>

    <?= $form->field($model, 'is_publik')->textInput() ?>

    <?= $form->field($model, 'dokumen_sk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sertifikat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
