<?php

use akreditasi\models\S7DokumentasiPascaProdiStandar1Form;
use common\models\S7DokumentasiPascaProdi;
use dosamigos\ckeditor\CKEditor;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\bootstrap\Html;
use kartik\file\FileInput;
use yii\bootstrap\Progress;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $dokProdi S7DokumentasiPascaProdi*/
/* @var $cari*/
/* @var $progress*/
/* @var $butir*/
/* @var $nomor*/
/* @var $dokumen*/
/* @var $dokModel S7DokumentasiPascaProdiStandar1Form*/
$standar = $json['standar'];

$this->title='Standar '.$standar;
$this->params['breadcrumbs'][] = ['label'=>'Pencarian Isi Dokumentasi','url'=>['dokumentasi/arsip-dok','target'=>$cari]];
$this->params['breadcrumbs'][] = ['label'=>'Isi Dokumentasi','url'=>['dokumentasi-s1-prodi/isi','dokumentasi'=>$dokProdi->id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $this->title; ?></h4>
                <p class="category">Kelengkapan Berkas : <?= $progress; ?> %</p>

                <?=
                Progress::widget([
                    'percent' => $progress,
                    'label' => 'test',
                    'barOptions' => ['class' => 'progress-bar-info'],
                    'options' => ['class' => 'progress-striped']
                ]);
                ?>

            </div>

            <div class="card-content">




                <div class="panel-group" id="accordionn" role="tablist" aria-multiselectable="true">

                    <?php foreach ($butir as $key => $value) {
                        $color = '#ea2c6d';
                        if ($dokumen[$key] == $nomor[$key]){
                            $color = 'grey';
                        }
                        ?>
                
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading<?= $key ?>">
                            <a role="button" data-toggle="collapse" data-parent="#accordionn" href="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                                <h4 class="panel-title">
                                    <?= $value['nomor'] ?><br><small style="font-size:14px;color:grey"><?= $value['isi'] ?></small>
                                    <i class="material-icons">keyboard_arrow_down</i>
                                    <span class="badge" style="float: right;background-color: <?= $color ?>;" rel="tooltip" title="Jumlah / Total Kode Dokumen" ><?= $dokumen[$key] ?> / <?= $nomor[$key] ?></span>

                                </h4>
                            </a>
                        </div>
                        <div id="collapse<?= $key ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $key ?>">
                            <div class="panel-body">
                   
                                <div class="col-md-12  ">
                                    <table class="table table-hover">
                                        <thead data-background-color="green">
                                        <tr>
                                            <th colspan="3" class="text-center">Dokumen sumber</th>
                                        </tr>
                                        <tr>
                                            <th>Kode</th>
                                            <th colspan="2">Dokumen</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($value['dokumen_sumber'] as $key => $sumber) {
                                            
                                            $clear = trim($sumber['kode']);
                                            $kodeSumber = '_'.str_replace('.','_',$clear);
                                            $btn = 'rose';
                                            
                                            ?>
                                        <tr>
                                            <td style="font-weight: normal;font-size: 15px"><?= $sumber['kode'] ?></td>
                                            <td style="font-weight: normal;font-size: 15px"><?= $sumber['dokumen'] ?></td>
                                            <td>

                                            <?php
                                            if (isset($sumber['kode'])){
                                            ?>

                                            <?php Modal::begin([
                                                'header' => 'Upload Dokumen Dokumentasi',
                                                'toggleButton' => ['label' => '<i class="material-icons">backup</i> &nbsp;Upload','class'=>'btn btn-'.$btn.' btn-sm pull-right'],
                                                'size' => 'modal-lg',
                                                'clientOptions' => ['backdrop' => 'blur', 'keyboard' => true]
                                            ]); ?>

                                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                                            <?=$form->field($dokModel,'kodeDokumen')->textInput(['value'=>$sumber['kode'],'readonly'=>true])?>

                                            <?= $form->field($dokModel,'dokumenDokumentasi')->widget(FileInput::class,[
                                                    'options' => ['id'=>'dokumenDokumentasi'.$kodeSumber],
                                                    'pluginOptions' => [
                                                        'showUpload'=>false
                                                    ]
                                            ]) ?>

                                            <div class="form-group">
                                                <?=Html::submitButton('Simpan',['class'=>'btn btn-rose ']) ?>
                                            </div>
                                            <?php ActiveForm::end() ?>

                                            <?php Modal::end(); ?>

                                            <?php } else{ echo '<tr><td>Tidak ada dokumen</td></tr>';}?>

                                            </td>
                                            
                                            </tr>
                                            <?php  foreach ($model as $key => $item) { if($sumber['kode'] == $item['kode'])  {
                                                $publik = $item['is_publik'];
                                                $asesor = $item['is_asesor'];?>
                                            <tr>
                                            <td></td>
                                            <td>
                                                <?= $item['dokumen']; ?>
                                            </td>
                                            <td>
                                                <?=Html::a('<i class="material-icons">cloud_download</i> &nbsp;Download',['dokumentasi-s1-prodi/download-dok','standar'=> $standar,'dok'=>$item['id'], 'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-info'])?>
                                                <br>
                                                <?php if($publik === 0) { echo Html::a('<i class="material-icons">lock</i> &nbsp;Tidak Publik',['dokumentasi-s1-prodi/publik-standar','id'=>$item->id,'publik'=>1,'standar'=>$standar,'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-warning']); }
                                                else { echo Html::a('<i class="material-icons">public</i> &nbsp;Publik',['dokumentasi-s1-prodi/publik-standar','id'=>$item->id,'publik'=>0,'standar'=>$standar,'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-success']);}
                                                ?>
                                                <br>
                                                <?php if($asesor === 0) { echo Html::a('<i class="material-icons">priority_high</i> &nbsp;Tidak Asesor',['dokumentasi-s1-prodi/asesor-standar','id'=>$item->id,'asesor'=>1,'standar'=>$standar,'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-warning']); }
                                                else { echo Html::a('<i class="material-icons">school</i> &nbsp;Asesor',['dokumentasi-s1-prodi/asesor-standar','id'=>$item->id,'asesor'=>0,'standar'=>$standar,'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-success']);}
                                                ?>
                                                <br>
                                                <?=Html::a('<i class="material-icons">delete</i> &nbsp;Hapus',['dokumentasi-s1-prodi/hapus-standar'],['class'=>'btn btn-sm btn-danger',
                                                'data'=>[
                                                    'method'=>'POST',
                                                    'confirm'=>'Apakah anda yakin menghapus item ini ?',
                                                    'params'=>['id'=>$item->id, 'standar'=>$standar, 'dokumentasi'=>$_GET['dokumentasi']]
                                                ]])?>
                                            </td>
                                            </tr>
                                                 
                                            

                                            <?php }} } ?>

                                        </tbody>
                                    </table>
                                </div>
                        
                                <div class="col-md-12 ">
                                    <table class="table table-hover">
                                        <thead data-background-color="green">
                                        <tr>
                                            <th colspan="3" class="text-center">Dokumen Pendukung</th>
                                        </tr>
                                        <tr>
                                            <th>Kode</th>
                                            <th colspan="2">Dokumen</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php foreach ($value['dokumen_pendukung'] as $key => $pendukung) {

                                        if (isset($pendukung['kode'])){

                                        $kodePendukung = str_replace('.','',trim($pendukung['kode']));
                                        ?>
                                        <tr>

                                            <td style="font-weight: normal;font-size: 15px"><?= $pendukung['kode'] ?></td>
                                            <td style="font-weight: normal;font-size: 15px"><?= $pendukung['dokumen'] ?></td>
                                            <td>

                                            <?php Modal::begin([
                                                'header' => 'Upload Dokumen Dokumentasi',
                                                'toggleButton' => ['label' => '<i class="material-icons">backup</i> &nbsp;Upload','class'=>'btn btn-rose btn-sm pull-right'],
                                                'size' => 'modal-lg',
                                                'clientOptions' => ['backdrop' => 'blur', 'keyboard' => true]
                                            ]); ?>

                                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                                            <?=$form->field($dokModel,'kodeDokumen')->textInput(['value'=>$pendukung['kode'],'readonly'=>true])?>

                                            <?= $form->field($dokModel,'dokumenDokumentasi')->widget(FileInput::class,[
                                                    'options' => ['id'=>'dokumenDokumentasi'.$kodePendukung],
                                                    'pluginOptions' => [
                                                            'showUpload'=>false,
                                                    ]
                                            ]) ?>
                                            

                                            <div class="form-group">
                                                <?=Html::submitButton('Simpan',['class'=>'btn btn-rose ']) ?>
                                            </div>
                                            <?php ActiveForm::end() ?>

                                            <?php Modal::end(); ?>

                                            <?php } else{ echo '<tr><td>Tidak ada dokumen</td></tr>';}?>
                                            
                                            </td>

                                        </tr>

                                            <?php  foreach ($model as $key => $item) { if($pendukung['kode'] == $item['kode'])  {
                                                $publik = $item['is_publik'];
                                                $asesor = $item['is_asesor'];?>
                                            <tr>
                                            <td></td>
                                            <td>
                                                <?= $item['dokumen']; ?>
                                            </td>
                                            <td>
                                            <?=Html::a('<i class="material-icons">cloud_download</i> &nbsp;Download',['dokumentasi-s1-prodi/download-dok','standar'=> $standar,'dok'=>$item->id, 'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-info'])?>
                                            <br>
                                            <?php if($publik === 0) { echo Html::a('<i class="material-icons">lock</i> &nbsp;Tidak Publik',['dokumentasi-s1-prodi/publik-standar','id'=>$item['id'],'publik'=>1,'standar'=>$standar,'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-warning']); }else{ echo Html::a('<i class="material-icons">public</i> &nbsp;Publik',['dokumentasi-s1-prodi/publik-standar','id'=>$item['id'],'publik'=>0,'standar'=>$standar,'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-success']);}
                                            ?>
                                            <br>
                                            <?php if($asesor === 0) { echo Html::a('<i class="material-icons">priority_high</i> &nbsp;Tidak Asesor',['dokumentasi-s1-prodi/asesor-standar','id'=>$item->id,'asesor'=>1,'standar'=>$standar,'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-warning']); }
                                            else { echo Html::a('<i class="material-icons">school</i> &nbsp;Asesor',['dokumentasi-s1-prodi/asesor-standar','id'=>$item->id,'asesor'=>0,'standar'=>$standar,'dokumentasi'=>$_GET['dokumentasi']],['class'=>'btn btn-sm btn-success']);}
                                            ?>
                                            <br>
                                            <?=Html::a('<i class="material-icons">delete</i> &nbsp;Hapus',['dokumentasi-s1-prodi/hapus-standar'],['class'=>'btn btn-sm btn-danger',
                                            'data'=>[
                                                'method'=>'POST',
                                                'confirm'=>'Apakah anda yakin menghapus item ini ?',
                                                'params'=>['id'=>$item->id, 'standar'=>$standar, 'dokumentasi'=>$_GET['dokumentasi']]
                                            ]])?>
                                            </td>
                                            
                                            
                                        </tr>
                                        <?php }}} ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php } ?>

                    
                </div>


            </div>
        </div>
    </div>

</div>
