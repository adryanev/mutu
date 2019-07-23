<?php

use yii\db\Migration;

/**
 * Class m190720_163106_add_k9_akreditasi
 */
class m190720_163106_add_k9_akreditasi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%k9_akreditasi}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'tahun'=>$this->string(4),
            'id_jenis_akreditasi'=>$this->integer(),
            'lembaga'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_akreditasi_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_prodi'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_akreditasi_institusi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->addForeignKey('fk-k9_akreditasi-jenis_akreditasi','{{%k9_akreditasi}}','id_jenis_akreditasi','{{%jenis_akreditasi}}','id','cascade','cascade');
        $this->addForeignKey('fk-k9_akreditasi_prodi-k9_akreditasi','{{%k9_akreditasi_prodi}}','id_akreditasi','{{%k9_akreditasi}}','id','cascade','cascade');
        $this->addForeignKey('fk-k9_akreditasi_prodi-program_studi','{{%k9_akreditasi_prodi}}','id_prodi','{{%program_studi}}','id','cascade','cascade');
        $this->addForeignKey('fk-k9_akreditasi_prodi_institusi-k9_akreditasi','{{%k9_akreditasi_institusi}}','id_akreditasi','{{%k9_akreditasi}}','id','cascade','cascade');



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk-k9_akreditasi-jenis_akreditasi','{{%k9_akreditasi}}');
        $this->dropForeignKey('fk-k9_akreditasi_prodi-k9_akreditasi','{{%k9_akreditasi_prodi}}');
        $this->dropForeignKey('fk-k9_akreditasi_prodi-program_studi','{{%k9_akreditasi_prodi}}');
        $this->dropForeignKey('fk-k9_akreditasi_prodi_institusi-k9_akreditasi','{{%k9_akreditasi_institusi}}');

        $this->dropTable('{{%k9_akreditasi_institusi}}');
        $this->dropTable('{{%k9_akreditasi_prodi}}');
        $this->dropTable('{{%k9_akreditasi_akreditasi}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190720_163106_add_tabel_lkps_s1 cannot be reverted.\n";

        return false;
    }
    */
}
