<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\ProgramStudi */

$this->title = $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Program Studi', 'url' => ['index']];
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

                <div class="program-studi-view">

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
            'kode',
            'nama',
            'fakultasAkademi.nama',
            'jenjang',
            'kaprodi',
            'nomor_sk_pendirian',
            'tanggal_sk_pendirian',
            'pejabat_ttd_sk_pendirian',
            'bulan_berdiri',
            'tahun_berdiri',
            'nomor_sk_operasional',
            'tanggal_sk_operasional',
            'peringkat_banpt_terakhir',
            'nilai_banpt_terakhir',
            'nomor_sk_banpt',
            'alamat',
            'kodepos',
            'nomor_telp',
            'homepage',
            'email',
            'created_at:datetime',
            'updated_at:datetime',
                    ],
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>



