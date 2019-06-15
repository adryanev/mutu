<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\JenisAkreditasi */

$this->title = 'Create Jenis S7Akreditasi';
$this->params['breadcrumbs'][] = ['label' => 'Jenis S7Akreditasi', 'url' => ['index']];
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

                <div class="jenis-akreditasi-create">

                    <?= $this->render('_form', [
                    'model' => $model,
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>

