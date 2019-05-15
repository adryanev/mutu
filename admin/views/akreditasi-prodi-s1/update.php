<?php

use common\models\Akreditasi;
use common\models\ProgramStudi;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataAkreditasi Akreditasi[] */
/* @var $dataProdi ProgramStudi[] */
/* @var $model common\models\AkreditasiProdiS1 */

$this->title = 'Update Akreditasi Prodi S1: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Akreditasi Prodi S1', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
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

                <div class="akreditasi-prodi-s1-create">

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


