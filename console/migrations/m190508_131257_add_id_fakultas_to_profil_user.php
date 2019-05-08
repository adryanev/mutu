<?php

use yii\db\Migration;

/**
 * Class m190508_131257_add_id_fakultas_to_profil_user
 */
class m190508_131257_add_id_fakultas_to_profil_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('{{%profil_user}}','id_fakultas',$this->integer());
        $this->addForeignKey('fk-profil_user-fakultas_akademi','{{%profil_user}}','id_fakultas','{{%fakultas_akademi}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-profil_user-fakultas_akademi','{{%profil_user}}');
        $this->dropColumn('{{%profil_user}}','id_fakultas');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190508_131257_add_id_fakultas_to_profil_user cannot be reverted.\n";

        return false;
    }
    */
}
