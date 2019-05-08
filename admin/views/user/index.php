<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel monitoring\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
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
                <div class="col-md-12">

                <p>
                    <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
                </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'tableOptions'=>['class'=>['table table-hover']],
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn','header' => 'No'],

//                            'id',
                            'username',
//                            'auth_key',
//                            'password_hash',
//                            'password_reset_token',
                            //'email:email',
                            //'status',
                            'is_admin',
                            'is_institusi',
                            'is_fakultas',
                            'is_prodi',
                            //'created_at',
                            //'updated_at',
                            //'verification_token',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>

                </div>


            </div>
        </div>
    </div>
</div>



