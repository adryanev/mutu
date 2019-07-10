<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\sertifikat\SertifikatProdiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sertifikat Prodi';
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

                <div class="sertifikat-prodi-index">


                    <p>
                        <?= Html::a('Create Sertifikat Prodi', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                                                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//                                    'id',
            'prodi.nama',
//            'nama_lembaga',
            'tgl_akreditasi:date',
            'tgl_kadaluarsa:date',
            'nomor_sk',
            //'nomor_sertifikat',
            'nilai_angka',
            'nilai_huruf',
            //'tahun_sk',
            //'tanggal_pengajuan',
            //'tanggal_diterima',
            'is_publik:boolean',
            //'dokumen_sk',
            [
                'attribute' => 'sertifikat',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->sertifikat, ['sertifikat-prodi/download','id'=>$model->id]);
                }
            ],
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



