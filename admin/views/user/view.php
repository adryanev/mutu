<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->profilUser->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
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

                <div class="user-view">

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
                        'options' => ['class' => ['table table-hover table-stripped']],
                        'attributes' => [
                            'id',
                            'username',
                            'profilUser.nama_lengkap',
//                            'auth_key',
//                            'password_hash',
//                            'password_reset_token',
                            'email:email',
                            'is_admin:boolean',
                            'is_institusi:boolean',
                            'is_fakultas:boolean',
                            'profilUser.fakultas.nama',
                            'is_prodi:boolean',
                            'profilUser.prodi.nama',
                            ['attribute'=>'status',
                                'value'=> function($model){
                                    $status = '';
                                    if($model->status === User::STATUS_ACTIVE){
                                        $status.='Aktif';
                                    }
                                    elseif($model->status=== User::STATUS_INACTIVE){
                                        $status.="Tidak Aktif";
                                    }
                                    else{
                                        $status.="Dihapus";
                                    }
                                    return $status;
                                }],
                            'created_at:datetime',
                            'updated_at:datetime',
//                            'verification_token',
                        ],
                    ]) ?>


                </div>

            </div>
        </div>
    </div>
</div>



