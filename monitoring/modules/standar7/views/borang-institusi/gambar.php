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
                <h4 class="card-title">Gambar Borang</h4>
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
                                Standar 1 :<small style="color:grey"> VISI, MISI, TUJUAN DAN SASARAN, SERTA STRATEGI PENCAPAIAN</small>

                            <td><?= Html::a('Lihat',['borang-institusi/unggah-standar','id'=>1,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td colspan="2">
                                Standar 2 : <small style="color:grey">TATA PAMONG, KEPEMIMPINAN, SISTEM PENGELOLAAN, DAN PENJAMINAN MUTU</small>


                            <td><?= Html::a('Lihat',['borang-institusi/unggah-standar','id'=>2,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td colspan="2">
                                Standar 3 :<small style="color:grey">MAHASISWA DAN LULUSAN</small>



                            <td><?= Html::a('Lihat',['borang-institusi/unggah-standar','id'=>3,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td colspan="2">
                                Standar 4 :<small style="color:grey">SUMBER DAYA MANUSIA</small>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/unggah-standar','id'=>4,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td colspan="2">
                                Standar 5 :<small style="color:grey">KURIKULUM, PEMBELAJARAN, DAN SUASANA AKADEMIK</small>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/unggah-standar','id'=>5,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td colspan="2">
                                Standar 6 :<small style="color:grey">PEMBIAYAAN, SARANA DAN PRASARANA, SERTA SISTEM INFORMASI</small>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/unggah-standar','id'=>6,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td colspan="2">
                                Standar 7 : <small style="color:grey">PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</small>
                            </td>

                            <td><?= Html::a('Lihat',['borang-institusi/unggah-standar','id'=>7,'borang'=>$borangInstitusi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>