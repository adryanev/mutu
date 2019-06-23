<?php

use common\models\PencarianDokumentasiFakultasForm;
use common\models\PencarianDokumentasiInstitusiForm;
use common\models\S7Akreditasi;
use common\models\PencarianDokumentasiProdiForm;
// use common\models\Program;
use common\models\ProgramStudi;
use kartik\depdrop\DepDrop;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model PencarianDokumentasiProdiForm */
/* @var $modelInstitusi PencarianDokumentasiInstitusiForm */
/* @var $modelFakultas PencarianDokumentasiFakultasForm */
/* @var $dataAkreditasi Akreditasi[] */
/* @var $dataAkreditasiInstitusi Akreditasi[] */
/* @var $dataProgram Program[] */

if($target == 'isi'){
    $target = 'Isi';
}
elseif($target == 'pj'){
    $target = 'Penanggung Jawab';
}
else{
    $target = "Lihat";
}

$this->title='Pencarian '.$target.' Dokumentasi';
$this->params['breadcrumbs'][] = $this->title;
$identity = Yii::$app->user->identity;

?>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            
            <div class="card-content">
                <ul class="nav nav-pills nav-pills-success">
                    <li class="active">
                        <a href="#pill1" data-toggle="tab">Akreditasi Program Studi</a>
                    </li>
                    <li>
                        <a href="#pill3" data-toggle="tab">Akreditasi Program Studi - Fakultas</a>
                    </li>
                    <?php if($identity->isAdminInstitusi() || $identity->is_institusi===1): ?>
                    <li>
                        <a href="#pill2" data-toggle="tab">Akreditasi Institusi</a>
                    </li>
                    <?php endif?>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="pill1">
                        <div class="card">
                            
                            <div class="card-content">
                                <h4 class="card-title">Form Dokumentasi</h4>
                                <?php $form = ActiveForm::begin() ?>

                                    <?=$form->field($model,'akreditasi')->dropDownList($dataAkreditasi,['prompt'=>'Pilih Akreditasi'])?>
                                    <?=$form->field($model,'jenjang')->dropDownList($dataProgram,['id'=>'id_program','prompt'=>'Pilih Jenjang'])?>
                                    <?=$form->field($model,'id_prodi')->widget(DepDrop::class,[
                                        'options' => ['id' => 'id_prodi'],
                                        'type' => DepDrop::TYPE_SELECT2,
                                        'pluginOptions' => [
                                            'depends' => ['id_program'],
                                            'placeholder' => 'Pilih Program Studi',
                                            'url' => [\yii\helpers\Url::toRoute(['dokumentasi/cari-dok'])],

                                        ]
                                    ])->label('Program Studi')?>
                                    <?=$form->field($model,'dokumentasi_untuk')->dropDownList(['prodi'=>'Program Studi'],['prompt'=>'Pilih dokumentasi untuk'])?>

                                <div class="form-group">
                                    <?=Html::submitButton('Cari',['class'=>'btn btn-rose'])?>
                                </div>

                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="pill3">
                        <div class="card">
                            <div class="card-content">
                                <h4 class="card-title">Form Dokumentasi</h4>
                                <?php $form = ActiveForm::begin() ?>

                                <?= $form->field($modelFakultas, 'akreditasi')->dropDownList($dataAkreditasi, ['prompt' => 'Pilih S7Akreditasi']) ?>
                                <?= $form->field($modelFakultas, 'jenjang')->dropDownList($dataProgram, ['id' => 'jenjang', 'prompt' => 'Pilih Jenjang']) ?>
                                <?= $form->field($modelFakultas, 'id_fakultas')->widget(\kartik\select2\Select2::class,[
                                    'data' =>ArrayHelper::map(\common\models\FakultasAkademi::find()->all(),'id','nama')
                                ])->label('Fakultas') ?>
                                <?= $form->field($modelFakultas, 'dokumentasi_untuk')->dropDownList(['fakultas' => 'Fakultas'], ['prompt' => 'Pilih borang untuk']) ?>

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
                                <h4 class="card-title">Form Dokumentasi</h4>
                                <?php $form = ActiveForm::begin() ?>

                                <?=$form->field($modelInstitusi,'akreditasi')->dropDownList($dataAkreditasiInstitusi,['prompt'=>'Pilih Akreditasi'])?>
                                <?=$form->field($modelInstitusi,'dokumentasi_untuk')->dropDownList(['institusi'=>'Institusi'],['prompt'=>'Pilih borang untuk'])?>

                                <div class="form-group">
                                    <?=Html::submitButton('Cari',['class'=>'btn btn-rose'])?>
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