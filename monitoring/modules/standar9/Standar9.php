<?php

namespace monitoring\modules\standar9;

use Yii;
use yii\web\ErrorHandler;

/**
 * standar9 module definition class
 */
class Standar9 extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'monitoring\modules\standar9\controllers';

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
                    'errorAction' => '/standar9/default/error'
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
