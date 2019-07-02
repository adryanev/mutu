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
        <?= Html::a('IAIN Padangsidimpuan',['default/index'],['class'=>'simple-text logo-normal','style'=>['font-size'=>'15px']])?>
    </div>
    <div class="sidebar-wrapper" >
        <div class="user">
            <div class="photo">
                <?= Html::img('@web/img/faces/marc.jpg')?>
            </div>
            <div class="info">
                <a>
                            <span>
                                <?=Yii::$app->user->identity->profilUser->nama_lengkap?>
                            </span>
                </a>
                <div class="clearfix"></div>
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
                        ['label'=> 'Lihat Borang', 'url'=>['borang/arsip-borang','target'=>'lihat']],
                    ],
                ],
                [
                    'label' => 'Dokumentasi',
                    'icon' => 'book',
                    'url' => '#dokumentasi',
                    'items' => [
                        ['label'=> 'Penganggung Jawab', 'url'=>['dokumentasi/arsip-dok','target'=>'pj']],
                        ['label'=> 'Lihat Dokumentasi', 'url'=>['dokumentasi/arsip-dok','target'=>'lihat']],
                    ],
                ],
                ['label'=> 'Laporan Evaluasi Diri', 'icon'=>'person', 'url'=>'#LED',
                    'items'=>[
                        ['label'=>'LED Program Studi','url'=>['led/prodi']],
                        ['label'=>'LED Fakultas','url'=>['led-fakultas/arsip']],
                        ['label'=>'LED Institusi','url'=>['led-institusi/arsip']]
                    ]],

            ],
        ])?>
    </div>
</div>