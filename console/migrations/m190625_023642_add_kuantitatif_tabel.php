<?php

use yii\db\Migration;

/**
 * Class m190625_023642_add_kuantitatif_tabel
 */
class m190625_023642_add_kuantitatif_tabel extends Migration
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

        $this->createTable('{{%s7_data_kuantitatif_prodi}}',[
            'id' => $this->primaryKey(),
            'id_akreditasi_prodi_s1' => $this->integer(),
            'nama_dokumen' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ],$tableOptions);

        $this->addForeignKey('fk-s7_data_kuantitatif_prodi-s7_akreditasi_prodi_s1','{{%s7_data_kuantitatif_prodi}}','id_akreditasi_prodi_s1','{{%s7_akreditasi_prodi_s1}}','id');
        $this->addForeignKey('fk-s7_data_kuantitatif_prodi-usr_crt', '{{%s7_data_kuantitatif_prodi}}','created_by','{{%user}}', 'id');
        $this->addForeignKey('fk-s7_data_kuantitatif_prodi-usr_upd', '{{%s7_data_kuantitatif_prodi}}','updated_by','{{%user}}', 'id');

        $this->createTable('{{%s7_data_kuantitatif_institusi}}',[
            'id' => $this->primaryKey(),
            'id_akreditasi' => $this->integer(),
            'nama_dokumen' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer()
        ],$tableOptions);

        $this->addForeignKey('fk-s7_data_kuantitatif_institusi-s7_akreditasi','{{%s7_data_kuantitatif_institusi}}','id_akreditasi','{{%s7_akreditasi}}','id');
        $this->addForeignKey('fk-s7_data_kuantitatif_institusi-usr_crt', '{{%s7_data_kuantitatif_institusi}}','created_by','{{%user}}', 'id');
        $this->addForeignKey('fk-s7_data_kuantitatif_institusi-usr_upd', '{{%s7_data_kuantitatif_institusi}}','updated_by','{{%user}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk-s7_data_kuantitatif_institusi-usr_upd','{{%s7_data_kuantitatif_institusi}}');
        $this->dropForeignKey('fk-s7_data_kuantitatif_institusi-usr_crt','{{%s7_data_kuantitatif_institusi}}');
        $this->dropForeignKey('fk-s7_data_kuantitatif_institusi-s7_akreditasi','{{%s7_data_kuantitatif_institusi}}');
        $this->dropTable('{{%s7_data_kuantitatif_institusi}}');

        $this->dropForeignKey('fk-s7_data_kuantitatif_prodi-usr_upd','{{%s7_data_kuantitatif_prodi}}');
        $this->dropForeignKey('fk-s7_data_kuantitatif_prodi-usr_crt','{{%s7_data_kuantitatif_prodi}}');
        $this->dropForeignKey('fk-s7_data_kuantitatif_prodi-s7_akreditasi_prodi_s1','{{%s7_data_kuantitatif_prodi}}');
        $this->dropTable('{{%s7_data_kuantitatif_prodi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190625_023642_add_kuantitatif_tabel cannot be reverted.\n";

        return false;
    }
    */
}
