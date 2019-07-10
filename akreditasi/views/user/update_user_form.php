<?php

use common\models\CreateUserForm;
use common\models\FakultasAkademi;
use common\models\User;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CreateUserForm */
/* @var $modelPassword common\models\UserPasswordForm */
/* @var $form ActiveForm */
/* @var $dataFakultas FakultasAkademi[] */
$this->title = 'Update User';
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['view']];
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
                    <?= "Update Password" ?>
                </h4>

                <div class="update_password_from">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($modelPassword, 'oldPassword')->passwordInput() ?>
                    <?= $form->field($modelPassword, 'newPassword')->passwordInput() ?>
                    <?= $form->field($modelPassword, 'repeatPassword')->passwordInput() ?>


                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>

                </div><!-- create_user_form -->


            </div>
        </div>
    </div>
</div>
