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
        $this->createTable('{{%gambar_borang_s1_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi'=>$this->integer(),
            'nomor_borang'=>$this->string(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createIndex('idx-search-gambar_borang_s1_prodi','{{%gambar_borang_s1_prodi}}',['nomor_borang']);
        $this->addForeignKey('fk-gambar_borang_s1_prodi-borang_s1_prodi','{{%gambar_borang_s1_prodi}}','id_borang_s1_prodi','{{%borang_s1_prodi}}','id');

        $this->addForeignKey('fk-gambar_borang_s1_prodi-usr_crd','{{%gambar_borang_s1_prodi}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-gambar_borang_s1_prodi-usr_upd','{{%gambar_borang_s1_prodi}}','updated_by','{{%user}}','id');



        $this->createTable('{{%gambar_borang_s1_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            'nomor_borang'=>$this->string(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createIndex('idx-search-gambar_borang_s1_fakultas','{{%gambar_borang_s1_fakultas}}',['nomor_borang']);
        $this->addForeignKey('fk-gambar_borang_s1_fakultas-borang_s1_fakultas','{{%gambar_borang_s1_fakultas}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');

        $this->addForeignKey('fk-gambar_borang_s1_fakultas-usr_crd','{{%gambar_borang_s1_fakultas}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-gambar_borang_s1_fakultas-usr_upd','{{%gambar_borang_s1_fakultas}}','updated_by','{{%user}}','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk-gambar_borang_s1_fakultas-usr_upd','{{%gambar_borang_s1_fakultas}}');
        $this->dropForeignKey('fk-gambar_borang_s1_fakultas-usr_crd','{{%gambar_borang_s1_fakultas}}');
        $this->dropForeignKey('fk-gambar_borang_s1_fakultas-borang_s1_fakultas','{{%gambar_borang_s1_fakultas}}');

        $this->dropIndex('idx-search-gambar_borang_s1_fakultas','{{%gambar_borang_s1_fakultas}}');
        $this->dropTable('{{%gambar_borang_s1_fakultas}}');

        $this->dropForeignKey('fk-gambar_borang_s1_prodi-usr_upd','{{%gambar_borang_s1_prodi}}');
        $this->dropForeignKey('fk-gambar_borang_s1_prodi-usr_crd','{{%gambar_borang_s1_prodi}}');
        $this->dropForeignKey('fk-gambar_borang_s1_prodi-borang_s1_prodi','{{%gambar_borang_s1_prodi}}');

        $this->dropIndex('idx-search-gambar_borang_s1_prodi','{{%gambar_borang_s1_prodi}}');
        $this->dropTable('{{%gambar_borang_s1_prodi}}');
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
