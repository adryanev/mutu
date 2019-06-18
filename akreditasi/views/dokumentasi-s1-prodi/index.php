<?php

use akreditasi\models\DokumentasiS1ProdiForm;
use common\models\S7DokumentasiS1Prodi;
use common\models\S7DokumentasiS1ProdiStandar1;
use common\models\S7DokumentasiS1ProdiStandar2;
use common\models\S7DokumentasiS1ProdiStandar3;
use common\models\S7DokumentasiS1ProdiStandar4;
use common\models\S7DokumentasiS1ProdiStandar5;
use common\models\S7DokumentasiS1ProdiStandar6;
use common\models\S7DokumentasiS1ProdiStandar7;
// use common\models\DokumenBorangS1Prodi;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Progress;
use yii\web\View;
/* @var $this yii\web\View */
/* @var $borangProdi S7DokumentasiS1Prodi */
/* @var $standar1 S7DokumentasiS1ProdiStandar1 */
/* @var $standar2 S7DokumentasiS1ProdiStandar2 */
/* @var $standar3 S7DokumentasiS1ProdiStandar3 */
/* @var $standar4 S7DokumentasiS1ProdiStandar4 */
/* @var $standar5 S7DokumentasiS1ProdiStandar5 */
/* @var $standar6 S7DokumentasiS1ProdiStandar6 */
/* @var $standar7 S7DokumentasiS1ProdiStandar7 */
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
                                $id = $dokumentasiProdi->id;

                                // var_dump($status);
                                // exit();
                                
                                if ($status === 0) {
                                    echo Html::a('<i class ="material-icons">lock</i> Tidak Publik',['dokumentasi-s1-prodi/ubah-publik'],['class'=>'btn btn-danger','data'=>[
                                        'method'=>'POST',
                                        'confirm'=>'Ganti ke publik ?',
                                        'params'=>['id'=>$id, 'publik'=>1]
                                    ]]);
                                }
                                else{
                                    echo Html::a('<i class ="material-icons">public</i> Publik',['dokumentasi-s1-prodi/ubah-publik'],['class'=>'btn btn-success','data'=>[
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

                            <td><?= Html::a('Lihat',['dokumentasi-s1-prodi/standar1', 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['dokumentasi-s1-prodi/standar2', 'dokumentasi'=>$dokumentasiProdi->id],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['dokumentasi/lihat-penanggung'],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['dokumentasi/lihat-penanggung'],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['dokumentasi/lihat-penanggung'],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['dokumentasi/lihat-penanggung'],['class'=>'btn btn-rose'])?></td>
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

                            <td><?= Html::a('Lihat',['dokumentasi/isi-dok'],['class'=>'btn btn-rose'])?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>

</div>