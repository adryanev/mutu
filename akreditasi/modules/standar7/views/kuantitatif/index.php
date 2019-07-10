<?php

$this->title = 'Unggah Data Kuantitatif';

use common\models\ProgramStudi;
use common\models\S7Akreditasi;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $dataProdi ProgramStudi */
/* @var $dataAkreditasi S7Akreditasi*/

?>


<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-content">
                <ul class="nav nav-pills nav-pills-success">

                        <li class="active">
                            <a href="#pill1" data-toggle="tab">Data Kuantitatif Program Studi</a>
                        </li>


                        <li>
                            <a href="#pill2" data-toggle="tab">Data Kuantitatif Institusi</a>
                        </li>


                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="pill1">
                        <div class="card">

                            <div class="card-content">
                                <h4 class="card-title">Pilih Program Studi</h4>

                                <?php $form = ActiveForm::begin() ?>

                                <?=$form->field($model,'akreditasi')->dropDownList($dataAkreditasi,['prompt'=>'Pilih Akreditasi'])?>

                                <?= $form->field($model, 'prodi')->widget(Select2::class, [
                                    'data' => $dataProdi,
                                    'options' => [
                                        'placeholder' => 'Pilih Program Studi'
                                    ]
                                ])->label('Program Studi') ?>

                                <div class="form-group">
                                    <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                                </div>

                                <?php ActiveForm::end() ?>

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane" id="pill2">
                        <div class="card">

                            <div class="card-content">
                                <h4 class="card-title">Institusi</h4>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>