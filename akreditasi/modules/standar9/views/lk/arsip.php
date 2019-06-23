<?php

use common\models\S7Akreditasi;
use common\models\PencarianBorangProdiForm;
use common\models\Program;
use common\models\ProgramStudi;
use kartik\depdrop\DepDrop;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model PencarianBorangProdiForm */
/* @var $modelFakultas \common\models\PencarianBorangFakultasForm */
/* @var $modelInstitusi \common\models\PencarianBorangInstitusiForm */
/* @var $dataAkreditasiProdi S7Akreditasi[] */
/* @var $dataAkreditasiInstitusi S7Akreditasi[] */
/* @var $dataProgram Program[] */
/* @var $dataFakultas \common\models\FakultasAkademi[] */


$this->title = 'Pencarian Borang';
$this->params['breadcrumbs'][] = $this->title;
$identity = Yii::$app->user->identity->getId();
$role = array_keys(Yii::$app->authManager->getRolesByUser($identity))[0];

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">
                <ul class="nav nav-pills nav-pills-success">

                    <?php if ($role == 'adminProdi' || $role == 'userProdi' || $role == 'adminLpm' || $role =='superUser'): ?>
                        <li>
                            <a href="#pill1" data-toggle="tab">Akreditasi Program Studi</a>
                        </li>
                    <?php endif ?>
                    <?php if ($role == 'adminFakultas' || $role == 'userFakultas' || $role == 'adminLpm' || $role =='superUser'): ?>
                        <li >
                            <a href="#pill2" data-toggle="tab">Akreditasi Program Studi - Fakultas</a>
                        </li>
                    <?php endif ?>


                    <?php if ($role == 'adminInstitusi' || $role == 'userInstitusi' || $role == 'adminLpm' || $role =='superUser'): ?>
                        <li>
                            <a href="#pill3" data-toggle="tab">Akreditasi Institusi</a>
                        </li>
                    <?php endif ?>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane" id="pill1">
                        <div class="card">
                            <div class="card-content">
                                <h4 class="card-title">Form Borang Prodi</h4>
                                <?php $form = ActiveForm::begin() ?>

                                <?= $form->field($model, 'akreditasi')->dropDownList($dataAkreditasiProdi, ['prompt' => 'Pilih S7Akreditasi']) ?>
                                <?= $form->field($model, 'jenjang')->dropDownList($dataProgram, ['id' => 'jenjang', 'prompt' => 'Pilih Jenjang']) ?>
                                <?= $form->field($model, 'id_prodi')->widget(DepDrop::class, [
                                    'options' => ['id' => 'id_prodi'],
                                    'type' => DepDrop::TYPE_SELECT2,
                                    'pluginOptions' => [
                                        'depends' => ['jenjang'],
                                        'placeholder' => 'Pilih Program Studi',
                                        'url' => [\yii\helpers\Url::toRoute(['borang/cari-prodi'])],
                                    ]
                                ])->label('Program Studi') ?>
                                <?= $form->field($model, 'borang_untuk')->dropDownList(['prodi' => 'Program Studi'], ['prompt' => 'Pilih borang untuk']) ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                                </div>

                                <?php ActiveForm::end() ?>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="pill2">
                        <div class="card">
                            <div class="card-content">
                                <h4 class="card-title">Form Fakultas</h4>
                                <?php $form = ActiveForm::begin() ?>

                                <?= $form->field($modelFakultas, 'akreditasi')->dropDownList($dataAkreditasiProdi, ['prompt' => 'Pilih S7Akreditasi']) ?>
                                <?= $form->field($modelFakultas, 'jenjang')->dropDownList($dataProgram, ['id' => 'jenjang', 'prompt' => 'Pilih Jenjang']) ?>
                                <?= $form->field($modelFakultas, 'id_fakultas')->widget(\kartik\select2\Select2::class, [
                                    'data' => $dataFakultas
                                ])->label('Fakultas') ?>
                                <?= $form->field($modelFakultas, 'borang_untuk')->dropDownList(['fakultas' => 'Fakultas'], ['prompt' => 'Pilih borang untuk']) ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                                </div>

                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="pill3">
                        <div class="card">
                            <div class="card-content">
                                <h4 class="card-title">Form Institusi</h4>
                                <?php $form = ActiveForm::begin() ?>

                                <?= $form->field($modelInstitusi, 'akreditasi')->dropDownList($dataAkreditasiInstitusi, ['prompt' => 'Pilih S7Akreditasi']) ?>
                                <?= $form->field($modelInstitusi, 'borang_untuk')->dropDownList(['institusi' => 'Institusi'], ['prompt' => 'Pilih borang untuk']) ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                                </div>

                                <?php ActiveForm::end() ?>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

</div>

