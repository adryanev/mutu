<?php


/* @var $modelInstitusi SertifikatInstitusi*/
/* @var $sertifikatFSI */
/* @var $modelInstitusi SertifikatInstitusi*/
/* @var $modelInstitusi SertifikatInstitusi*/
/* @var $modelInstitusi SertifikatInstitusi*/

use common\models\sertifikat\SertifikatInstitusi;
use yii\bootstrap\Html; ?>
<div class="row" style="margin-top:20px;">
    <!-- <div class="col-md-5 col-md-offset-1"> -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title text-center" style="font-size: 30px;">Sistem Penjaminan Mutu <br> <small>IAIN Padangsidimpuan</small></h4>
            </div>
            <div class="card-content">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <h4 class="panel-title">
                                    Statistik Akreditasi
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="row">

                                <div class="col-md-12 ">
                                    <div class="card">

                                        <div class="card-content">

                                            <div class="progress" style="height: 30px;">
                                                <div class="progress-bar progress-bar-rose progress-bar-striped" style="width: 35%">
                                                    <strong>35 %</strong>
                                                </div>
                                                <div class="progress-bar progress-bar-info progress-bar-striped" style="width: 20%">
                                                    <strong>20 %</strong>
                                                </div>
                                                <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: 10%">
                                                    <strong>10 %</strong>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="panel-body">



                                <div class="col-md-12 table-responsive ">
                                    <table class="table table-hover">
                                        <thead class="text-primary" data-background-color="green">
                                        <tr>
                                            <th class="text-center">Akreditasi</th>
                                            <th class="text-center">Kadaluarsa</th>
                                            <th class="text-center">Total Prodi</th>
                                            <th class="text-center">Presentase</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><button class="btn btn-rose">Akreditasi A</button></td>
                                            <td class="text-center">0</td>
                                            <td class="text-center">

                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-info">Akreditasi B</button></td>
                                            <td class="text-center">0</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">20%</td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-warning">Akreditasi C</button></td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">2</td>
                                            <td class="text-center">90%</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><button class="btn btn-default">Belum Akreditasi</button></td>
                                            <td class="text-center">4</td>
                                            <td class="text-center">10%</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><button class="btn btn-success">Total Seluruh Prodi</button></td>
                                            <td class="text-center">1</td>
                                            <td class="text-center">30%</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>



                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="panel-title">
                                    Akreditasi Universitas
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
<?php

    $timestamp = time();

?>
                                <div class="col-md-12 table-responsive ">
                                    <table class="table table-hover">

                                        <tbody>
                                        <tr>
                                            <td><strong>Sertifikat</strong></td>
                                            <td><?= $timestamp ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Institusi</strong></td>
                                            <td><?= Html::encode($modelInstitusi->nama_institusi ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Lembaga</strong></td>
                                            <td><?= Html::encode($modelInstitusi->nama_lembaga ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Akreditasi</strong></td>
                                            <td><?= Html::encode($modelInstitusi->tgl_akreditasi ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Kadaluarsa</strong></td>
                                            <td><?= Html::encode($modelInstitusi->tgl_kadaluarsa ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor SK</strong></td>
                                            <td><?= Html::encode($modelInstitusi->nomor_sk ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Sertifikat</strong></td>
                                            <td><?= Html::encode($modelInstitusi->nomor_sertifikat ) ?></td>
                                        </tr>
                                        <tr>
                                            <td ><strong>Nilai Angka</strong></td>
                                            <td style="font-weight: bold;"><?= Html::encode($modelInstitusi->nilai_angka ) ?></td>
                                        </tr>
                                        <tr>
                                            <td ><strong>Nilai Huruf </strong></td>
                                            <td style="font-weight: bold;"><?= Html::encode($modelInstitusi->nilai_huruf ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tahun SK</strong></td>
                                            <td><?= Html::encode($modelInstitusi->tahun_sk ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Pengajuan</strong></td>
                                            <td><?= Html::encode($modelInstitusi->tanggal_pengajuan ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Diterima</strong></td>
                                            <td><?= Html::encode($modelInstitusi->tanggal_diterima ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Keterangan </strong></td>
                                            <td><?= Html::encode($modelInstitusi->is_publik ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Dokumen SK</strong></td>
                                            <td><?= Html::encode($modelInstitusi->dokumen_sk ) ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sertifikat</strong></td>
                                            <td><?= Html::encode($modelInstitusi->sertifikat ) ?></td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h4 class="panel-title">
                                    Akreditasi Pascasarjana
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">

                                <div class="card">

                                    <div class="col-md-12 table-responsive ">
                                        <table class="table table-hover">

                                            <tbody>
                                            <tr>
                                                <td><strong>Sertifikat</strong></td>
                                                <td>Akreditasi Institusi</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama Program Studi</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Akreditasi</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Kadaluarsa</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nomor SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nomor Sertifikat</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nilai Angka (pakai warna)</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nilai Huruf juga</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tahun SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Pengajuan</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Diterima</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Keterangan </strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Dokumen SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sertifikat</strong></td>
                                                <td></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <h4 class="panel-title" >
                                    Akreditasi Fakultas Syari'ah dan Ilmu Hukum
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">

                                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">

                                   <?php

                                   foreach ($sertifikatFSI as $fsi):

                                   ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingFour1">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour1" aria-expanded="false" aria-controls="collapseFour1">
                                            <h4 class="panel-title" data-background-color="green">
                                                <?= $fsi['nama']; ?>
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </h4>
                                        </a>
                                    </div>
                                    <div id="collapseFour1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour1">
                                        <div class="panel-body">

                                        <div class="card">

                                <div class="col-md-12 table-responsive ">
                                    <table class="table table-hover">

                                        <tbody>
                                        <tr>
                                            <td><strong>Sertifikat</strong></td>
                                            <td>Akreditasi Program Studi</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Program Studi</strong></td>
                                            <td><?= $fsi['nama'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Akreditasi</strong></td>
                                            <td><?= $fsi['tgl_akreditasi'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Kadaluarsa</strong></td>
                                            <td><?= $fsi['tgl_kadaluarsa'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor SK</strong></td>
                                            <td><?= $fsi['nomor_sk'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Sertifikat</strong></td>
                                            <td><?= $fsi['nomor_sertifikat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nilai Angka </strong></td>
                                            <td><?= $fsi['nilai_angka'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nilai Huruf</strong></td>
                                            <td><?= $fsi['nilai_huruf'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tahun SK</strong></td>
                                            <td><?= $fsi['tahun_sk'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Pengajuan</strong></td>
                                            <td><?= $fsi['tanggal_pengajuan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Diterima</strong></td>
                                            <td><?= $fsi['tanggal_diterima'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Keterangan </strong></td>
                                            <td><?= $fsi['is_publik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Dokumen SK</strong></td>
                                            <td><?= $fsi['dokumen_sk'] ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Sertifikat</strong></td>
                                            <td><?= $fsi['sertifikat'] ?></td>
                                        </tr>

                                        </tbody>
                                    </table>
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

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <h4 class="panel-title">
                                    Akreditasi Fakultas Tarbiyah dan Ilmu Keguruan
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">

                                <div class="card">

                                    <div class="col-md-12 table-responsive ">
                                        <table class="table table-hover">

                                            <tbody>
                                            <tr>
                                                <td><strong>Sertifikat</strong></td>
                                                <td>Akreditasi Institusi</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama Program Studi</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Akreditasi</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Kadaluarsa</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nomor SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nomor Sertifikat</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nilai Angka (pakai warna)</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nilai Huruf juga</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tahun SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Pengajuan</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Diterima</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Keterangan </strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Dokumen SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sertifikat</strong></td>
                                                <td></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <h4 class="panel-title">
                                    Akreditasi Fakultas Ekonomi dan Bisnis Islam
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="panel-body">

                                <div class="card">

                                    <div class="col-md-12 table-responsive ">
                                        <table class="table table-hover">

                                            <tbody>
                                            <tr>
                                                <td><strong>Sertifikat</strong></td>
                                                <td>Akreditasi Institusi</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama Program Studi</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Akreditasi</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Kadaluarsa</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nomor SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nomor Sertifikat</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nilai Angka (pakai warna)</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nilai Huruf juga</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tahun SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Pengajuan</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Diterima</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Keterangan </strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Dokumen SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sertifikat</strong></td>
                                                <td></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <h4 class="panel-title">
                                    Akreditasi Fakultas Dakwah dan Ilmu Komunikasi
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="panel-body">

                                <div class="card">

                                    <div class="col-md-12 table-responsive ">
                                        <table class="table table-hover">

                                            <tbody>
                                            <tr>
                                                <td><strong>Sertifikat</strong></td>
                                                <td>Akreditasi Institusi</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nama Program Studi</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Akreditasi</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Kadaluarsa</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nomor SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nomor Sertifikat</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nilai Angka (pakai warna)</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Nilai Huruf juga</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tahun SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Pengajuan</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Tanggal Diterima</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Keterangan </strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Dokumen SK</strong></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><strong>Sertifikat</strong></td>
                                                <td></td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>