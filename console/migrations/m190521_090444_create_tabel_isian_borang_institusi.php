<?php

use yii\db\Migration;

/**
 * Class m190521_090444_create_tabel_isian_borang_institusi
 */
class m190521_090444_create_tabel_isian_borang_institusi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%s7_isian_borang_institusi}}', [
            'id' => $this->primaryKey(),
            'id_isian_borang' => $this->integer(),
            'id_borang_institusi'=>$this->integer(),
            'nama_file' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ],$tableOptions);
        $this->addForeignKey('fk-isian_borang_institusi-isian_borang', '{{%s7_isian_borang_institusi}}', 'id_isian_borang', '{{%s7_isian_borang}}', 'id');
        $this->addForeignKey('fk-isian_borang_institusi-borang_institusi', '{{%s7_isian_borang_institusi}}', 'id_borang_institusi', '{{%s7_borang_institusi}}', 'id');
        $this->addForeignKey('fk-isian_borang_institusi-usr_crd', '{{%s7_isian_borang_institusi}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-isian_borang_institusi-usr_upd', '{{%s7_isian_borang_institusi}}', 'updated_by', '{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-isian_borang_institusi-usr_upd', '{{%s7_isian_borang_institusi}}');
        $this->dropForeignKey('fk-isian_borang_institusi-usr_crd', '{{%s7_isian_borang_institusi}}');
        $this->dropForeignKey('fk-isian_borang_institusi-isian_borang', '{{%s7_isian_borang_institusi}}');
        $this->dropForeignKey('fk-isian_borang_institusi-borang_institusi', '{{%s7_isian_borang_institusi}}');
        $this->dropTable('{{%s7_isian_borang_institusi}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190521_090444_create_tabel_isian_borang_institusi cannot be reverted.\n";

        return false;
    }
    */
}
