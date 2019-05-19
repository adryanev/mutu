<?php

use akreditasi\models\BorangS1ProdiStandar1Form;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Progress;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model BorangS1ProdiStandar1Form */
/* @var $detailModel \common\models\DetailBorangS1ProdiStandar1 */
/* @var $detail \yii\db\ActiveQuery */
/** @var array $poin */
$this->title='Standar 1';
$this->params['breadcrumbs'][] = ['label'=>'Isi Borang','url'=>['borang-s1-prodi/isi','borang'=>$model->id_borang_s1_prodi]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Standar 1</h4>
                <p class="category">Kelengkapan Berkas : <?=$model->progress?>%</p>

                <?=
                Progress::widget([
                    'percent' => $model->progress,
                    'label' => 'test',
                    'barOptions' => ['class' => 'progress-bar-info'],
                    'options' => ['class' => 'progress-striped']
                ]);?>

            </div>


            <div class="card-content">


                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                        foreach ($poin as $key=>$value):
                            $modelAttribute = '_' .str_replace('.','_',$value['nomor']);
                    ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="heading<?=$key?>">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?=$key?>" aria-controls="collapse<?=$key?>">
                                        <h4 class="panel-title">
                                            <?=
                                            $value['nomor']?> <br><small style="font-size:13px;color:grey"><?= $value['judul']?>  </small>
                                            <i class="material-icons">keyboard_arrow_down</i>
                                        </h4>
                                    </a>
                                </div>
                                <div id="collapse<?=$key?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$key?>">
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <?=$value['penjelasan']?>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>


                                        <div class="row">

                                            <div class="col-md-12">
                                                <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]) ?>

                                                <?=$form->field($model,$modelAttribute)->widget(CKEditor::class,[
                                                    'options' => ['rows' => 6],
                                                    'preset' => 'full'
                                                ])->label('') ?>

                                                <div class="form-group">
                                                    <?= Html::submitButton('Simpan',['class'=>'btn btn-rose pull-right'])?>
                                                </div>
                                                <?php ActiveForm::end() ?>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Dokumen Pendukung</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>

                                                    </table>
                                                </div>
                                                <?php
                                                $detail1 = $detail->where(['nomor_dokumen'=>$value['nomor']])->all();
                                                foreach ($detail1 as $item):
                                                    ?>

                                                <?php endforeach;?>

                                                <?php Modal::begin([
                                                    'header' => 'Upload Dokumen Pendukung Borang',
                                                    'toggleButton' => ['label' => '<i class="material-icons">backup</i> &nbsp;upload','class'=>'btn btn-default btn-sm pull-right'],
                                                    'size' => 'modal-lg',
                                                    'clientOptions' => ['backdrop' => 'blur', 'keyboard' => true]
                                                ])?>
                                                <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]) ?>

                                                <?=$form->field($detailModel,'nomorDokumen')->textInput(['value'=>$value['nomor'],'readonly'=>true])?>
                                                <?=$form->field($detailModel,'dokumenPendukung')->widget(FileInput::class,[
                                                       'options' => ['id'=>'dokumenPendukung'.$modelAttribute],
                                                    'pluginOptions' => [
                                                        'showUpload'=>false
                                                    ]
                                                ])?>
                                                <div class="form-group">
                                                    <?=Html::submitButton('Simpan',['class'=>'btn btn-rose'])?>
                                                </div>
                                                <?php ActiveForm::end() ?>

                                                <?php Modal::end()?>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                    <?php endforeach; ?>

                </div>


            </div>
        </div>
    </div>

</div>