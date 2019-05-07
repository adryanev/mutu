<?php

use yii\widgets\Breadcrumbs;

/**
 * @var $content string
 */
?>
<div class="content">
    <div class="container-fluid">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
       <?=$content?>
    </div>
</div>