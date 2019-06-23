<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\models\S7AkreditasiProdiPascaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="s7-akreditasi-prodi-pasca-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_akreditasi') ?>

    <?= $form->field($model, 'id_prodi') ?>

    <?= $form->field($model, 'progress') ?>

    <?= $form->field($model, 'peringkat') ?>

    <?php // echo $form->field($model, 'skor') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
