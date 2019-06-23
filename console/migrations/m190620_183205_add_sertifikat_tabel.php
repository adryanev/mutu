<?php

use yii\db\Migration;

/**
 * Class m190620_183205_add_sertifikat_tabel
 */
class m190620_183205_add_sertifikat_tabel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sertifikat_prodi}}',[
           'id'=>$this->primaryKey(),
           'id_prodi'=>$this->integer(),
            'nama_lembaga'=>$this->string(),
            'tgl_akreditasi'=>$this->integer(),
            'tgl_kadaluarsa'=>$this->integer(),
            'nomor_sk'=>$this->string(),
            'nomor_sertifikat'=>$this->string(),
            'nilai_angka'=>$this->integer(),
            'nilai_huruf'=>$this->string(),
            'tahun_sk'=>$this->string(),
            'tanggal_pengajuan'=>$this->integer(),
            'tanggal_diterima'=>$this->integer(),
            'is_publik'=>$this->integer(),
            'dokumen_sk'=>$this->string(),
            'sertifikat'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('{{%sertifikat_institusi}}',[
           'id'=>$this->primaryKey(),
           'nama_institusi'=>$this->string(),
            'nama_lembaga'=>$this->string(),
            'tgl_akreditasi'=>$this->integer(),
            'tgl_kadaluarsa'=>$this->integer(),
            'nomor_sk'=>$this->string(),
            'nomor_sertifikat'=>$this->string(),
            'nilai_angka'=>$this->integer(),
            'nilai_huruf'=>$this->string(),
            'tahun_sk'=>$this->string(),
            'tanggal_pengajuan'=>$this->integer(),
            'tanggal_diterima'=>$this->integer(),
            'is_publik'=>$this->integer(),
            'dokumen_sk'=>$this->string(),
            'sertifikat'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->addForeignKey('fk-sertifikat_prodi-prodi','{{%sertifikat_prodi}}','id_prodi','{{%program_studi}}','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-sertifikat_prodi-prodi','{{%sertifikat_prodi}}');
        $this->dropTable('{{%sertifikat_institusi}}');
        $this->dropTable('{{%sertifikat_prodi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190620_183205_add_sertifikat_tabel cannot be reverted.\n";

        return false;
    }
    */
}
