<?php

use common\models\S7Akreditasi;
use common\models\ProgramStudi;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataAkreditasi S7Akreditasi[] */
/* @var $dataProdi ProgramStudi[] */
/* @var $model common\models\S7AkreditasiProdiS1 */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="akreditasi-prodi-s1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_akreditasi')->widget(Select2::class,
        ['data' => $dataAkreditasi,
            'options' => ['placeholder' => 'Pilih S7Akreditasi']])->label('S7Akreditasi') ?>

    <?= $form->field($model, 'id_prodi')->widget(Select2::class, [
        'data' => $dataProdi,
        'options' => [
            'placeholder' => 'Pilih Program Studi'
        ]
    ])->label('Program Studi') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
