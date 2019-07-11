<?php

use common\models\S7AkreditasiInstitusi;
use common\models\S7DataKuantitatifInstitusi;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;

/* @var $dataKuantitatifInstitusi S7DataKuantitatifInstitusi */
/* @var $model S7DataKuantitatifInstitusi */
/* @var $akreinstitusi S7AkreditasiInstitusi*/

$this->title='Unggah Data Kuantitatif Institusi';
$this->params['breadcrumbs'][] = ['label'=>'Pencarian Data Kuantitatif','url'=>['kuantitatif-institusi/arsip']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-md-12">

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Kuantitatif <?= $akreinstitusi->akreditasi->nama?></h4>

        </div>

        <div class="card-content">
            <div class="row">
                <div class="col-md-12 table-responsive ">
                    <table class="table table-hover">

                        <thead data-background-color="rose">
                        <tr>
                            <th>Dokumen Borang</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php

                        if ($dataKuantitatifInstitusi != null){

                            foreach ($dataKuantitatifInstitusi as $item) :?>
                                <tr>
                                    <td>  <?=$item->nama_dokumen?></td>
                                    <td> <?=Html::a('<i class ="material-icons">send</i> Download',['kuantitatif-institusi/download-dokumen','dokumen'=>$item->id],['class'=>'btn btn-info']) ?> <?=Html::a('<i class ="material-icons">delete</i> Hapus',['kuantitatif-institusi/hapus-dokumen'],['class'=>'btn btn-danger','data'=>[
                                            'method'=>'POST',
                                            'confirm'=>'Apakah anda yakin menghapus '.$item->nama_dokumen.' ?',
                                            'params'=>['id'=>$item->id, 'id_institusi'=>$item->id_akreditasi]
                                        ]])?></td>
                                </tr>

                            <?php
                            endforeach;
                        } else {
                        ?>

                        <tr>
                            <td>Dokumen Kuantitaif Kosong, <strong>Silahkan Upload</strong></td>
                            <td>
                                <?php Modal::begin([
                                    'header' => 'Upload Dokumen Dokumentasi',
                                    'toggleButton' => ['label' => '<i class="material-icons">backup</i> &nbsp;Upload','class'=>'btn btn-rose btn-sm pull-right'],
                                    'size' => 'modal-lg',
                                    'clientOptions' => ['backdrop' => 'blur', 'keyboard' => true]
                                ]); ?>

                                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                                <?= $form->field($model,'nama_dokumen')->widget(FileInput::class,[

                                    'pluginOptions' => [
                                        'showUpload'=>false,
                                    ]
                                ]) ?>


                                <div class="form-group">
                                    <?=Html::submitButton('Simpan',['class'=>'btn btn-rose ']) ?>
                                </div>
                                <?php ActiveForm::end() ?>

                                <?php Modal::end(); }?>
                            </td>
                        </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

</div>
