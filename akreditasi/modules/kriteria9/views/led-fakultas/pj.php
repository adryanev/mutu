<?php

use akreditasi\models\DokumentasiInstitusiForm;
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

$this->title='Penanggung Jawab Dokumentasi';
$this->params['breadcrumbs'][] = ['label'=>'Pencarian Penanggung Jawab Dokumentasi','url'=>['dokumentasi/arsip-dok','target'=>$cari]];
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
                            <td><?=Html::encode($dokumentasiProdi->akreditasiInstitusi->akreditasi->lembaga)?></td>
                        </tr>
                        <tr>
                            <td><strong>Versi Akreditasi</strong></td>
                            <td><?=Html::encode($dokumentasiProdi->akreditasiInstitusi->akreditasi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Jenis Akreditasi</strong></td>
                            <td><?=Html::encode($dokumentasiProdi->akreditasiInstitusi->akreditasi->jenisAkreditasi->nama)?></td>
                        </tr>
                        <tr>
                            <td><strong>Borang Untuk</strong></td>
                            <td>Institusi</td>
                        </tr>
                        <tr>
                            <td><strong>Keterangan</strong></td>
                            <td>
                            -
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
                <h4 class="card-title">Penanggung Jawab Dokumentasi</h4>
                <!-- <p class="category">Kelengkapan Berkas : </p> -->

                

                

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
                                Standar 1 <br><small style="color:grey"> VISI, MISI, TUJUAN DAN SASARAN, SERTA STRATEGI PENCAPAIAN</small>


                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/pj-standar','standar'=>1, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td colspan="2">
                                Standar 2 <br><small style="color:grey">TATA PAMONG, KEPEMIMPINAN, SISTEM PENGELOLAAN, DAN PENJAMINAN MUTU</small>

                                

                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/pj-standar','standar'=>2, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td colspan="2">
                                Standar 3 <br><small style="color:grey">MAHASISWA DAN LULUSAN</small>

                                

                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/pj-standar','standar'=>3, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td colspan="2">
                                Standar 4 <br><small style="color:grey">SUMBER DAYA MANUSIA</small>

                                
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/pj-standar','standar'=>4, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td colspan="2">
                                Standar 5 <br><small style="color:grey">KURIKULUM, PEMBELAJARAN, DAN SUASANA AKADEMIK</small>

                               
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/pj-standar','standar'=>5, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td colspan="2">
                                Standar 6 <br><small style="color:grey">PEMBIAYAAN, SARANA DAN PRASARANA, SERTA SISTEM INFORMASI</small>

                            
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/pj-standar','standar'=>6, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td colspan="2">
                                Standar 7 <br> <small style="color:grey">PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</small>

                                
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/pj-standar','standar'=>7, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>