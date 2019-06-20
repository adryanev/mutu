<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\S7AkreditasiProdiS1Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'S7Akreditasi Prodi S1';
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

                <div class="akreditasi-prodi-s1-index">


                    <p>
                        <?= Html::a('Create S7Akreditasi Prodi S1', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                                                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                                            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
        'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                                    'id',
            'id_akreditasi',
            'id_prodi',
            'progress',
            //'created_at',
            //'updated_at',

                        ['class' => 'yii\grid\ActionColumn'],
                        ],
                        ]); ?>
                    
                    
                </div>

            </div>
        </div>
    </div>
</div>



