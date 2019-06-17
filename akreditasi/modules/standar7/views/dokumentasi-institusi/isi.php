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
/* @var $borangProdi DokumentasiInstitusi */
/* @var $standar1 DokumentasiInstitusiStandar1 */
/* @var $standar2 DokumentasiInstitusiStandar2 */
/* @var $standar3 DokumentasiInstitusiStandar3 */
/* @var $standar4 DokumentasiInstitusiStandar4 */
/* @var $standar5 DokumentasiInstitusiStandar5 */
/* @var $standar6 DokumentasiInstitusiStandar6 */
/* @var $standar7 DokumentasiInstitusiStandar7 */
/* @var $json */

$this->title='Isi Dokumentasi';
$this->params['breadcrumbs'][] = ['label'=>'Pencarian Dokumentasi','url'=>['dokumentasi/arsip-dok','target'=>$cari]];
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
                            <td>Akreditasi Institusi</td>
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
                            <?php 
                                $status = $dokumentasiProdi->is_publik; 
                                $id = $dokumentasiProdi->id;

                                // var_dump($status);
                                // exit();
                                
                                if ($status === 0) {
                                    echo Html::a('<i class ="material-icons">lock</i> Tidak Publik',['dokumentasi-institusi/ubah-publik'],['class'=>'btn btn-danger','data'=>[
                                        'method'=>'POST',
                                        'confirm'=>'Ganti ke publik ?',
                                        'params'=>['id'=>$id, 'publik'=>1]
                                    ]]);
                                }
                                else{
                                    echo Html::a('<i class ="material-icons">public</i> Publik',['dokumentasi-institusi/ubah-publik'],['class'=>'btn btn-success','data'=>[
                                        'method'=>'POST',
                                        'confirm'=>'Ganti ke tidak publik ?',
                                        'params'=>['id'=>$id, 'publik'=>0]
                                    ]]);
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
                <h4 class="card-title">Isi Dokumentasi</h4>
                <p class="category">Kelengkapan Berkas : <?=Html::encode($progressDok)?>%</p>

                

                <div class="progress">
                    <div class="progress-bar <?=$progressDok < 30 ? 'progress-bar-danger' : (($progressDok >30 && $progressDok<=60 )? 'progress-bar-warning': 'progress-bar-info') ?>" role="progressbar" aria-valuenow="<?=Html::encode($progressDok)?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=Html::encode($progressDok)?>%;">
                        <span class="sr-only"><?=Html::encode($progressDok)?>% Complete</span>
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
                                Standar 1 : <?= $progress1 ?>%<br><small style="color:grey"> VISI, MISI, TUJUAN DAN SASARAN, SERTA STRATEGI PENCAPAIAN</small>

                                <?=
                                Progress::widget([
                                    'percent' => $progress1,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>

                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/isi-standar','standar'=>1, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td colspan="2">
                                Standar 2 : <?=$progress2 ?>%<br><small style="color:grey">TATA PAMONG, KEPEMIMPINAN, SISTEM PENGELOLAAN, DAN PENJAMINAN MUTU</small>

                                <?=
                                Progress::widget([
                                    'percent' => $progress2,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>

                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/isi-standar','standar'=>2, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td colspan="2">
                                Standar 3 : <?= $progress3 ?>%<br><small style="color:grey">MAHASISWA DAN LULUSAN</small>

                                <?=
                                Progress::widget([
                                    'percent' => $progress3,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>

                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/isi-standar','standar'=>3, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td colspan="2">
                                Standar 4 : <?= $progress4 ?>%<br><small style="color:grey">SUMBER DAYA MANUSIA</small>

                                <?=
                                Progress::widget([
                                    'percent' => $progress4,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/isi-standar','standar'=>4, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td colspan="2">
                                Standar 5 : <?= $progress5 ?>%<br><small style="color:grey">KURIKULUM, PEMBELAJARAN, DAN SUASANA AKADEMIK</small>

                                <?=
                                Progress::widget([
                                    'percent' => $progress5,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/isi-standar','standar'=>5, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>6</td>
                            <td colspan="2">
                                Standar 6 : <?= $progress6 ?>%<br><small style="color:grey">PEMBIAYAAN, SARANA DAN PRASARANA, SERTA SISTEM INFORMASI</small>

                                <?=
                                Progress::widget([
                                    'percent' => $progress6,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/isi-standar','standar'=>6, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        <tr>
                            <td>7</td>
                            <td colspan="2">
                                Standar 7 : <?= $progress7 ?>%<br> <small style="color:grey">PENELITIAN, PELAYANAN/PENGABDIAN KEPADA MASYARAKAT, DAN KERJASAMA</small>

                                <?=
                                Progress::widget([
                                    'percent' => $progress7,
                                    'label' => 'test',
                                    'barOptions' => ['class' => 'progress-bar-info'],
                                    'options' => ['class' => 'progress-striped']
                                ]);?>
                                
                            </td>

                            <td><?= Html::a('Lihat',['dokumentasi-institusi/isi-standar','standar'=>7, 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>