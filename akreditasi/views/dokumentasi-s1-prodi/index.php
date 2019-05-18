<?php

use akreditasi\models\DokumentasiS1ProdiForm;
use common\models\DokumentasiS1Prodi;
use common\models\DokumentasiS1ProdiStandar1;
use common\models\DokumentasiS1ProdiStandar2;
use common\models\DokumentasiS1ProdiStandar3;
use common\models\DokumentasiS1ProdiStandar4;
use common\models\DokumentasiS1ProdiStandar5;
use common\models\DokumentasiS1ProdiStandar6;
use common\models\DokumentasiS1ProdiStandar7;
// use common\models\DokumenBorangS1Prodi;
use yii\bootstrap\Html;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $borangProdi DokumentasiS1Prodi */
/* @var $standar1 DokumentasiS1ProdiStandar1 */
/* @var $standar2 DokumentasiS1ProdiStandar2 */
/* @var $standar3 DokumentasiS1ProdiStandar3 */
/* @var $standar4 DokumentasiS1ProdiStandar4 */
/* @var $standar5 DokumentasiS1ProdiStandar5 */
/* @var $standar6 DokumentasiS1ProdiStandar6 */
/* @var $standar7 DokumentasiS1ProdiStandar7 */
/* @var $json */

$this->title='Isi Dokumentasi';
$this->params['breadcrumbs'][] = $this->title;


 ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">file_copy</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Form Dokumentasi</h4>

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
                            <td><strong>Dokumentasi</strong></td>
                            <td>Akreditasi Prodi S1</td>
                        </tr>
                        <tr>
                            <td><strong>Lembaga Akreditasi</strong></td>
                            <td><?=Html::encode($dokumentasiProdi->akreditasiProdiS1->akreditasi->lembaga)?></td>
                        </tr>
                        <tr>
                            <td><strong>Versi Akreditasi</strong></td>
                            <td><?=Html::encode($dokumentasiProdi->akreditasiProdiS1->akreditasi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Akreditasi</strong></td>
                            <td><?=Html::encode($dokumentasiProdi->akreditasiProdiS1->akreditasi->jenisAkreditasi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenjang</strong></td>
                            <td><?=Html::encode($dokumentasiProdi->akreditasiProdiS1->prodi->program->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Borang Untuk</strong></td>
                            <td>Program Studi</td>
                        </tr>
                        <tr>
                            <td><strong>Prodi</strong></td>
                            <td><?=Html::encode($dokumentasiProdi->akreditasiProdiS1->prodi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td>
                            <?php 
                                $status = $dokumentasiProdi->is_publik; 
                            
                            
                            ?>
                            </td>
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
                <p class="category">Kelengkapan Berkas : <?=Html::encode($dokumentasiProdi->progress)?>%</p>

                

                <div class="progress">
                    <div class="progress-bar <?=$dokumentasiProdi->progress < 30 ? 'progress-bar-danger' : (($dokumentasiProdi->progress >30 && $dokumentasiProdi->progress<=60 )? 'progress-bar-warning': 'progress-bar-info') ?>" role="progressbar" aria-valuenow="<?=Html::encode($dokumentasiProdi->progress)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=Html::encode($dokumentasiProdi->progress)?>%;">
                        <span class="sr-only"><?=Html::encode($dokumentasiProdi->progress)?>% Complete</span>
                    </div>
                </div>

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

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$standar1 === null ? 0: $standar1->progress ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$standar1 === null ? 0: $standar1->progress?>%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi/lihat'],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td colspan="2">
                                Standar 2 : <?=$standar2 === null ? 0: $standar2->progress?>%<br><small style="color:grey">TATA PAMONG, KEPEMIMPINAN, SISTEM PENGELOLAAN, DAN PENJAMINAN MUTU</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$standar2 === null ? 0: $standar2->progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$standar2 === null ? 0: $standar2->progress?>%;">
                                        <span class="sr-only"><?=$standar2 === null ? 0: $standar2->progress?>% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi/lihat-penanggung'],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td colspan="2">
                                Standar 3 : <?=$standar3 === null ? 0: $standar3->progress?>%<br><small style="color:grey">MAHASISWA DAN LULUSAN</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$standar3 === null ? 0: $standar3->progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$standar3 === null ? 0: $standar3->progress?>%;">
                                        <span class="sr-only"><?=$standar3 === null ? 0: $standar3->progress?>% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi/lihat-penanggung'],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td colspan="2">
                                Standar 4 : <?=$standar4 === null ? 0: $standar4->progress?>%<br><small style="color:grey">SUMBER DAYA MANUSIA</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$standar4 === null ? 0: $standar4->progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$standar4 === null ? 0: $standar4->progress?>%;">
                                        <span class="sr-only"><?=$standar4 === null ? 0: $standar4->progress?>% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi/lihat-penanggung'],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td colspan="2">
                                Standar 5 : <?=$standar5 === null ? 0: $standar5->progress?>%<br><small style="color:grey">KURIKULUM, PEMBELAJARAN, DAN SUASANA AKADEMIK</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$standar5 === null ? 0: $standar5->progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$standar5 === null ? 0: $standar5->progress?>%;">
                                        <span class="sr-only"><?=$standar5 === null ? 0: $standar5->progress?>% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi/lihat-penanggung'],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td colspan="2">
                                Standar 6 : <?=$standar6 === null ? 0: $standar6->progress?>%<br><small style="color:grey">PEMBIAYAAN, SARANA DAN PRASARANA, SERTA SISTEM INFORMASI</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$standar6 === null ? 0: $standar6->progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$standar6 === null ? 0: $standar6->progress?>%;">
                                        <span class="sr-only"><?=$standar4 === null ? 0: $standar4->progress?>% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi/lihat-penanggung'],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td colspan="2">
                                Standar 7 : <?=$standar7 === null ? 0: $standar7->progress?>%<br> <small style="color:grey">PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$standar7 === null ? 0: $standar7->progress?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$standar7 === null ? 0: $standar7->progress?>%;">
                                        <span class="sr-only"><?=$standar7 === null ? 0: $standar7->progress?>% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi/isi-dok'],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>