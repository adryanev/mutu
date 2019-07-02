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
/* @var $cari */
/* @var $butir*/
$standar = $json['standar'];

$this->title='Standar '.$standar;
$this->params['breadcrumbs'][] = ['label'=>'Pencarian Penanggung Jawab Dokumentasi','url'=>['dokumentasi/arsip-dok','target'=>$cari]];
$this->params['breadcrumbs'][] = ['label'=>'Penanggung Jawab Dokumentasi','url'=>['dokumentasi-pasca-fakultas/pj','dokumentasi'=>$dokProdi->id]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $this->title; ?></h4>

                

            </div>

            <div class="card-content">




                <div class="panel-group" id="accordionn" role="tablist" aria-multiselectable="true">

                    <?php foreach ($butir as $key => $value) { ?>
                
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading<?= $key ?>">
                            <a role="button" data-toggle="collapse" data-parent="#accordionn" href="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
                                <h4 class="panel-title">
                                    <?= $value['nomor'] ?><br><small style="font-size:13px;color:grey"><?= $value['isi'] ?></small>
                                    <i class="material-icons">keyboard_arrow_down</i>
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
                                            
                                            ?>
                                        <tr>
                                            <td><?= $sumber['kode'] ?></td>
                                            <td colspan="2"><?= $sumber['dokumen'] ?></td>
                                            
                                            
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
                                                <small><p class="text-muted text-right">Penganggung Jawab :</p></small>
                                                <span class="label label-info pull-right"><?= $item->createdBy->profilUser->nama_lengkap ?></span>
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
                                        
                                        $kodePendukung = str_replace('.','',trim($pendukung['kode']));

                                        ?>
                                        <tr>

                                            <td><?= $pendukung['kode'] ?></td>
                                            <td colspan="2"><?= $pendukung['dokumen'] ?></td>
                                           

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
                                                <small><p class="text-muted text-right">Penganggung Jawab :</p></small>
                                                <span class="label label-info pull-right"><?= $item->createdBy->profilUser->nama_lengkap ?></span>
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
