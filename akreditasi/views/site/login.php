<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>


                    <div class="card card-login card-hidden">
                        <div class="card-header text-center" style="margin-top:0px;">
                            <h4 class="card-title">Selamat Datang</h4>
                            <p class="category">Sistem Mutu IAIN Padangsidimpuan</p>

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

            <div class="col-md-8">
                <div class="card card-login card-hidden">
                <div class="row" style="margin-top:10px;margin-left: 0px;margin-right: 0px;">
                                <!-- <div class="col-md-5 col-md-offset-1"> -->
                                    <div class="col-md-12 table-responsive ">
                                        <table class="table table-hover ">
                                            <thead class="text-primary" data-background-color="green">
                                                <tr>
                                                    <th rowspan="3">No</th>
                                                    <th rowspan="3">Status Akreditasi</th>
                                                    <th colspan="10" class="text-center">Jumlah Prodi</th>
                                                    <th rowspan="3">Total</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3" class="text-center">Akademik</th>
                                                    <th colspan="3" class="text-center">Profesi</th>
                                                    <th colspan="4" class="text-center">Vokasi</th>
                                                </tr>
                                                <tr>
                                                    <th width="1">S3</th>
                                                    <th>S2</th>
                                                    <th>S1</th>
                                                    <th>SP-2</th>
                                                    <th>SP-1</th>
                                                    <th>Prof</th>
                                                    <th>D4</th>
                                                    <th>D3</th>
                                                    <th>D2</th>
                                                    <th>D1</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td>Niger</td>
                                                    <td>
                                                        <a href="detail_akreditasi.html">1</a>
                                                    </td>
                                                    <td></td>
                                                    <td>1</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Niger</td>
                                                    <td>2</td>
                                                    <td class="text-primary">1</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Curaçao</td>
                                                    <td>2</td>
                                                    <td class="text-primary">2</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Netherlands</td>
                                                    <td>4</td>
                                                    <td class="text-primary">12</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Korea, South</td>
                                                    <td>1</td>
                                                    <td class="text-primary">2</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Malawi</td>
                                                    <td>2</td>
                                                    <td class="text-primary">3</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>Chile</td>
                                                    <td>32</td>
                                                    <td class="text-primary">1</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</div>