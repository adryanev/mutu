<?php

use akreditasi\models\BorangPascaFakultasForm;
use common\models\S7BorangPascaFakultas;
use common\models\S7BorangPascaFakultasStandar1;
use common\models\S7BorangPascaFakultasStandar2;
use common\models\S7BorangPascaFakultasStandar3;
use common\models\S7BorangPascaFakultasStandar4;
use common\models\S7BorangPascaFakultasStandar5;
use common\models\S7BorangPascaFakultasStandar6;
use common\models\S7BorangPascaFakultasStandar7;
use common\models\S7DokumenBorangPascaFakultas;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Progress;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $borangProdi S7BorangPascaFakultas */
/* @var $dokumenBorang BorangPascaFakultasForm */
/* @var $dataDokumenBorang S7DokumenBorangPascaFakultas */
/* @var $standar1 S7BorangPascaFakultasStandar1 */
/* @var $standar2 S7BorangPascaFakultasStandar2 */
/* @var $standar3 S7BorangPascaFakultasStandar3 */
/* @var $standar4 S7BorangPascaFakultasStandar4 */
/* @var $standar5 S7BorangPascaFakultasStandar5 */
/* @var $standar6 S7BorangPascaFakultasStandar6 */
/* @var $standar7 S7BorangPascaFakultasStandar7 */
/* @var $json */

$this->title='Lihat Borang';
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
                            <td>Akreditasi Prodi Pasca</td>
                        </tr>
                        <tr>
                            <td><strong>Lembaga Akreditasi</strong></td>
                            <td><?=Html::encode($borangProdi->akreditasiProdiPasca->akreditasi->lembaga)?></td>
                        </tr>
                        <tr>
                            <td><strong>Versi Akreditasi</strong></td>
                            <td><?=Html::encode($borangProdi->akreditasiProdiPasca->akreditasi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Akreditasi</strong></td>
                            <td><?=Html::encode($borangProdi->akreditasiProdiPasca->akreditasi->jenisAkreditasi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenjang</strong></td>
                            <td><?=Html::encode($borangProdi->akreditasiProdiPasca->prodi->jenjang)?></td>
                        </tr>
                        <tr>
                            <td><strong>Borang Untuk</strong></td>
                            <td>Program Studi</td>
                        </tr>
                        <tr>
                            <td><strong>Prodi</strong></td>
                            <td><?=Html::encode($borangProdi->akreditasiProdiPasca->prodi->nama)?></td>
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
                <h4 class="card-title"><?=$this->title?></h4>
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
                                    <td> <?=Html::a('<i class ="material-icons">send</i> Download',['borang-pasca-fakultas/download','dokumen'=>$item->id],['class'=>'btn btn-info']) ?>
                                       </td>
                                </tr>

                            <?php endforeach;?>

                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="clearfix"></div>
                <p class="category">Kelengkapan Berkas : <?=Html::encode($borangProdi->progress)?>%</p>
                <?=
                Progress::widget([
                    'percent' => $borangProdi->progress,
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

                            <td><?= Html::a('Lihat',['borang-pasca-fakultas/lihat-standar','id'=>1,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['borang-pasca-fakultas/lihat-standar','id'=>2,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['borang-pasca-fakultas/lihat-standar','id'=>3,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['borang-pasca-fakultas/lihat-standar','id'=>4,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['borang-pasca-fakultas/lihat-standar','id'=>5,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['borang-pasca-fakultas/lihat-standar','id'=>6,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['borang-pasca-fakultas/lihat-standar','id'=>7,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>
