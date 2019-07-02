<?php

use akreditasi\models\S7BorangS1FakultasStandar1Form;
use akreditasi\models\IsianBorangS1FakultasUploadForm;
use common\models\S7DetailBorangS1FakultasStandar1;
use common\models\S7IsianBorang;
use yii\bootstrap\Html;
use yii\bootstrap\Progress;
use yii\db\ActiveQuery;
use yii\web\View;

/* @var $this View */
/* @var $model S7BorangS1FakultasStandar1Form */
/* @var $detailModel S7DetailBorangS1FakultasStandar1 */
/* @var $modelIsian IsianBorangS1FakultasUploadForm */
/* @var $detail ActiveQuery */
/* @var $template ActiveQuery */
/* @var $isian ActiveQuery */
/** @var array $poin */
$standar = $json['standar'];

$this->title = 'Standar ' . $standar;
$this->params['breadcrumbs'][] = ['label' => 'Lihat Borang', 'url' => ['borang-s1-fakultas/lihat', 'borang' => $model->id_borang_s1_fakultas]];
$this->params['breadcrumbs'][] = $this->title;
$query = $isian;

?>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"><?= $this->title ?></h4>
                <p class="category">Kelengkapan Berkas : <?= $model->progress ?>%</p>

                <?=
                Progress::widget([
                    'percent' => $model->progress,
                    'label' => 'test',
                    'barOptions' => ['class' => 'progress-bar-info'],
                    'options' => ['class' => 'progress-striped']
                ]); ?>

            </div>


            <div class="card-content">


                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                    foreach ($poin

                    as $key => $value):
                    $modelAttribute = '_' . str_replace('.', '_', $value['nomor']);
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="heading<?= $key ?>">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $key ?>"
                               aria-controls="collapse<?= $key ?>">
                                <h4 class="panel-title">
                                    <?=
                                    $value['nomor'] ?> <br>
                                    <small style="font-size:13px;color:grey"><?= $value['judul'] ?>  </small>
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapse<?= $key ?>" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="heading<?= $key ?>">
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <?= $value['penjelasan'] ?>
                                    </div>
                                </div>

                                <div class="clearfix"></div>

                                <br>
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="well well-lg">
                                            <?= $model->$modelAttribute ?>

                                        </div>

                                    </div>

                                </div>
                                <?php if ($value['isian']): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-black-50">Isian Borang</h3>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h6 class="pull-left">File Isian Borang</h6>
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-hover">
                                                        <thead data-background-color="blue">
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama File</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        <?php
                                                        $nomor = S7IsianBorang::findOne(['nomor_borang' => $value['nomor']]);
                                                        $data = \common\models\S7IsianBorangS1Fakultas::find()->where(['id_borang_s1_fakultas' => $_GET['borang'], 'id_isian_borang' => $nomor])->all();

                                                        foreach ($data as $f => $file):
                                                            ?>

                                                            <tr>
                                                                <td><?= $f + 1 ?></td>
                                                                <td><?= $file->nama_file ?></td>
                                                                <td>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <?= Html::a('Download', ['borang-s1-fakultas/download-isian', 'id' => $file->id, 'borang' => $_GET['borang']], [
                                                                                'class' => 'btn btn-info'
                                                                            ]) ?>

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6>Download Template</h6>
                                                    <table class="table table-striped table-hover">
                                                        <thead data-background-color="black">
                                                        <tr>
                                                            <th>Nama File</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <?php $fileTemplate = $template->where(['nomor_borang' => $value['nomor']])->one(); ?>
                                                            <td><?= $fileTemplate->nama_file ?></td>
                                                            <td><?= Html::a('<i class="material-icons">send</i> Download', ['borang-s1-fakultas/download-template', 'id' => $fileTemplate->id], ['class' => 'btn btn-success btn-sm']) ?></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                <?php endif;?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="text-black-50">Dokumen Pendukung</h4>
                                            <table class="table table-striped table-hover">
                                                <thead data-background-color="purple">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Dokumen Pendukung</th>
                                                    <th>Aksi</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                $detail1 = $detail->where(['nomor_dokumen' => $value['nomor']])->all();

                                                foreach ($detail1 as $k => $item):
                                                    ?>
                                                    <td><?= $k + 1 ?></td>
                                                    <td><?= $item->nama_dokumen ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <?= Html::a('Download', ['borang-s1-fakultas/download-detail', 'standar' => $standar, 'dokumen' => $item->id, 'borang' => $_GET['borang']], [
                                                                    'class' => 'btn btn-info'
                                                                ]) ?>

                                                            </div>
                                                        </div>
                                                    </td>
                                                <?php endforeach; ?>
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