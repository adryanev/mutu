<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Akreditasi */
/* @var $dataJenisAkreditasi common\models\JenisAkreditasi[] */

$this->title = 'Update Akreditasi: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Akreditasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
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

                <div class="akreditasi-create">

                    <?= $this->render('_form', [
                        'model' => $model,
                        'dataJenisAkreditasi' => $dataJenisAkreditasi
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>


