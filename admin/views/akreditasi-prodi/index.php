<?php

use admin\models\S7AkreditasiSearch;
use common\models\Program;
use yii\base\DynamicModel;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model DynamicModel */
/* @var $dataProgram Program[] */

$this->title = 'Akreditasi Program Studi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">file_copy</i>

            </div>
            <div class="card-content">
                <h4 class="card-title">
                    <?= Html::encode($this->title) ?>
                </h4>

                <?php $form = ActiveForm::begin()?>

                <?= $form->field($model,'program')->dropDownList($dataProgram) ?>

                <div class="form-group">
                    <?= Html::submitButton('Pilih',['class'=>'btn btn-rose'])?>
                </div>


                <?php ActiveForm::end() ?>


            </div>
        </div>
    </div>
</div>



