<?php
namespace common\auth\rbac\rules;


class IsiLedFakultasSendiriRules extends \yii\rbac\Rule
{
    public $name ="isi-led-prodi-sendiri";

    /**
     * Executes the rule.
     *
     * @param string|int $user the user ID. This should be either an integer or a string representing
     * the unique identifier of a user. See [[\yii\web\User::id]].
     * @param \yii\rbac\Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to [[CheckAccessInterface::checkAccess()]].
     * @return bool a value indicating whether the rule permits the auth item it is associated with.
     */
    public function execute($user, $item, $params)
    {
        if(isset($params['fakultas'])){
            $pengguna = \common\models\User::findOne($user);
            return $params['fakultas']->id == $pengguna->profilUser->id_fakultas;
        }

        return false;
    }
}