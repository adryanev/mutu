<?php

use common\models\led\S7LedProdiS1Detail;
use common\models\S7IsianBorang;
use common\models\S7IsianBorangS1Prodi;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model S7LedProdiS1Detail[] */
/* @var $json array */


$this->title = 'Upload Dokumen LED';
$this->params['breadcrumbs'][] = $this->title;
$identity = Yii::$app->user->identity;

?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-content">


                <h4 class="card-title">Upload Dokumen</h4>
                <p>Berikut ada dokumen-dokumen yang harus disiapkan dan diupload.</p>

                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php $counter = 1;
                    foreach ($json as $value):
                        $modelAttribute = '_' . str_replace(' ', '_', $value['nama_dokumen']);

                        ?>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading<?= $counter ?>">
                                <a role="button" data-toggle="collapse" data-parent="#accordion"
                                   href="#collapse<?= $counter ?>" aria-controls="collapse<?= $counter ?>">
                                    <h4 class="panel-title">
                                        <small><?=
                                            $counter ?></small>
                                        . <?= $value['nama_dokumen'] ?>
                                        <i class="material-icons">keyboard_arrow_down</i>
                                    </h4>
                                </a>
                            </div>
                            <div id="collapse<?= $counter ?>" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="heading<?= $counter ?>">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-12">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                    <tr data-background-color="green">
                                                        <th>No</th>
                                                        <th>Nama File</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    <?php

                                                    $dokumen = S7LedProdiPascaDetail::findAll(['id_led_prodi_pasca' => $model->id_led_prodi_s1, 'jenis_file'=> $value['nama_dokumen']]);

                                                    foreach ($dokumen as $key => $v):
                                                    ?>
                                                        <tr>
                                                            <td><?=$key+1?></td>
                                                            <td><?=$v->file?></td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <?=Html::a('Lihat',['led-prodi-s1/lihat','id'=>$v->id],['class'=>'btn btn-info '])?>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <?=Html::a('Unduh',['led-prodi-s1/download','id'=>$v->id],['class'=>'btn btn-warning'])?>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <?=Html::a('Hapus',['led-prodi-s1/hapus','id'=>$v->id],[
                                                                            'class'=>'btn btn-danger',
                                                                            'data'=>[
                                                                                'method'=>'POST',
                                                                                'confirm'=>'Apakah anda yakin menghapus item ini?',
                                                                                'params'=>['id'=>$v->id,'akreditasi'=>$_GET['akreditasi'],'prodi'=>$_GET['prodi']]]])?>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-12">

                                            <?php Modal::begin([
                                                'header' => 'Upload dokumen ' . $value['nama_dokumen'],
                                                'toggleButton' => ['label' => '<i class="material-icons">backup</i> &nbsp;upload dokumen led', 'class' => 'btn btn-default btn-sm pull-right'],
                                                'size' => 'modal-lg',
                                                'clientOptions' => ['backdrop' => 'blur', 'keyboard' => true]
                                            ]) ?>
                                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                                            <?= $form->field($model, 'jenis_file')->textInput(['value' => $value['nama_dokumen'], 'readonly' => true]) ?>
                                            <?= $form->field($model, 'file')->widget(FileInput::className(), [
                                                'options' => ['id' => 'file_' . $modelAttribute],
                                                'pluginOptions' => [
                                                    'showUpload' => false
                                                ]
                                            ]) ?>

                                            <div class="form-group">
                                                <?= Html::submitButton('<i class="material-icons">backup</i> Upload File', ['class' => 'btn btn-rose']) ?>
                                            </div>
                                            <?php ActiveForm::end() ?>

                                            <?php Modal::end() ?>

                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>


                        <?php $counter++; endforeach; ?>
                </div>

            </div>

        </div>
    </div>

</div>

