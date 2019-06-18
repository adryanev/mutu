<?php

use akreditasi\models\S7BorangS1FakultasStandar1Form;
use akreditasi\models\IsianBorangS1FakultasUploadForm;
use common\models\S7DetailBorangS1FakultasStandar1;
use common\models\S7IsianBorang;
use common\models\S7IsianBorangS1Fakultas;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Progress;
use yii\db\ActiveQuery;
use yii\web\View;

/* @var $this View */
/* @var $model S7BorangS1FakultasStandar1Form */
/* @var $detailModel S7DetailBorangS1FakultasStandar1 */
/* @var $modelIsian IsianBorangS1FakultasUploadForm*/
/* @var $detail ActiveQuery */
/* @var $template ActiveQuery */
/* @var $isian ActiveQuery */
/** @var array $poin */
$standar = $json['standar'];

$this->title='Standar '.$standar;
$this->params['breadcrumbs'][] = ['label'=>'Isi Borang','url'=>['borang-s1-fakultas/isi','borang'=>$model->id_borang_s1_fakultas]];
$this->params['breadcrumbs'][] = $this->title;
$query = $isian;

?>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?=$this->title?></h4>
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
                                        <?php if($value['isian']): ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="text-black-50">Isian Borang</h3>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">

                                                                <h6 class="pull-left">File Isian Borang</h6>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php Modal::begin([
                                                                    'header' => 'Upload isian borang',
                                                                    'toggleButton' => ['label' => '<i class="material-icons">backup</i> &nbsp;upload isian borang','class'=>'btn btn-default btn-sm pull-right'],
                                                                    'size' => 'modal-lg',
                                                                    'clientOptions' => ['backdrop' => 'blur', 'keyboard' => true]
                                                                ])?>
                                                                <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]) ?>

                                                                <?=$form->field($modelIsian,'nomor_borang')->textInput(['value'=>$value['nomor'],'readonly'=>true])?>
                                                                <?=$form->field($modelIsian,'nama_file')->widget(FileInput::class,[
                                                                    'options' => ['id'=>'isianBorang'.$modelAttribute],
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
                                                            <table class="table table-striped table-hover">
                                                                <thead data-background-color="blue">
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Nama File</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                        <?php
                                                                        $nomor = S7IsianBorang::findOne(['nomor_borang'=>$value['nomor'],'untuk'=>'fakultas']);
                                                                        $data = S7IsianBorangS1Fakultas::find()->where(['id_borang_s1_fakultas'=>$_GET['borang'],'id_isian_borang'=>$nomor->id])->all();
                                                                        foreach ($data as $f =>$file):
                                                                        ?>

                                                                        <tr>
                                                                            <td><?=$f+1?></td>
                                                                            <td><?=$file->nama_file?></td>
                                                                            <td>
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <?=Html::a('Download',['borang-s1-fakultas/download-isian','id'=>$file->id,'borang'=>$_GET['borang']],[
                                                                                            'class'=>'btn btn-info'
                                                                                        ])?>
                                                                                        <?=Html::a('Hapus',['borang-s1-fakultas/hapus-isian'],[
                                                                                            'class'=>'btn btn-danger',
                                                                                            'data'=>[
                                                                                                'method'=>'POST',
                                                                                                'confirm'=>'Apakah anda yakin menghapus item ini?',
                                                                                                'params'=>['id'=>$file->id,'borang'=>$_GET['borang'],'standar'=>$standar]
                                                                                            ]
                                                                                        ])?>

                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        </tr>

                                                                <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Download Template</h6>
                                                        <div class="table-responsive">
                                                            <table class="table table-striped table-hover">
                                                                <tbody>
                                                                <tr>
                                                                    <?php $fileTemplate = $template->where(['nomor_borang'=>$value['nomor']])->one();?>
                                                                    <td><?=$fileTemplate->nama_file?></td>
                                                                    <td><?=Html::a('<i class="material-icons">send</i> Download',['borang-s1-fakultas/download-template','id'=>$fileTemplate->id],['class'=>'btn btn-success btn-sm'])?></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <?php endif;?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="text-black-50">Dokumen Pendukung</h4>
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover">
                                                        <thead data-background-color="purple">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Dokumen Pendukung</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        <?php
                                                        $detail1 = $detail->where(['nomor_dokumen'=>$value['nomor']])->all();

                                                        foreach ($detail1 as $k => $item):
                                                            ?>
                                                        <td><?=$k+1?></td>
                                                            <td><?=$item->nama_dokumen?></td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <?=Html::a('Download',['borang-s1-fakultas/download-detail','standar'=>$standar,'dokumen'=>$item->id,'borang'=>$_GET['borang']],[
                                                                                'class'=>'btn btn-info'
                                                                        ])?>
                                                                        <?=Html::a('Hapus',['borang-s1-fakultas/hapus-detail'],[
                                                                                'class'=>'btn btn-danger',
                                                                                'data'=>[
                                                                                        'method'=>'POST',
                                                                                        'confirm'=>'Apakah anda yakin menghapus item ini?',
                                                                                        'params'=>['id'=>$item->id,'standar'=>$standar,'borang'=>$_GET['borang']]
                                                                                ]
                                                                        ])?>

                                                                    </div>
                                                                </div>
                                                            </td>
                                                        <?php endforeach;?>
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <?php Modal::begin([
                                                    'header' => 'Upload Dokumen Pendukung Borang',
                                                    'toggleButton' => ['label' => '<i class="material-icons">backup</i> &nbsp;upload Dokumen Pendukung','class'=>'btn btn-default btn-sm pull-right'],
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