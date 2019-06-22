<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;


/* @var $this yii\web\View */
/* @var $model \yii\base\DynamicModel */
/* @var $dataAkreditasi array */
/* @var $dataProdi array */



$this->title = 'Pilih Akreditasi & Prodi';
$this->params['breadcrumbs'][] = $this->title;
$identity = Yii::$app->user->identity;

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">


                <h4 class="card-title">Pilih Akreditasi & Prodi</h4>
                <?php $form = ActiveForm::begin() ?>

                <?= $form->field($model, 'akreditasi')->dropDownList($dataAkreditasi, ['id' => 'jenjang', 'prompt' => 'Pilih Akreditasi']) ?>
                <?= $form->field($model, 'prodi')->widget(\kartik\select2\Select2::className(),['data'=>$dataProdi]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                </div>

                <?php ActiveForm::end() ?>


            </div>

        </div>
    </div>

</div>

