<?php

/* @var $this View */

/* @var $content string */

use common\assets\MaterialDashboardAsset;
use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use akreditasi\assets\AppAsset;
use common\widgets\Alert;

MaterialDashboardAsset::register($this);
$this->registerCssFile('@web/css/demo.css',['depends'=>MaterialDashboardAsset::class]);
$this->registerJsFile('@web/js/demo.js', ['depends' => MaterialDashboardAsset::class]);
$js = <<<JS
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)
JS;
$this->registerJs($js, View::POS_READY);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <title><?=Yii::$app->name . ' '. Yii::$app->params['instansi']?></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="off-canvas-sidebar">
<?php $this->beginBody() ?>
<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  href="#" style="text-decoration:none;color:white;font-size:16px;letter-spacing:1px;"><img src="<?=Yii::getAlias('@web/img/logo-iain.png')?>" width="70">&nbsp;&nbsp;<?=Yii::$app->params['instansi']?></a>
        </div>
    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" data-image="<?=Yii::getAlias('@web/img/Auditorium.JPG')?>">
        <?=$content?>
        <footer class="footer">
            <div class="container">
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
<?=Yii::$app->params['instansi']?>                </p>
            </div>
        </footer>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
