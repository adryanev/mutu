<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\assets\MaterialDashboardAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use akreditasi\assets\AppAsset;
use common\widgets\Alert;

MaterialDashboardAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrapper">

    <?=$this->render('sidebar')?>
    <?=$this->render('header')?>
    <?= \yii2mod\alert\Alert::widget([
        'useSessionFlash' => true,
    ])?>
    <?=$this->render('content',['content'=>$content])?>
    <?=$this->render('footer')?>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
