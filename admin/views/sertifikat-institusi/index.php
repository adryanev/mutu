<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\sertifikat\SertifikatInstitusiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sertifikat Institusi';
$this->params['breadcrumbs'][] = ['label'=>'Pencarian Sertifikat','url'=>['sertifikat/arsip-sertifikat']];
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

                <div class="sertifikat-institusi-index">


                    <p>
                        <?= Html::a('Tambah Sertifikat Institusi', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                                                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                                    'id',
            'nama_institusi',
            'nama_lembaga',
            'tgl_akreditasi',
            'tgl_kadaluarsa',
            //'nomor_sk',
            //'nomor_sertifikat',
            //'nilai_angka',
            //'nilai_huruf',
            //'tahun_sk',
            //'tanggal_pengajuan',
            //'tanggal_diterima',
            'is_publik',
            //'dokumen_sk',
            'sertifikat',
            //'created_at',
            //'updated_at',
            //'created_by',
            //'updated_by',

                        ['class' => 'yii\grid\ActionColumn'],
                        ],
                        ]); ?>
                    
                    
                </div>

            </div>
        </div>
    </div>
</div>



