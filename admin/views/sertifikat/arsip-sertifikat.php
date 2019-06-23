<?php

use common\models\sertifikat\SertifikatForm;
// use common\models\Program;
use common\models\ProgramStudi;
use kartik\depdrop\DepDrop;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $dataSertifikat  */
/* @var $modelSertifikat SertifikatForm */


$this->title='Pencarian Sertifikat';
$this->params['breadcrumbs'][] = $this->title;
//$identity = Yii::$app->user->identity;

?>
<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-content">

                        <div class="card">

                            <div class="card-content">
                                <h4 class="card-title">Form Sertifikat</h4>
                                <?php $form = ActiveForm::begin() ?>


                                <?=$form->field($modelSertifikat,'sertifikat_untuk')->dropDownList($dataSertifikat)?>

                                <div class="form-group">
                                    <?=Html::submitButton('Cari',['class'=>'btn btn-rose'])?>
                                </div>

                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>

        </div>
    </div>

</div>