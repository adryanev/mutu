<?php

use common\models\FakultasAkademi;
use common\models\Program;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramStudi */
/* @var $form yii\widgets\ActiveForm */
/* @var $dataProgram common\models\Program[] */
/* @var $dataFakultas common\models\FakultasAkademi[] */
?>


<div class="program-studi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_program')->widget(Select2::class,[
            'data'=>$dataProgram
    ])->label('Program') ?>

    <?= $form->field($model, 'id_fakultas_akademi')->widget(Select2::class,[
            'data'=>$dataFakultas
    ])->label('Fakultas/Akademi') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-rose']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
