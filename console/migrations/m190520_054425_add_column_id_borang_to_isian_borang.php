<?php

use yii\db\Migration;

/**
 * Class m190520_054425_add_column_id_borang_to_isian_borang
 */
class m190520_054425_add_column_id_borang_to_isian_borang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%isian_borang_s1_prodi}}','id_borang_s1_prodi',$this->integer());
        $this->addColumn('{{%isian_borang_s1_fakultas}}','id_borang_s1_fakultas',$this->integer());

        $this->addForeignKey('fk-isian_borang_s1_prodi-borang_s1_prodi','{{%isian_borang_s1_prodi}}','id_borang_s1_prodi','{{%borang_s1_prodi}}','id');
        $this->addForeignKey('fk-isian_borang_s1_fakultas-borang_s1_fakultas','{{%isian_borang_s1_fakultas}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-isian_borang_s1_prodi-borang_s1_prodi','{{%isian_borang_s1_prodi}}');
        $this->dropForeignKey('fk-isian_borang_s1_fakultas-borang_s1_fakultas','{{%isian_borang_s1_fakultas}}');

        $this->dropColumn('{{%isian_borang_s1_fakultas}}','id_borang_s1_fakultas');
        $this->dropColumn('{{%isian_borang_s1_prodi}}','id_borang_s1_prodi');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190520_054425_add_column_id_borang_to_isian_borang cannot be reverted.\n";

        return false;
    }
    */
}
