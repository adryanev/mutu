<?php


/* @var $modelInstitusi SertifikatInstitusi*/
/* @var $sertifikatFSI */
/* @var $sertifikatFTK */
/* @var $sertifikatFDK */
/* @var $sertifikatFEB */
/* @var $sertifikatPASCA */
/* @var $modelInstitusi SertifikatInstitusi*/
/* @var $timeakre */
/* @var $timekdl */
/* @var $timeaju */
/* @var $timeterima */
/* @var $countProdi */
/* @var $countA */
/* @var $countB */
/* @var $countC */
/* @var $countNon */
/* @var $persenProdi */
/* @var $persenA*/
/* @var $persenB*/
/* @var $persenC*/
/* @var $persenNon*/

use common\models\sertifikat\SertifikatInstitusi;
use yii\bootstrap\Html;
use yii\helpers\Url;

$this->title = 'Grafik Sertifikat';

?>
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

                                <div class="col-md-10 col-md-offset-1 ">
                                    <div class="card">

                                        <div class="card-content">

                                            <div class="progress" style="height: 30px;">
                                                <div class="progress-bar progress-bar-rose progress-bar-striped" style="width: <?= $persenA ?>%">
                                                    <strong><?= $persenA ?> % (A)</strong>
                                                </div>
                                                <div class="progress-bar progress-bar-info progress-bar-striped" style="width: <?= $persenB ?>%">
                                                    <strong><?= $persenB ?> % (B)</strong>
                                                </div>
                                                <div class="progress-bar progress-bar-warning progress-bar-striped" style="width: <?= $persenC ?>%">
                                                    <strong><?= $persenC ?> % (C)</strong>
                                                </div>
                                                <div class="progress-bar progress-bar-inverse progress-bar-striped" style="width: <?= $persenNon ?>%">
                                                    <strong><?= $persenNon ?> % (Belum Akreditasi)</strong>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                            <div class="panel-body">



                                <div class="col-md-10 col-md-offset-1 table-responsive ">
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
                                            <td class="text-center"><?= $countA ?></td>
                                            <td class="text-center"><?= $persenA ?>%</td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-info">Akreditasi B</button></td>
                                            <td class="text-center">0</td>
                                            <td class="text-center"><?= $countB ?></td>
                                            <td class="text-center"><?= $persenB ?>%</td>
                                        </tr>
                                        <tr>
                                            <td><button class="btn btn-warning">Akreditasi C</button></td>
                                            <td class="text-center">1</td>
                                            <td class="text-center"><?= $countC ?></td>
                                            <td class="text-center"><?= $persenC ?>%</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><button class="btn btn-default">Belum Akreditasi</button></td>
                                            <td class="text-center"><?= $countNon ?></td>
                                            <td class="text-center"><?= $persenNon ?>%</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><button class="btn btn-success">Total Seluruh Prodi</button></td>
                                            <td class="text-center"><?= $countProdi ?></td>
                                            <td class="text-center"><?= $persenProdi ?>%</td>
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

                                <div class="col-md-10 col-md-offset-1 table-responsive ">
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
                                            <td><?= $timeakre ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Kadaluarsa</strong></td>
                                            <td><?= $timekdl ?></td>
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
                                            <td><?= $timeaju ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Tanggal Diterima</strong></td>
                                            <td><?= $timeterima ?></td>
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
                                <h4 class="panel-title" >
                                    Akreditasi Pascasarjana
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">

                                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">

                                    <?php

                                    foreach ($sertifikatPASCA as $fsi):

                                        ?>

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingThree<?= $fsi['id'] ?>">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree<?= $fsi['id'] ?>" aria-expanded="false" aria-controls="collapseThree<?= $fsi['id'] ?>">
                                                    <h4 class="panel-title" data-background-color="green">
                                                        <?= $fsi['nama'] ?> <span class="badge">
                                                    <?= $fsi['nilai_huruf'] ?>
                                                </span>&nbsp;<span class="badge">
                                                    <?= $fsi['nilai_angka'] ?>
                                                </span>
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="collapseThree<?= $fsi['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree<?= $fsi['id'] ?>">
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
                                                                    <td><u><a href="<?= Url::to(['sertifikat/download-sertifikat', 'id'=>$fsi['id']]) ?>" target="_blank"><?= $fsi['sertifikat'] ?></a></u></td>
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
                                    <div class="panel-heading" role="tab" id="headingFour<?= $fsi['id'] ?>">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour<?= $fsi['id'] ?>" aria-expanded="false" aria-controls="collapseFour<?= $fsi['id'] ?>">
                                            <h4 class="panel-title" data-background-color="green">
                                                <?= $fsi['nama'] ?> <span class="badge">
                                                    <?= $fsi['nilai_huruf'] ?>
                                                </span>&nbsp;<span class="badge">
                                                    <?= $fsi['nilai_angka'] ?>
                                                </span>
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </h4>
                                        </a>
                                    </div>
                                    <div id="collapseFour<?= $fsi['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour<?= $fsi['id'] ?>">
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
                                <h4 class="panel-title" >
                                    Akreditasi Fakultas Tarbiyah dan Ilmu Keguruan
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">

                                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">

                                    <?php

                                    foreach ($sertifikatFTK as $ftk):

                                        ?>

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingFive<?= $ftk['id'] ?>">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseFive<?= $ftk['id'] ?>" aria-expanded="false" aria-controls="collapseFive<?= $ftk['id'] ?>">
                                                    <h4 class="panel-title" data-background-color="green">
                                                        <?= $ftk['nama']; ?> <span class="badge">
                                                    <?= $fsi['nilai_huruf'] ?>
                                                </span>&nbsp;<span class="badge">
                                                    <?= $fsi['nilai_angka'] ?>
                                                </span>
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="collapseFive<?= $ftk['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive<?= $ftk['id'] ?>">
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
                                                                    <td><?= $ftk['nama'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Tanggal Akreditasi</strong></td>
                                                                    <td><?= $ftk['tgl_akreditasi'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Tanggal Kadaluarsa</strong></td>
                                                                    <td><?= $ftk['tgl_kadaluarsa'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Nomor SK</strong></td>
                                                                    <td><?= $ftk['nomor_sk'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Nomor Sertifikat</strong></td>
                                                                    <td><?= $ftk['nomor_sertifikat'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Nilai Angka </strong></td>
                                                                    <td><?= $ftk['nilai_angka'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Nilai Huruf</strong></td>
                                                                    <td><?= $ftk['nilai_huruf'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Tahun SK</strong></td>
                                                                    <td><?= $ftk['tahun_sk'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Tanggal Pengajuan</strong></td>
                                                                    <td><?= $ftk['tanggal_pengajuan'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Tanggal Diterima</strong></td>
                                                                    <td><?= $ftk['tanggal_diterima'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Keterangan </strong></td>
                                                                    <td><?= $ftk['is_publik'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Dokumen SK</strong></td>
                                                                    <td><?= $ftk['dokumen_sk'] ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><strong>Sertifikat</strong></td>
                                                                    <td><?= $ftk['sertifikat'] ?></td>
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
                        <div class="panel-heading" role="tab" id="headingSix">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <h4 class="panel-title" >
                                    Akreditasi Fakultas Ekonomi dan Bisnis Islam
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="panel-body">

                                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">

                                    <?php

                                    foreach ($sertifikatFEB as $fsi):

                                        ?>

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingSix<?= $fsi['id'] ?>">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseSix<?= $fsi['id'] ?>" aria-expanded="false" aria-controls="collapseSix<?= $fsi['id'] ?>">
                                                    <h4 class="panel-title" data-background-color="green">
                                                        <?= $fsi['nama']; ?><span class="badge">
                                                    <?= $fsi['nilai_huruf'] ?>
                                                </span>&nbsp;<span class="badge">
                                                    <?= $fsi['nilai_angka'] ?>
                                                </span>
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="collapseSix<?= $fsi['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix<?= $fsi['id'] ?>">
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
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <h4 class="panel-title" >
                                    Akreditasi Fakultas Dakwah dan Ilmu Komunikasi
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="panel-body">

                                <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">

                                    <?php

                                    foreach ($sertifikatFDK as $fsi):

                                        ?>

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingSeven<?= $fsi['id'] ?>">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion1" href="#collapseSeven<?= $fsi['id'] ?>" aria-expanded="false" aria-controls="collapseSeven<?= $fsi['id'] ?>">
                                                    <h4 class="panel-title" data-background-color="green">
                                                        <?= $fsi['nama']; ?><span class="badge">
                                                    <?= $fsi['nilai_huruf'] ?>
                                                </span>&nbsp;<span class="badge">
                                                    <?= $fsi['nilai_angka'] ?>
                                                </span>
                                                        <i class="material-icons">keyboard_arrow_down</i>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="collapseSeven<?= $fsi['id'] ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven<?= $fsi['id'] ?>">
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


                </div>
            </div>
        </div>
    </div>

</div>