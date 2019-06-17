<?php

use common\widgets\Menu;
use yii\bootstrap\Html;

?>
<div class="sidebar" data-active-color="green" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
Tip 2: you can also add an image using data-image tag
Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <?= Html::a(Html::img('@web/img/logo-iain.png', ['alt' => 'logo iain', 'width' => '100%']), ['site/index'], ['class' => 'simple-text logo-mini']) ?>
        <?= Html::a('IAIN Padangsidimpuan', ['site/index'], ['class' => 'simple-text logo-normal', 'style' => ['font-size' => '15px']]) ?>
    </div>
    <div class="sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <?= Html::img('@web/img/faces/marc.jpg') ?>
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                <?= Yii::$app->user->identity->profilUser->nama_lengkap ?>
                                <b class="caret"></b>
                            </span>
                </a>
                <div class="clearfix"></div>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="#">
                                <span class="sidebar-mini">MP</span>
                                <span class="sidebar-normal">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini">EP</span>
                                <span class="sidebar-normal">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="sidebar-mini">S</span>
                                <span class="sidebar-normal">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <?= Menu::widget([
            'items' => [

                ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site']],
                [
                    'label' => 'Data Institusi',
                    'url' => '#data_institusi',
                    'icon' => 'account_balance',
                    'items' => [
                        ['label' => 'Unit', 'icon' => 'label_outline', 'url' => ['/unit']],
                        ['label' => 'Fakultas/Akademi', 'icon' => 'label_outline', 'url' => ['/fakultas-akademi']],
                        ['label' => 'Program Studi', 'icon' => 'label_outline', 'url' => ['/program-studi']]
                    ]
                ],
                ['label' => 'Pengguna', 'icon' => 'person_outline', 'url' => ['/user']],
                ['label' => 'S7Akreditasi', 'icon' => 'school', 'url' => '#akreditasi',
                    'items' => [
                        ['label' => 'Jenis S7Akreditasi', 'url' => ['/jenis-akreditasi'],],
                        ['label'=>'Data S7Akreditasi','url'=>['/akreditasi']],
                        ['label'=>'S7Akreditasi Institusi','url'=>['/akreditasi-institusi']],
                        ['label'=>'S7Akreditasi Program Studi','url'=>['/akreditasi-prodi']],
                    ]],
            ],
        ]) ?>
    </div>
</div>