<?php

use yii\db\Migration;

/**
 * Class m190520_042417_create_isian_borang
 */
class m190520_042417_create_isian_borang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%s7_isian_borang}}', [
            'id' => $this->primaryKey(),
            'nomor_borang' => $this->string(),
            'nama_file' => $this->string(),
            'untuk' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ],$tableOptions);

        $this->createTable('{{%s7_isian_borang_s1_prodi}}', [
            'id' => $this->primaryKey(),
            'id_isian_borang' => $this->integer(),
            'nama_file' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ],$tableOptions);

        $this->createTable('{{%s7_isian_borang_s1_fakultas}}', [
            'id' => $this->primaryKey(),
            'id_isian_borang' => $this->integer(),
            'nama_file' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ],$tableOptions);


        $this->addForeignKey('fk-isian_borang_s1_prodi-isian_borang', '{{%s7_isian_borang_s1_prodi}}', 'id_isian_borang', '{{%s7_isian_borang}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('fk-isian_borang_s1_fakultas-isian_borang', '{{%s7_isian_borang_s1_fakultas}}', 'id_isian_borang', '{{%s7_isian_borang}}', 'id','CASCADE','CASCADE');

        $this->addForeignKey('fk-isian_borang_s1_prodi-usr_crd', '{{%s7_isian_borang_s1_prodi}}', 'created_by', '{{%user}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('fk-isian_borang_s1_prodi-usr_upd', '{{%s7_isian_borang_s1_prodi}}', 'updated_by', '{{%user}}', 'id','CASCADE','CASCADE');


        $this->addForeignKey('fk-isian_borang_s1_fakultas-usr_crd', '{{%s7_isian_borang_s1_fakultas}}', 'created_by', '{{%user}}', 'id','CASCADE','CASCADE');
        $this->addForeignKey('fk-isian_borang_s1_fakultas-usr_upd', '{{%s7_isian_borang_s1_fakultas}}', 'updated_by', '{{%user}}', 'id','CASCADE','CASCADE');


        $this->createIndex('idx-search-isian_borang', '{{%s7_isian_borang}}', ['nomor_borang', 'untuk']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-search-isian_borang_prod', '{{%s7_isian_borang}}');

        $this->dropForeignKey('fk-isian_borang_s1_fakultas-usr_upd', '{{%s7_isian_borang_s1_fakultas}}');
        $this->dropForeignKey('fk-isian_borang_s1_fakultas-usr_crd', '{{%s7_isian_borang_s1_fakultas}}');


        $this->dropForeignKey('fk-isian_borang_s1_prodi-usr_upd', '{{%s7_isian_borang_s1_prodi}}');
        $this->dropForeignKey('fk-isian_borang_s1_prodi-usr_crd', '{{%s7_isian_borang_s1_prodi}}');

        $this->dropForeignKey('fk-isian_borang_s1_prodi-isian_borang', '{{%s7_isian_borang_s1_prodi}}');
        $this->dropForeignKey('fk-isian_borang_s1_fakultas-isian_borang', '{{%s7_isian_borang_s1_fakultas}}');

        $this->dropTable('{{%s7_isian_borang_s1_fakultas}}');
        $this->dropTable('{{%s7_isian_borang_s1_prodi}}');
        $this->dropTable('{{%s7_isian_borang}}');

    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190520_042417_create_isian_borang cannot be reverted.\n";

        return false;
    }
    */
}
