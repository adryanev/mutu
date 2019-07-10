<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\sertifikat\SertifikatProdi */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sertifikat Prodi', 'url' => ['index']];
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

                <div class="sertifikat-prodi-view">

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
            'id_prodi',
            'nama_lembaga',
            'tgl_akreditasi',
            'tgl_kadaluarsa',
            'nomor_sk',
            'nomor_sertifikat',
            'nilai_angka',
            'nilai_huruf',
            'tahun_sk',
            'tanggal_pengajuan',
            'tanggal_diterima',
            'is_publik',
            'dokumen_sk',
            'sertifikat',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
                    ],
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>



