<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\S7AkreditasiInstitusi */
/* @var $dataAkreditasi \common\models\S7Akreditasi[] */

$this->title = 'Update Akreditasi Institusi: ' . $model->id_akreditasi;
$this->params['breadcrumbs'][] = ['label' => 'Akreditasi Institusi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_akreditasi, 'url' => ['view', 'id' => $model->id_akreditasi]];
$this->params['breadcrumbs'][] = 'Update';
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

                <div class="akreditasi-institusi-create">

                    <?= $this->render('_form', [
                    'model' => $model,
                        'dataAkreditasi'=>$dataAkreditasi
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>


