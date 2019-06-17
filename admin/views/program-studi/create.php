<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramStudi */
/* @var $dataProgram common\models\Program[] */
/* @var $dataFakultas common\models\FakultasAkademi[] */

$this->title = 'Create Program Studi';
$this->params['breadcrumbs'][] = ['label' => 'Program Studi', 'url' => ['index']];
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

                <div class="program-studi-create">

                    <?= $this->render('_form', [
                    'model' => $model,
                        'dataFakultas'=>$dataFakultas
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>

