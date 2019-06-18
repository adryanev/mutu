<?php

use akreditasi\models\BorangInstitusiForm;
use common\models\S7BorangInstitusi;
use common\models\S7BorangInstitusiStandar1;
use common\models\S7BorangInstitusiStandar2;
use common\models\S7BorangInstitusiStandar3;
use common\models\S7BorangInstitusiStandar4;
use common\models\S7BorangInstitusiStandar5;
use common\models\S7BorangInstitusiStandar6;
use common\models\S7BorangInstitusiStandar7;
use common\models\S7DokumenBorangInstitusi;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Progress;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $borangInstitusi S7BorangInstitusi */
/* @var $dokumenBorang BorangInstitusiForm */
/* @var $dataDokumenBorang S7DokumenBorangInstitusi */
/* @var $standar1 S7BorangInstitusiStandar1 */
/* @var $standar2 S7BorangInstitusiStandar2 */
/* @var $standar3 S7BorangInstitusiStandar3 */
/* @var $standar4 S7BorangInstitusiStandar4 */
/* @var $standar5 S7BorangInstitusiStandar5 */
/* @var $standar6 S7BorangInstitusiStandar6 */
/* @var $standar7 S7BorangInstitusiStandar7 */
/* @var $json */

$this->title='Isi Borang';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">file_copy</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Form Borang</h4>

                <div class="col-md-12 table-responsive ">
                    <table class="table table-hover">
                        <!-- <thead class="text-primary">
                            <tr>
                                <th class="text-center">Akreditasi</th>
                                <th class="text-center">Kadaluarsa</th>
                                <th class="text-center">Total Prodi</th>
                                <th class="text-center">Presentase</th>
                            </tr>
                        </thead> -->
                        <tbody>
                        <tr>
                            <td><strong>Borang</strong></td>
                            <td>Akreditasi Prodi S1</td>
                        </tr>
                        <tr>
                            <td><strong>Lembaga Akreditasi</strong></td>
                            <td><?=Html::encode($borangInstitusi->akreditasiInstitusi->akreditasi->lembaga)?></td>
                        </tr>
                        <tr>
                            <td><strong>Versi Akreditasi</strong></td>
                            <td><?=Html::encode($borangInstitusi->akreditasiInstitusi->akreditasi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Akreditasi</strong></td>
                            <td><?=Html::encode($borangInstitusi->akreditasiInstitusi->akreditasi->jenisAkreditasi->nama)?></td>
                        </tr>
                       
                        <tr>
                            <td><strong>Borang Untuk</strong></td>
                            <td>Institusi</td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Isi Borang</h4>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 table-responsive ">
                        <table class="table table-hover">

                            <thead data-background-color="rose">
                            <tr>
                                <th>Dokumen Borang</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php foreach ($dataDokumenBorang as $item) :?>
                                <tr>
                                    <td>  <?=$item->nama_dokumen?></td>
                                    <td> <?=Html::a('<i class ="material-icons">send</i> Download',['borang-institusi/download','dokumen'=>$item->id],['class'=>'btn btn-info']) ?> <?=Html::a('<i class ="material-icons">delete</i> Hapus',['borang-institusi/hapus-dokumen'],['class'=>'btn btn-danger','data'=>[
                                            'method'=>'POST',
                                            'confirm'=>'Apakah anda yakin menghapus item ini?',
                                            'params'=>['id'=>$item->id]
                                        ]])?></td>
                                </tr>

                            <?php endforeach;?>

                            </tbody>
                        </table>

                    </div>
                </div>

                <?php Modal::begin([
                    'header' => 'Upload Dokumen Borang',
                    'toggleButton' => ['label' => '<i class="material-icons">backup</i> &nbsp;upload','class'=>'btn btn-default btn-sm pull-right'],
                    'size' => 'modal-lg',
                    'clientOptions' => ['backdrop' => 'blur', 'keyboard' => true]
                ]); ?>

                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                <?= $form->field($dokumenBorang,'dokumenBorang')->widget(FileInput::class,[
                    'pluginOptions' => [
                        'showUpload'=>false,
                    ]
                ]) ?>

                <div class="form-group">
                    <?=Html::submitButton('Simpan',['class'=>'btn btn-rose']) ?>
                </div>
                <?php ActiveForm::end() ?>

                <?php Modal::end(); ?>
                <div class="clearfix"></div>
                <p class="category">Kelengkapan Berkas : <?=Html::encode($borangInstitusi->progress)?>%</p>
                <?=
                Progress::widget([
                    'percent' => $borangInstitusi->progress,
                    'label' => 'test',
                    'barOptions' => ['class' => 'progress-bar-info'],
                    'options' => ['class' => 'progress-striped']
                ]);?>

            </div>

            <div class="card-content">

                <div class="col-md-12 table-responsive ">
                    <table class="table table-hover">
                        <thead data-background-color="green">
                        <tr>
                            <th>No.</th>
                            <th colspan="2">Standar Akreditasi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>1</td>
                            <td colspan="2">
                                Standar 1 : <?= $standar1 === null ? 0: $standar1->progress?>%<br><small style="color:grey"> VISI, MISI, TUJUAN DAN SASARAN, SERTA STRATEGI PENCAPAIAN</small>

                                <?=
                                Progress::widget([
                                    'percent' => $standar1->progress,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>

                            <td><?= Html::a('Lihat',['borang-institusi/isi-standar','standar'=>1,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td colspan="2">
                                Standar 2 : <?=$standar2 === null ? 0: $standar2->progress?>%<br><small style="color:grey">TATA PAMONG, KEPEMIMPINAN, SISTEM PENGELOLAAN, DAN PENJAMINAN MUTU</small>
                                <?=
                                Progress::widget([
                                    'percent' => $standar2->progress,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/isi-standar','standar'=>2,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td colspan="2">
                                Standar 3 : <?=$standar3 === null ? 0: $standar3->progress?>%<br><small style="color:grey">MAHASISWA DAN LULUSAN</small>

                                <?=
                                Progress::widget([
                                    'percent' => $standar3->progress,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/isi-standar','standar'=>3,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td colspan="2">
                                Standar 4 : <?=$standar4 === null ? 0: $standar4->progress?>%<br><small style="color:grey">SUMBER DAYA MANUSIA</small>

                                <?=
                                Progress::widget([
                                    'percent' => $standar4->progress,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/isi-standar','standar'=>4,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td colspan="2">
                                Standar 5 : <?=$standar5 === null ? 0: $standar5->progress?>%<br><small style="color:grey">KURIKULUM, PEMBELAJARAN, DAN SUASANA AKADEMIK</small>

                                <?=
                                Progress::widget([
                                    'percent' => $standar5->progress,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/isi-standar','standar'=>5,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td colspan="2">
                                Standar 6 : <?=$standar6 === null ? 0: $standar6->progress?>%<br><small style="color:grey">PEMBIAYAAN, SARANA DAN PRASARANA, SERTA SISTEM INFORMASI</small>

                                <?=
                                Progress::widget([
                                    'percent' => $standar6->progress,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/isi-standar','standar'=>6,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td colspan="2">
                                Standar 7 : <?=$standar7 === null ? 0: $standar7->progress?>%<br> <small style="color:grey">PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</small>

                                <?=
                                Progress::widget([
                                    'percent' => $standar7->progress,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/isi-standar','standar'=>7,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>