<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = 'Login';
?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


                <div class="card card-login card-hidden">
                    <div class="card-header text-center" data-background-color="green">
                        <h4 class="card-title">Selamat Datang</h4>
                        <p class="category"><?=\yii\helpers\Inflector::camel2words(Yii::$app->name) . ' '. Yii::$app->params['instansi']?></p>

                    </div>
                    <!-- <p class="category text-center">
                        Or Be Classical
                    </p> -->
                    <div class="card-content">
                        <div class="input-group">
                            <span class="input-group-addon">  <i class="material-icons">account_box</i></span>
                            <?= $form->field($model, 'username',['options'=>['class'=>'form-group label-floating']])->textInput(['autofocus' => true]) ?>
                        </div>

                        <div class="input-group">
                                <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                </span>
                            <?= $form->field($model, 'password',['options'=>['class'=>'form-group label-floating']])->passwordInput() ?>

                        </div>

                        <?= $form->field($model, 'rememberMe')->checkbox(['label'=>'Ingat Saya']) ?>
                    </div>
                    <div class="form-group text-center">
                        <?= Html::submitButton('Masuk', ['class' => 'btn btn-rose btn-simple btn-wd btn-lg', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>