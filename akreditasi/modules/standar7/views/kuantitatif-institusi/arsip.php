<?php


use common\models\ProgramStudi;
use common\models\S7Akreditasi;
use kartik\select2\Select2;
use yii\base\DynamicModel;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $dataProdi ProgramStudi */
/* @var $dataAkreditasi S7Akreditasi*/
/* @var $dataAkreInstitusi S7Akreditasi */
/* @var $modelInstitusi DynamicModel */

$this->title = 'Unggah Data Kuantitatif';

?>


<div class="row">

    <div class="col-md-12">
        <div class="card">

            <div class="card-content">
                <ul class="nav nav-pills nav-pills-success">

                    <li class="active">
                        <a href="#pill2" data-toggle="tab">Data Kuantitatif Institusi</a>
                    </li>


                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="pill2">
                        <div class="card">

                            <div class="card-content">
                                <h4 class="card-title">Form Kuantitatif Institusi</h4>

                                <?php $form = ActiveForm::begin() ?>

                                <?=$form->field($modelInstitusi,'akreditasi_ins')->dropDownList($dataAkreInstitusi,['prompt'=>'Pilih Akreditasi'])?>

                                <div class="form-group">
                                    <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                                </div>

                                <?php ActiveForm::end() ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>