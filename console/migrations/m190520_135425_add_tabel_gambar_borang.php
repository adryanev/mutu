<?php

use yii\db\Migration;

/**
 * Class m190520_135425_add_tabel_gambar_borang
 */
class m190520_135425_add_tabel_gambar_borang extends Migration
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
        $this->createTable('{{%s7_gambar_borang_s1_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi'=>$this->integer(),
            'nomor_borang'=>$this->string(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);

        $this->createIndex('idx-search-gambar_borang_s1_prodi','{{%s7_gambar_borang_s1_prodi}}',['nomor_borang']);
        $this->addForeignKey('fk-gambar_borang_s1_prodi-borang_s1_prodi','{{%s7_gambar_borang_s1_prodi}}','id_borang_s1_prodi','{{%s7_borang_s1_prodi}}','id');

        $this->addForeignKey('fk-gambar_borang_s1_prodi-usr_crd','{{%s7_gambar_borang_s1_prodi}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-gambar_borang_s1_prodi-usr_upd','{{%s7_gambar_borang_s1_prodi}}','updated_by','{{%user}}','id');



        $this->createTable('{{%s7_gambar_borang_s1_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            'nomor_borang'=>$this->string(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);

        $this->createIndex('idx-search-gambar_borang_s1_fakultas','{{%s7_gambar_borang_s1_fakultas}}',['nomor_borang']);
        $this->addForeignKey('fk-gambar_borang_s1_fakultas-borang_s1_fakultas','{{%s7_gambar_borang_s1_fakultas}}','id_borang_s1_fakultas','{{%s7_borang_s1_fakultas}}','id','CASCADE','CASCADE');

        $this->addForeignKey('fk-gambar_borang_s1_fakultas-usr_crd','{{%s7_gambar_borang_s1_fakultas}}','created_by','{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-gambar_borang_s1_fakultas-usr_upd','{{%s7_gambar_borang_s1_fakultas}}','updated_by','{{%user}}','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk-gambar_borang_s1_fakultas-usr_upd','{{%s7_gambar_borang_s1_fakultas}}');
        $this->dropForeignKey('fk-gambar_borang_s1_fakultas-usr_crd','{{%s7_gambar_borang_s1_fakultas}}');
        $this->dropForeignKey('fk-gambar_borang_s1_fakultas-borang_s1_fakultas','{{%s7_gambar_borang_s1_fakultas}}');

        $this->dropIndex('idx-search-gambar_borang_s1_fakultas','{{%s7_gambar_borang_s1_fakultas}}');
        $this->dropTable('{{%s7_gambar_borang_s1_fakultas}}');

        $this->dropForeignKey('fk-gambar_borang_s1_prodi-usr_upd','{{%s7_gambar_borang_s1_prodi}}');
        $this->dropForeignKey('fk-gambar_borang_s1_prodi-usr_crd','{{%s7_gambar_borang_s1_prodi}}');
        $this->dropForeignKey('fk-gambar_borang_s1_prodi-borang_s1_prodi','{{%s7_gambar_borang_s1_prodi}}');

        $this->dropIndex('idx-search-gambar_borang_s1_prodi','{{%s7_gambar_borang_s1_prodi}}');
        $this->dropTable('{{%s7_gambar_borang_s1_prodi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190520_135425_add_tabel_gambar_borang cannot be reverted.\n";

        return false;
    }
    */
}
