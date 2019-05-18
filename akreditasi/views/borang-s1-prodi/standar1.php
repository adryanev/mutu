<?php

use akreditasi\models\BorangS1ProdiStandar1Form;
use dosamigos\ckeditor\CKEditor;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Progress;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model BorangS1ProdiStandar1Form */
/** @var array $poin */
$this->title='Standar 1';
$this->params['breadcrumbs'][] = ['label'=>'Isi Borang','url'=>['borang-s1-prodi/index','borang'=>$model->id_borang_s1_prodi]];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Standar 1</h4>
                <p class="category">Kelengkapan Berkas : 60%</p>

                <?=
                Progress::widget([
                    'percent' => $model->progress,
                    'label' => 'test',
                    'barOptions' => ['class' => 'progress-bar-info'],
                    'options' => ['class' => 'progress-striped']
                ]);?>

            </div>


            <div class="card-content">
                <div class="panel-group" id="accordionn" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOnee">
                            <a role="button" data-toggle="collapse" data-parent="#accordionn" href="#collapseOnee" aria-expanded="true" aria-controls="collapseOnee">
                                <h4 class="panel-title">
                                    <?=
                                    $poin[0]['nomor']?> <br><small style="font-size:13px;color:grey"><?= $poin[0]['judul']?>  </small>
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseOnee" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOnee">
                            <div class="panel-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <?=$poin[0]['penjelasan']?>
                                    </div>
                                </div>
                                <div class="clearfix"></div>


                                <div class="row">
                                    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]) ?>

                                    <div class="col-md-12">

                                        <?=$form->field($model,'_1_1')->widget(CKEditor::class,[
                                            'options' => ['rows' => 6],
                                            'preset' => 'basic'
                                        ])->label('') ?>

                                        <div class="form-group">
                                            <?=\yii\bootstrap\Html::submitButton('Simpan',['class'=>'btn btn-rose pull-right'])?>
                                        </div>
                                    </div>

                                    <?php ActiveForm::end() ?>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionn" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="panel-title">
                                    1.1.b <br><small style="font-size:13px;color:grey">Strategi pencapaian sasaran dengan rentang waktu yang jelas dan didukung oleh Dokumen.</small>
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <div class="col-md-12 table-responsive ">
                                    <table class="table table-hover">
                                        <tbody>

                                        <tr>
                                            <p>Isian Borang</p>
                                        </tr>
                                        <tr>
                                            <textarea class="form-control" placeholder="isian"></textarea>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordionn" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <h4 class="panel-title">
                                    1.2 <br><small style="font-size:13px;color:grey">Sosialisasi visi-misi.  Sosialisasi yang efektif tercermin dari tingkat pemahaman seluruh pemangku kepentingan internal yaitu sivitas akademika (dosen dan mahasiswa) dan tenaga kependidikan.  </small>
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </h4>
                            </a>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <div class="col-md-12 table-responsive ">
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <p>Isian Borang</p>
                                        </tr>
                                        <tr>
                                            <textarea class="form-control" placeholder="isian"></textarea>
                                        </tr>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</div>