<?php

use akreditasi\models\DokumentasiS1FakultasForm;
use common\models\S7DokumentasiS1Fakultas;
use common\models\S7DokumentasiS1FakultasStandar1;
use common\models\S7DokumentasiS1FakultasStandar2;
use common\models\S7DokumentasiS1FakultasStandar3;
use common\models\S7DokumentasiS1FakultasStandar4;
use common\models\S7DokumentasiS1FakultasStandar5;
use common\models\S7DokumentasiS1FakultasStandar6;
use common\models\S7DokumentasiS1FakultasStandar7;
// use common\models\DokumenBorangS1Fakultas;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Progress;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $borangFakultas DokumentasiS1Fakultas */
/* @var $standar1 DokumentasiS1FakultasStandar1 */
/* @var $standar2 DokumentasiS1FakultasStandar2 */
/* @var $standar3 DokumentasiS1FakultasStandar3 */
/* @var $standar4 DokumentasiS1FakultasStandar4 */
/* @var $standar5 DokumentasiS1FakultasStandar5 */
/* @var $standar6 DokumentasiS1FakultasStandar6 */
/* @var $standar7 DokumentasiS1FakultasStandar7 */
/* @var $json */

$this->title='Lihat Dokumentasi';
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
                                $id = $dokumentasiProdi->id;

                                // var_dump($status);
                                // exit();
                                
                                if ($status === 0) {
                                    echo '<button class="btn btn-warning btn-simple">Dokumen Tidak Publik</button>';
                                }
                                else{
                                    echo '<button class="btn btn-success btn-simple">Dokumen Publik</button>';
                                }

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
                <h4 class="card-title">Lihat Dokumentasi</h4>
                

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

                            <td><?= Html::a('Lihat',['dokumentasi-s1-prodi/lihat-standar','standar'=>1, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td colspan="2">
                                Standar 2 <br><small style="color:grey">TATA PAMONG, KEPEMIMPINAN, SISTEM PENGELOLAAN, DAN PENJAMINAN MUTU</small>

                                

                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-s1-prodi/lihat-standar','standar'=>2, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td colspan="2">
                                Standar 3 <br><small style="color:grey">MAHASISWA DAN LULUSAN</small>

                                

                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-s1-prodi/lihat-standar','standar'=>3, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td colspan="2">
                                Standar 4 <br><small style="color:grey">SUMBER DAYA MANUSIA</small>

                                
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-s1-prodi/lihat-standar','standar'=>4, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td colspan="2">
                                Standar 5 <br><small style="color:grey">KURIKULUM, PEMBELAJARAN, DAN SUASANA AKADEMIK</small>

                                
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-s1-prodi/lihat-standar','standar'=>5, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td colspan="2">
                                Standar 6 <br><small style="color:grey">PEMBIAYAAN, SARANA DAN PRASARANA, SERTA SISTEM INFORMASI</small>

                                
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-s1-prodi/lihat-standar','standar'=>6, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td colspan="2">
                                Standar 7 <br> <small style="color:grey">PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</small>

                                
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-s1-prodi/lihat-standar','standar'=>7, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>