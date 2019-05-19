<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AkreditasiProdiS1 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Akreditasi Prodi S1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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

                <div class="akreditasi-prodi-s1-view">

                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                        ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                                'id',
            'id_akreditasi',
            'id_prodi',
            'progress',
            'peringkat',
            'skor',
            'created_at',
            'updated_at',
                    ],
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>



