<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\sertifikat\SertifikatInstitusiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sertifikat-institusi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_institusi') ?>

    <?= $form->field($model, 'nama_lembaga') ?>

    <?= $form->field($model, 'tgl_akreditasi') ?>

    <?= $form->field($model, 'tgl_kadaluarsa') ?>

    <?php // echo $form->field($model, 'nomor_sk') ?>

    <?php // echo $form->field($model, 'nomor_sertifikat') ?>

    <?php // echo $form->field($model, 'nilai_angka') ?>

    <?php // echo $form->field($model, 'nilai_huruf') ?>

    <?php // echo $form->field($model, 'tahun_sk') ?>

    <?php // echo $form->field($model, 'tanggal_pengajuan') ?>

    <?php // echo $form->field($model, 'tanggal_diterima') ?>

    <?php // echo $form->field($model, 'is_publik') ?>

    <?php // echo $form->field($model, 'dokumen_sk') ?>

    <?php // echo $form->field($model, 'sertifikat') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
