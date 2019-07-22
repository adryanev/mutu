<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\sertifikat\SertifikatProdi */

$this->title = 'Create Sertifikat Prodi';
$this->params['breadcrumbs'][] = ['label' => 'Sertifikat Prodi', 'url' => ['index']];
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

                <div class="sertifikat-prodi-create">

                    <?= $this->render('_form', [
                    'model' => $model,
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>

