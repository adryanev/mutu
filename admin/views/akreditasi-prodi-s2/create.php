<?php

use common\models\S7Akreditasi;
use common\models\ProgramStudi;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataAkreditasi S7Akreditasi[] */
/* @var $dataProdi ProgramStudi[] */
/* @var $model common\models\S7AkreditasiProdiPasca */

$this->title = 'Create Akreditasi Prodi Pasca';
$this->params['breadcrumbs'][] = ['label' => ' Akreditasi Prodi Pasca', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">file_copy</i>

            </div>
            <div class="card-content">
                <h4 class="card-title">
                    <?= Html::encode($this->title) ?>
                </h4>

                <div class="s7-akreditasi-prodi-pasca-create">

                    <?= $this->render('_form', [
                        'model' => $model,
                        'dataAkreditasi'=>$dataAkreditasi,
                        'dataProdi'=>$dataProdi,
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>

