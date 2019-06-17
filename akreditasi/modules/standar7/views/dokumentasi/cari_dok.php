<?php

use common\models\S7Akreditasi;
use common\models\PencarianDokumentasiProdiForm;
use common\models\Program;
use common\models\ProgramStudi;
use kartik\depdrop\DepDrop;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
/* @var $model PencarianDokumentasiProdiForm */
/* @var $dataAkreditasi S7Akreditasi[] */
/* @var $dataProgram Program[] */


$this->title='Pencarian Dokumentasi';
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
                <?php $form = ActiveForm::begin() ?>

                    <?=$form->field($model,'akreditasi')->dropDownList($dataAkreditasi,['prompt'=>'Pilih S7Akreditasi'])?>
                    <?=$form->field($model,'program')->dropDownList($dataProgram,['id'=>'id_program','prompt'=>'Pilih Jenjang'])?>
                    <?=$form->field($model,'id_prodi')->widget(DepDrop::class,[
                        'options' => ['id' => 'id_prodi'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['id_program'],
                            'placeholder' => 'Pilih Program Studi',
                            'url' => [\yii\helpers\Url::toRoute(['dokumentasi/cari-dok'])],

                        ]
                    ])->label('Program Studi')?>
                    <?=$form->field($model,'dokumentasi_untuk')->dropDownList(['fakultas'=>'Fakultas','prodi'=>'Program Studi'],['prompt'=>'Pilih dokumentasi untuk'])?>

                <div class="form-group">
                    <?=Html::submitButton('Cari',['class'=>'btn btn-rose'])?>
                </div>

                <?php ActiveForm::end() ?>
            </div>
        </div>
    </div>

</div>