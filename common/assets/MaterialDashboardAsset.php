<?php

namespace common\assets;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\AssetBundle;
use yii\bootstrap\BootstrapAsset;
use yii\web\YiiAsset;
use yii2mod\alert\AlertAsset;

class MaterialDashboardAsset extends AssetBundle
{

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/material-dashboard.css?v=1.2.0',
        'http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css',
        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons',
        'https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp',

    ];
    public $js = [
        'js/material.min.js',
        'js/perfect-scrollbar.jquery.min.js',
        'js/arrive.min.js',
        'js/jquery.validate.min.js',
        'js/es6-promise-auto.min.js',
        'js/moment.min.js',
        'js/chartist.min.js',
        'js/jquery.bootstrap-wizard.js',
        'js/bootstrap-notify.js',
        'js/bootstrap-datetimepicker.js',
        'js/jquery-jvectormap.js',
        'js/nouislider.min.js',
        'js/jquery.select-bootstrap.js',
        //'js/demo.js',
        'js/fullcalendar.min.js',
        'js/jquery.tagsinput.js',
        'js/jasny-bootstrap.min.js',
        'js/material-dashboard.js?v=1.2.0',
        'js/yii2-override.js',
    ];
    public $depends = [
        YiiAsset::class,
        BootstrapAsset::class,
        BootstrapPluginAsset::class,
        AlertAsset::class,
    ];
}