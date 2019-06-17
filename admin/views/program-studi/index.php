<?php

use fedemotta\datatables\DataTables;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\models\ProgramStudiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Program Studi';
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

                <div class="program-studi-index">


                    <p>
                        <?= Html::a('Create Program Studi', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>

                                                                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                                            <?= DataTables::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'tableOptions'=>['class'=>['table table-hover']],
        'columns' => [
                        ['class' => 'yii\grid\SerialColumn','header' => 'No'],

//                                    'id',
            'nama',
            'jenjang',
//            'id_fakultas_akademi',
//            'created_at',
            //'updated_at',

                        ['class' => 'yii\grid\ActionColumn'],
                        ],
                        ]); ?>
                    
                    
                </div>

            </div>
        </div>
    </div>
</div>



