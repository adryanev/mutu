<?php

namespace monitoring\modules\kriteria9;

use Yii;
use yii\web\ErrorHandler;

/**
 * kriteria9 module definition class
 */
class Kriteria9 extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'monitoring\modules\kriteria9\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::configure($this, [
            'components' => [
                'errorHandler' => [
                    'class' => ErrorHandler::className(),
                    'errorAction' => '/kriteria9/default/error'
                ]
            ],
        ]);

        /** @var ErrorHandler $handler */
        $handler = $this->get('errorHandler');
        Yii::$app->set('errorHandler', $handler);
        $handler->register();
        // custom initialization code goes here
    }
}
