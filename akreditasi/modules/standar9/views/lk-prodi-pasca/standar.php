<?php

use akreditasi\models\DokumentasiInstitusiStandar1Form;
use common\models\S7DokumentasiInstitusi;
use dosamigos\ckeditor\CKEditor;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\bootstrap\Html;
use kartik\file\FileInput;
use yii\bootstrap\Progress;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $dokProdi S7DokumentasiInstitusi */
/* @var $progress */
/* @var $butir */
/* @var $dokModel \akreditasi\models\S7DokumentasiInstitusiStandar1Form */
$standar = $json['standar'];

$this->title='Kriteria '.$standar;
$this->params['breadcrumbs'][] = ['label'=>'Pencarian isi Dokumentasi','url'=>['dokumentasi/arsip-dok',]];
$this->params['breadcrumbs'][] = ['label'=>'Isi Dokumentasi','url'=>['dokumentasi-institusi/isi','dokumentasi'=>1]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">


    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Kriteria <?=$_GET['standar']?></h4>
                <p class="category">Kelengkapan Berkas : 60%</p>

                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                        <span class="sr-only">100% Complete</span>
                    </div>
                </div>

            </div>

            <div class="card-content">




                <div class="panel-group" id="accordionn" role="tablist" aria-multiselectable="true">
                    <?php foreach ($json['butir'] as $key =>$value):?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOnee">
                                <a role="button" data-toggle="collapse" data-parent="#accordionn" href="#collapseOnee" aria-expanded="true" aria-controls="collapseOnee">
                                    <h4 class="panel-title">
                                        <?=$value['tabel']?><br><small style="font-size:13px;color:grey"><?=$value['isi']?>.</small>
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseOnee" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOnee">
                                <div class="panel-body">

                                    <div class="col-md-12 table-responsive ">
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

                                            <?php foreach ($value['dokumen_sumber'] as $k =>$sumber): ?>

                                                <tr>
                                                    <td><?=$sumber['kode']?></td>
                                                    <td><?=$sumber['dokumen']?></td>
                                                    <td><button class="btn btn-default btn-sm"><i class="material-icons">backup</i> &nbsp;upload</button></td>
                                                </tr>

                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-12 table-responsive ">
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
                                            <?php foreach ($value['dokumen_pendukung'] as $k =>$sumber): ?>

                                                <tr>
                                                    <td><?=$sumber['kode']?></td>
                                                    <td><?=$sumber['dokumen']?></td>
                                                    <td><button class="btn btn-default btn-sm"><i class="material-icons">backup</i> &nbsp;upload</button></td>
                                                </tr>

                                            <?php endforeach; ?>

                                            </tbody>
                                        </table>
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