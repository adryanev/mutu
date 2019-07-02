<?php

use akreditasi\models\BorangS1ProdiForm;
use common\models\S7BorangS1Prodi;
use common\models\S7BorangS1ProdiStandar1;
use common\models\S7BorangS1ProdiStandar2;
use common\models\S7BorangS1ProdiStandar3;
use common\models\S7BorangS1ProdiStandar4;
use common\models\S7BorangS1ProdiStandar5;
use common\models\S7BorangS1ProdiStandar6;
use common\models\S7BorangS1ProdiStandar7;
use common\models\S7DokumenBorangS1Prodi;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Progress;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $borangProdi S7BorangS1Prodi */
/* @var $dokumenBorang BorangS1ProdiForm */
/* @var $dataDokumenBorang S7DokumenBorangS1Prodi */
/* @var $standar1 S7BorangS1ProdiStandar1 */
/* @var $standar2 S7BorangS1ProdiStandar2 */
/* @var $standar3 S7BorangS1ProdiStandar3 */
/* @var $standar4 S7BorangS1ProdiStandar4 */
/* @var $standar5 S7BorangS1ProdiStandar5 */
/* @var $standar6 S7BorangS1ProdiStandar6 */
/* @var $standar7 S7BorangS1ProdiStandar7 */
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
                            <td><?=Html::encode($borangProdi->akreditasiProdiS1->akreditasi->lembaga)?></td>
                        </tr>
                        <tr>
                            <td><strong>Versi Akreditasi</strong></td>
                            <td><?=Html::encode($borangProdi->akreditasiProdiS1->akreditasi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Akreditasi</strong></td>
                            <td><?=Html::encode($borangProdi->akreditasiProdiS1->akreditasi->jenisAkreditasi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenjang</strong></td>
                            <td><?=Html::encode($borangProdi->akreditasiProdiS1->prodi->jenjang)?></td>
                        </tr>
                        <tr>
                            <td><strong>Borang Untuk</strong></td>
                            <td>Program Studi</td>
                        </tr>
                        <tr>
                            <td><strong>Prodi</strong></td>
                            <td><?=Html::encode($borangProdi->akreditasiProdiS1->prodi->nama)?></td>
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

                            <td><?= Html::a('Lihat',['borang-s1-prodi/unggah-standar','id'=>1,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td colspan="2">
                                Standar 2 : <small style="color:grey">TATA PAMONG, KEPEMIMPINAN, SISTEM PENGELOLAAN, DAN PENJAMINAN MUTU</small>


                            <td><?= Html::a('Lihat',['borang-s1-prodi/unggah-standar','id'=>2,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td colspan="2">
                                Standar 3 :<small style="color:grey">MAHASISWA DAN LULUSAN</small>



                            <td><?= Html::a('Lihat',['borang-s1-prodi/unggah-standar','id'=>3,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td colspan="2">
                                Standar 4 :<small style="color:grey">SUMBER DAYA MANUSIA</small>
                            </td>

                            <td><?= Html::a('Lihat',['borang-s1-prodi/unggah-standar','id'=>4,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td colspan="2">
                                Standar 5 :<small style="color:grey">KURIKULUM, PEMBELAJARAN, DAN SUASANA AKADEMIK</small>
                            </td>

                            <td><?= Html::a('Lihat',['borang-s1-prodi/unggah-standar','id'=>5,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td colspan="2">
                                Standar 6 :<small style="color:grey">PEMBIAYAAN, SARANA DAN PRASARANA, SERTA SISTEM INFORMASI</small>
                            </td>

                            <td><?= Html::a('Lihat',['borang-s1-prodi/unggah-standar','id'=>6,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td colspan="2">
                                Standar 7 : <small style="color:grey">PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</small>
                            </td>

                            <td><?= Html::a('Lihat',['borang-s1-prodi/unggah-standar','id'=>7,'borang'=>$borangProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>