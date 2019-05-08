<?php

namespace monitoring\models;


use common\models\LoginForm;
use common\models\User;

class MonitoringLoginForm extends LoginForm
{

    private $_user;

    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findOne(['username' => $this->username,'is_admin'=>1,'status'=>User::STATUS_ACTIVE]);
        }

        return $this->_user;
    }
}