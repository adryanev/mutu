<?php

use common\models\ProgramStudi;
use yii\bootstrap\Html;
/* @var $prodiuser ProgramStudi */


?>
<div class="card">
    <div class="card-header card-header-icon" data-background-color="green">
        <i class="material-icons">file_copy</i>
    </div>

    <div class="card-content">


    <h4 class="card-title">Nama Program Studi</h4>


    <div class="col-md-12 table-responsive ">
        <table class="table table-hover">

            <tbody>
            <tr>
                <td><strong>Program Studi</strong></td>
                <td>Akreditasi Prodi Pasca</td>
            </tr>
            <tr>
                <td><strong>Kode Program Studi</strong></td>
                <td><?= Html::encode($prodiuser->kode) ?></td>
            </tr>
            <tr>
                <td><strong>Jurusan/Departemen</strong></td>
                <td><?= Html::encode($prodiuser->jurusan_departemen) ?></td>
            </tr>
            <tr>
                <td><strong>Fakultas</strong></td>
                <td><?= Html::encode($prodiuser->fakultasAkademi->nama) ?></td>
            </tr>
            <tr>
                <td><strong>Perguruan Tinggi</strong></td>
                <td><?= Html::encode($prodiuser->kode) ?></td>
            </tr>
            <tr>
                <td colspan="2" bgcolor="#dcdcdc"><strong>SK Pendirian PS</strong></td>

            </tr>
            <tr>
                <td><strong> - Nomor SK</strong></td>
                <td><?= Html::encode($prodiuser->nomor_sk_pendirian) ?></td>
            </tr>
            <tr>
                <td><strong> - Tanggal SK</strong></td>
                <td><?= Html::encode($prodiuser->tanggal_sk_pendirian) ?></td>
            </tr>
            <tr>
                <td><strong> - Pejabat Penandatangan</strong></td>
                <td><?= Html::encode($prodiuser->pejabat_ttd_sk_pendirian) ?></td>
            </tr>
            <tr>
                <td><strong>Bulan dan Tahun Dimulainya Penyelenggaraan PS</strong></td>
                <td><?= Html::encode($prodiuser->bulan_berdiri) ?></td>
            </tr>
            <tr>
                <td colspan="2" bgcolor="#dcdcdc"><strong>SK Izin Operasional</strong></td>
            </tr>
            <tr>
                <td><strong> - Nomor SK</strong></td>
                <td><?= Html::encode($prodiuser->nomor_sk_operasional) ?></td>
            </tr>
            <tr>
                <td><strong> - Tanggal SK</strong></td>
                <td><?= Html::encode($prodiuser->tanggal_sk_operasional) ?></td>
            </tr>
            <tr>
                <td colspan="2" bgcolor="#dcdcdc"><strong>Akreditasi Terakhir BAN-PT</strong></td>
            </tr>
            <tr>
                <td><strong> - Peringkat</strong></td>
                <td><?= Html::encode($prodiuser->peringkat_banpt_terakhir) ?></td>
            </tr>
            <tr>
                <td><strong> - Nilai</strong></td>
                <td><?= Html::encode($prodiuser->nilai_banpt_terakhir) ?></td>
            </tr>
            <tr>
                <td><strong> - Nomor SK BAN-PT</strong></td>
                <td><?= Html::encode($prodiuser->nomor_sk_banpt) ?></td>
            </tr>
            <tr>
                <td><strong>Alamat PS</strong></td>
                <td><?= Html::encode($prodiuser->alamat) ?></td>
            </tr>
            <tr>
                <td><strong>Nomor Telepon PS</strong></td>
                <td><?= Html::encode($prodiuser->nomor_telp) ?></td>
            </tr>
            <tr>
                <td><strong>Nomor Faksimili PS</strong></td>
                <td><?= Html::encode($prodiuser->homepage) ?></td>
            </tr>
            <tr>
                <td><strong>Homepage PS</strong></td>
                <td><?= Html::encode($prodiuser->homepage) ?></td>
            </tr>
            <tr>
                <td><strong>Email PS</strong></td>
                <td><?= Html::encode($prodiuser->email) ?></td>
            </tr>


            </tbody>
        </table>
    </div>
    </div>
</div>
