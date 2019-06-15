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
        <?= Html::a(Html::img('@web/img/logo-iain.png',['alt'=>'logo iain','width'=>'100%']),['site/index'],['class'=>'simple-text logo-mini'])?>
        <?= Html::a('IAIN Padangsidimpuan',['site/index'],['class'=>'simple-text logo-normal','style'=>['font-size'=>'15px']])?>
    </div>
    <div class="sidebar-wrapper" >
        <div class="user">
            <div class="photo">
                <?= Html::img('@web/img/faces/marc.jpg')?>
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <span>
                                <?=Yii::$app->user->identity->profilUser->nama_lengkap?>
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

        <?= Menu::widget( [
            'items' => [

                ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site']],
                [
                    'label' => 'Borang',
                    'icon' => 'description',
                    'url' => '#borang',
                    'items' => [
                        ['label'=> 'Lihat Borang', 'url'=>['/borang/lihat']],
                    ],
                ],
                [
                    'label' => 'Dokumentasi',
                    'icon' => 'book',
                    'url' => '#dokumentasi',
                    'items' => [
                        ['label'=> 'Penganggung Jawab', 'url'=>['/dokumentasi/penanggung']],
                        ['label'=> 'Lihat Dokumentasi', 'url'=>['/dokumentasi/lihat-dok']],
                    ],
                ],
                [
                    'label' => 'Sertifikat S7Akreditasi',
                    'icon' => 'assignment',
                    'url' => '#sertifikat',
                    'items' => [
                        ['label'=> 'Data S7Akreditasi', 'url'=>['/data/tabel']],
                        ['label'=> 'Grafik S7Akreditasi', 'url'=>['/data/grafik']],

                    ],
                ],
                ['label'=> 'Pengguna', 'icon'=>'person', 'url'=>['/user/index']],
            ],
        ])?>
    </div>
</div>