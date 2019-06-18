<?php

use common\models\S7Akreditasi;
use common\models\PencarianBorangProdiForm;
use common\models\Program;
use common\models\ProgramStudi;
use kartik\depdrop\DepDrop;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model PencarianBorangProdiForm */
/* @var $modelFakultas \common\models\PencarianBorangFakultasForm */
/* @var $modelInstitusi \common\models\PencarianBorangInstitusiForm */
/* @var $dataAkreditasiProdi S7Akreditasi[] */
/* @var $dataAkreditasiInstitusi S7Akreditasi[] */
/* @var $dataProgram Program[] */


$this->title = 'Pencarian Borang';
$this->params['breadcrumbs'][] = $this->title;
$identity = Yii::$app->user->identity;

?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">file_copy</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Borang Prodi</h4>
                    <?php $form = ActiveForm::begin() ?>

                    <?= $form->field($model, 'akreditasi')->dropDownList($dataAkreditasiProdi, ['prompt' => 'Pilih S7Akreditasi']) ?>
                    <?= $form->field($model, 'jenjang')->dropDownList($dataProgram, ['id' => 'jenjang', 'prompt' => 'Pilih Jenjang']) ?>
                    <?= $form->field($model, 'id_prodi')->widget(DepDrop::class, [
                        'options' => ['id' => 'id_prodi'],
                        'type' => DepDrop::TYPE_SELECT2,
                        'pluginOptions' => [
                            'depends' => ['jenjang'],
                            'placeholder' => 'Pilih Program Studi',
                            'url' => [\yii\helpers\Url::toRoute(['borang/cari-prodi'])],
                        ]
                    ])->label('Program Studi') ?>
                    <?= $form->field($model, 'borang_untuk')->dropDownList(['prodi' => 'Program Studi'], ['prompt' => 'Pilih borang untuk']) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                    </div>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">file_copy</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Fakultas</h4>
                    <?php $form = ActiveForm::begin() ?>

                    <?= $form->field($modelFakultas, 'akreditasi')->dropDownList($dataAkreditasiProdi, ['prompt' => 'Pilih S7Akreditasi']) ?>
                    <?= $form->field($modelFakultas, 'jenjang')->dropDownList($dataProgram, ['id' => 'jenjang', 'prompt' => 'Pilih Jenjang']) ?>
                    <?= $form->field($modelFakultas, 'id_fakultas')->widget(\kartik\select2\Select2::class,[
                            'data' =>ArrayHelper::map(\common\models\FakultasAkademi::find()->all(),'id','nama')
                    ])->label('Fakultas') ?>
                    <?= $form->field($modelFakultas, 'borang_untuk')->dropDownList(['fakultas' => 'Fakultas'], ['prompt' => 'Pilih borang untuk']) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                    </div>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>

    </div>

<?php if ($identity->isAdminInstitusi() || $identity->is_institusi === 1): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">file_copy</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Institusi</h4>
                    <?php $form = ActiveForm::begin() ?>

                    <?= $form->field($modelInstitusi, 'akreditasi')->dropDownList($dataAkreditasiInstitusi, ['prompt' => 'Pilih S7Akreditasi']) ?>
                    <?= $form->field($modelInstitusi, 'borang_untuk')->dropDownList(['institusi' => 'Institusi'], ['prompt' => 'Pilih borang untuk']) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Cari', ['class' => 'btn btn-rose']) ?>
                    </div>

                    <?php ActiveForm::end() ?>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>