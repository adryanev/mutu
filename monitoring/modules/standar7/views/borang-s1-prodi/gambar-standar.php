<?php

use akreditasi\models\S7BorangS1ProdiStandar1Form;
use akreditasi\models\GambarBorangS1ProdiUploadForm;
use akreditasi\models\IsianBorangS1ProdiUploadForm;
use common\models\S7BorangS1Prodi;
use common\models\S7DetailBorangS1ProdiStandar1;
use common\models\S7GambarBorangS1Prodi;
use common\models\S7IsianBorang;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\bootstrap\Progress;
use yii\db\ActiveQuery;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $model S7GambarBorangS1Prodi */
/* @var $dataBorang S7BorangS1Prodi */
/* @var $gambarForm GambarBorangS1ProdiUploadForm */
/** @var array $poin */
$standar = $json['standar'];

$this->title = 'Standar ' . $standar;
$this->params['breadcrumbs'][] = ['label' => 'Unggah Gambar', 'url' => ['borang-s1-prodi/unggah', 'borang' => $_GET['borang']]];
$this->params['breadcrumbs'][] = $this->title;

?>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->title ?></h4>
                </div>


                <div class="card-content">

                    <div class="table-responsive">
                        <table class="table table-stripped">
                            <tbody>
                            <?php
                            foreach ($poin as $key => $value):
                                $modelAttribute = '_' . str_replace('.', '_', $value['nomor']);

                                ?>
                                <tr>
                                    <td><?= $value['nomor'] ?></td>
                                    <td><?= $value['judul'] ?></td>
                                    <td class="gambar">
                                        <div class="row">
                                            <div class="col-md-12"
                                                >
                                                <?php
                                                $dataGambar = S7GambarBorangS1Prodi::findAll(['id_borang_s1_prodi' => $_GET['borang'], 'nomor_borang' => $value['nomor']]);
                                                foreach ($dataGambar as $gambar):?>

                                                    <div class="col-md-3">
                                                        <div class="col-md-12">
                                                            <?php Modal::begin([
                                                                'header' => $gambar->nama_file,
                                                                'toggleButton' => ['label' =>Html::img(Url::base() . "/upload/{$dataBorang->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$dataBorang->akreditasiProdiS1->akreditasi->tahun}/{$dataBorang->akreditasiProdiS1->id_prodi}/prodi/gambar/$gambar->nama_file", ['width' => 100, 'height' => 100]),['class'=>'btn btn-transparent']],
                                                                'size' => 'modal-lg',
                                                                'clientOptions' => ['backdrop' => 'blur', 'keyboard' => true]
                                                            ])?>

                                                            <?= Html::img(Url::base() . "/upload/{$dataBorang->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$dataBorang->akreditasiProdiS1->akreditasi->tahun}/{$dataBorang->akreditasiProdiS1->id_prodi}/prodi/gambar/$gambar->nama_file") ?>

                                                            <?php Modal::end()?>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <?= $gambar->nama_file ?>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <?= Html::a('Hapus', ['borang-s1-prodi/hapus-gambar'], ['class' => 'btn btn-danger btn-sm',
                                                                'data' => [
                                                                    'method' => 'POST',
                                                                    'confirm'=> 'Apakah anda yakin menghapus gambar ini?',
                                                                    'params'=>['id'=>$gambar->id,'borang'=>$_GET['borang'],'standar'=>$standar]
                                                                ]]) ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                    </td>
                                </tr>

                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>

    </div>

<?php

$css = <<<CSS
table,
tbody {
  display:inline-block;/* whatever, just  reset table layout display to go further */
}

tr {
  display:flex;
  flex-wrap:wrap; /* allow to wrap on multiple rows */
}
td {
  display:block;
  flex:1 /* to evenly distributs flex elements */
}
.gambar {
  width:100%; /* fill entire width,row */
  flex:auto; /* reset the flex properti to allow width take over */
}
CSS;

$this->registerCss($css);
