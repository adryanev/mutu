<?php

namespace monitoring\modules\standar7;

use Yii;
use yii\web\ErrorHandler;

/**
 * standar7 module definition class
 */
class Standar7 extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'monitoring\modules\standar7\controllers';

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
                    'errorAction' => '/standar7/default/error'
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
