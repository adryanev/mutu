<?php

use common\models\S7Akreditasi;
use common\models\PencarianBorangProdiForm;
use common\models\Program;
use common\models\ProgramStudi;
use kartik\depdrop\DepDrop;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model \yii\base\DynamicModel */
/* @var $dataJenjang array */



$this->title = 'Pilih Jenjang';
$this->params['breadcrumbs'][] = $this->title;
$identity = Yii::$app->user->identity;

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">


                <h4 class="card-title">Pilih Jenjang Prodi</h4>
                <?php $form = ActiveForm::begin() ?>

                <?= $form->field($model, 'jenjang')->dropDownList($dataJenjang, ['id' => 'jenjang', 'prompt' => 'Pilih Jenjang']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                </div>

                <?php ActiveForm::end() ?>


            </div>

        </div>
    </div>

</div>

