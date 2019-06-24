<?php

//use akreditasi\models\S7DokumentasiInstitusiForm;
use common\models\S7DokumentasiInstitusi;
use common\models\S7DokumentasiInstitusiStandar1;
use common\models\S7DokumentasiInstitusiStandar2;
use common\models\S7DokumentasiInstitusiStandar3;
use common\models\S7DokumentasiInstitusiStandar4;
use common\models\S7DokumentasiInstitusiStandar5;
use common\models\S7DokumentasiInstitusiStandar6;
use common\models\S7DokumentasiInstitusiStandar7;
// use common\models\DokumenBorangInstitusi;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Progress;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $borangProdi S7DokumentasiInstitusi */
/* @var $dokumentasiProdi S7DokumentasiInstitusi */
/* @var $standar1 S7DokumentasiInstitusiStandar1 */
/* @var $standar2 S7DokumentasiInstitusiStandar2 */
/* @var $standar3 S7DokumentasiInstitusiStandar3 */
/* @var $standar4 S7DokumentasiInstitusiStandar4 */
/* @var $standar5 S7DokumentasiInstitusiStandar5 */
/* @var $standar6 S7DokumentasiInstitusiStandar6 */
/* @var $standar7 S7DokumentasiInstitusiStandar7 */
/* @var $json */
/* @var $cari */
/* @var $progressDok */
/* @var $progress1 */
/* @var $progress2 */
/* @var $progress3 */
/* @var $progress4 */
/* @var $progress5 */
/* @var $progress6 */
/* @var $progress7 */

$this->title='Isi LED';
$this->params['breadcrumbs'][] = ['label'=>'Pencarian Isi Laporan Kinerja','url'=>['led-institusi/arsip-dok','target'=>$cari]];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">file_copy</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Form LED</h4>

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
                            <td>Borang BAN-PT Versi 2008 untuk Program Studi</td>
                        </tr>
                        <tr>
                            <td><strong>Lembaga Akreditasi</strong></td>
                            <td>BAN-PT</td>
                        </tr>
                        <tr>
                            <td><strong>Versi Akreditasi</strong></td>
                            <td>2008 untuk Sarjana (S1)</td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Akreditasi</strong></td>
                            <td>Program</td>
                        </tr>
                        <tr>
                            <td><strong>Jenjang</strong></td>
                            <td>S1</td>
                        </tr>
                        <tr>
                            <td><strong>Borang Untuk</strong></td>
                            <td>Program</td>
                        </tr>
                        <tr>
                            <td><strong>Prodi</strong></td>
                            <td>Teknik Informatika</td>
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
                <h4 class="card-title">Isi LED</h4>
                <p class="category">Kelengkapan Berkas : 60%</p>

                <div class="progress">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                        <span class="sr-only">60% Complete</span>
                    </div>
                </div>

            </div>

            <div class="card-content">

                <div class="col-md-12 table-responsive ">
                    <table class="table table-hover">
                        <thead data-background-color="green">
                        <tr>
                            <th>No.</th>
                            <th colspan="2">Kriteria Akreditasi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>1</td>
                            <td colspan="2">
                                Kriteria 1 : 60%<br><small style="color:grey"> VISI, MISI, TUJUAN DAN STRATEGI</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?=Html::a('Lihat',['led-institusi/isi-standar','dokumentasi'=>1,'standar'=>1],['class'=>['btn btn-rose']])?></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td colspan="2">
                                Kriteria 2 : 60%<br><small style="color:grey">TATA PAMONG,TATA KELOLA, dan KERJASAMA</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?=Html::a('Lihat',['led-institusi/isi-standar','dokumentasi'=>1,'standar'=>2],['class'=>['btn btn-rose']])?></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td colspan="2">
                                Kriteria 3 : 60%<br><small style="color:grey">MAHASISWA</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?=Html::a('Lihat',['led-institusi/isi-standar','dokumentasi'=>1,'standar'=>3],['class'=>['btn btn-rose']])?></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td colspan="2">
                                Kriteria 4 : 60%<br><small style="color:grey">SUMBER DAYA MANUSIA</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?=Html::a('Lihat',['led-institusi/isi-standar','dokumentasi'=>1,'standar'=>4],['class'=>['btn btn-rose']])?></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td colspan="2">
                                Kriteria 5 : 60%<br><small style="color:grey">KEUANGAN, SARANA DAN PRASARANA</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?=Html::a('Lihat',['led-institusi/isi-standar','dokumentasi'=>1,'standar'=>5],['class'=>['btn btn-rose']])?></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td colspan="2">
                                Kriteria 6 : 60%<br><small style="color:grey">PENDIDIKAN</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?=Html::a('Lihat',['led-institusi/isi-standar','dokumentasi'=>1,'standar'=>6],['class'=>['btn btn-rose']])?></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td colspan="2">
                                Kriteria 7 : 60%<br> <small style="color:grey">PENELITIAN</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?=Html::a('Lihat',['led-institusi/isi-standar','dokumentasi'=>1,'standar'=>7],['class'=>['btn btn-rose']])?></td>
                        </tr>


                        <tr>
                            <td>8</td>
                            <td colspan="2">
                                Kriteria 8 : 60%<br> <small style="color:grey">PENGABDIAN KEPADA MASYARAKAT</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?=Html::a('Lihat',['led-institusi/isi-standar','dokumentasi'=>1,'standar'=>8],['class'=>['btn btn-rose']])?></td>
                        </tr>


                        <tr>
                            <td>9</td>
                            <td colspan="2">
                                Kriteria  : 60%<br> <small style="color:grey">LUARAN DAN CAPAIAN TRIDHARMA</small>

                                <div class="progress">
                                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60" style="width: 60%;">
                                        <span class="sr-only">60% Complete</span>
                                    </div>
                                </div>
                            </td>

                            <td><?=Html::a('Lihat',['led-institusi/isi-standar','dokumentasi'=>1,'standar'=>9],['class'=>['btn btn-rose']])?></td>
                        </tr>


                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>