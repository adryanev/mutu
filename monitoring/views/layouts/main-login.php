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
    <title>Sistem Penjamin Mutu IAIN Padangsidimpuan</title>
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
            <a class="navbar-brand" href=" ../dashboard.html ">IAIN Padangsidimpuan</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="../dashboard.html">
                        <i class="material-icons">dashboard</i> Dashboard
                    </a>
                </li>
                <li class="">
                    <a href="register.html">
                        <i class="material-icons">person_add</i> Register
                    </a>
                </li>
                <!-- <li class=" active ">
                    <a href="login.html">
                        <i class="material-icons">fingerprint</i> Login
                    </a>
                </li>
                <li class="">
                    <a href="lock.html">
                        <i class="material-icons">lock_open</i> Lock
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="black" data-image="<?=Yii::getAlias('@web/img/beranda.jpg')?>">
        <?=$content?>
        <footer class="footer">
            <div class="container">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
