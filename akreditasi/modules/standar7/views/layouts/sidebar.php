<?php

use common\widgets\Menu;
use yii\bootstrap\Html;

?>
<div class="sidebar" data-active-color="green" data-background-color="white" data-image="<?=Yii::getAlias('@web/img/sidebar-1.jpg')?>">
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

                ['label' => 'Beranda', 'icon' => 'dashboard', 'url' => ['default/index']],
                [
                    'label' => 'Borang',
                    'icon' => 'description',
                    'url' => '#borang',
                    'items' => [
                        ['label'=> 'Unggah Dokumen', 'url'=>['borang/arsip-borang','target'=>'unggah']],
                        ['label'=> 'Isi Borang', 'url'=>['borang/arsip-borang','target'=>'isi']],
                        ['label'=> 'Lihat Borang', 'url'=>['borang/arsip-borang','target'=>'lihat']],
                    ],
                ],
                [
                    'label' => 'Dokumentasi',
                    'icon' => 'book',
                    'url' => '#dokumentasi',
                    'items' => [
                        ['label'=> 'Isi Dokumentasi', 'url'=>['dokumentasi/arsip-dok','target'=>'isi']],
                        ['label'=> 'Penganggung Jawab', 'url'=>['dokumentasi/arsip-dok','target'=>'pj']],
                        ['label'=> 'Lihat Dokumentasi', 'url'=>['dokumentasi/arsip-dok','target'=>'lihat']],
                    ],
                ],
                ['label'=> 'Laporan Evaluasi Diri', 'icon'=>'person', 'url'=>'#LED',
                    'items'=>[
                        ['label'=>'LED Program Studi','url'=>['led/prodi']],
                        ['label'=>'LED Fakultas','url'=>['led-fakultas/index']],
                        ['label'=>'LED Institusi','url'=>['led-institusi/index']]
                    ]],
                [
                    'label' => 'Sertifikat Akreditasi',
                    'icon' => 'assignment',
                    'url' => '#sertifikat',
                    'items' => [
                        ['label'=> 'Data Akreditasi', 'url'=>['data/tabel']],
                        ['label'=> 'Grafik Akreditasi', 'url'=>['data/grafik']],

                    ],
                ],

            ],
        ])?>
    </div>
</div>