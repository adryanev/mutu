<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="green">
                <i class="material-icons">file_copy</i>

            </div>
            <div class="card-content">
                <h4 class="card-title">
                    <?= "<?= " ?>Html::encode($this->title) ?>
                </h4>

                <div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

                    <p>
                        <?= "<?= " ?>Html::a(<?= $generator->generateString('Update') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
                        <?= "<?= " ?>Html::a(<?= $generator->generateString('Delete') ?>, ['delete', <?= $urlParams ?>], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => <?= $generator->generateString('Are you sure you want to delete this item?') ?>,
                        'method' => 'post',
                        ],
                        ]) ?>
                    </p>

                    <?= "<?= " ?>DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                    <?php
                    if (($tableSchema = $generator->getTableSchema()) === false) {
                        foreach ($generator->getColumnNames() as $name) {
                            echo "            '" . $name . "',\n";
                        }
                    } else {
                        foreach ($generator->getTableSchema()->columns as $column) {
                            $format = $generator->generateColumnFormat($column);
                            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
                        }
                    }
                    ?>
                    ],
                    ]) ?>

                </div>

            </div>
        </div>
    </div>
</div>



