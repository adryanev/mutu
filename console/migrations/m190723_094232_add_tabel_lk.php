<?php

use yii\db\Migration;

/**
 * Class m190723_094232_add_tabel_lk
 */
class m190723_094232_add_tabel_lk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%k9_lkps_prodi}}',[
            'id'=> $this->primaryKey(),
            'id_akreditasi_prodi_s1'=> $this->integer(),
            'progress'=> $this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_lk_s1_prodi_kriteria1}}',[
            'id'=> $this->primaryKey(),
            'id_k9_lk_s1_prodi'=> $this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'jenis_dokumen'=>$this->string(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

//        detail

        $this->createTable('{{%k9_lk_s1_prodi_kriteria2}}',[
            'id'=> $this->primaryKey(),
            'id_k9_lk_s1_prodi'=> $this->integer(),
            'dokumen'=>$this->string(),
            'jenis_dokumen'=>$this->string(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_lk_s1_prodi_kriteria3}}',[
            'id'=> $this->primaryKey(),
            'id_k9_lk_s1_prodi'=> $this->integer(),
            'dokumen'=>$this->string(),
            'jenis_dokumen'=>$this->string(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_lk_s1_prodi_kriteria4}}',[
            'id'=> $this->primaryKey(),
            'id_k9_lk_s1_prodi'=> $this->integer(),
            'dokumen'=>$this->string(),
            'jenis_dokumen'=>$this->string(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_lk_s1_prodi_kriteria5}}',[
            'id'=> $this->primaryKey(),
            'id_k9_lk_s1_prodi'=> $this->integer(),
            'dokumen'=>$this->string(),
            'jenis_dokumen'=>$this->string(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_lk_s1_prodi_kriteria6}}',[
            'id'=> $this->primaryKey(),
            'id_k9_lk_s1_prodi'=> $this->integer(),
            'dokumen'=>$this->string(),
            'jenis_dokumen'=>$this->string(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_lk_s1_prodi_kriteria7}}',[
            'id'=> $this->primaryKey(),
            'id_k9_lk_s1_prodi'=> $this->integer(),
            'dokumen'=>$this->string(),
            'jenis_dokumen'=>$this->string(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_lk_s1_prodi_kriteria8}}',[
            'id'=> $this->primaryKey(),
            'id_k9_lk_s1_prodi'=> $this->integer(),
            'dokumen'=>$this->string(),
            'jenis_dokumen'=>$this->string(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%k9_lk_s1_prodi_kriteria9}}',[
            'id'=> $this->primaryKey(),
            'id_k9_lk_s1_prodi'=> $this->integer(),
            'dokumen'=>$this->string(),
            'jenis_dokumen'=>$this->string(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->addForeignKey('fk-k9_lk_s1_prodi-s7_akreditasi_prodi','{{%k9_lk_s1_prodi}}','id_akreditasi_prodi_s1','{{%s7_akreditasi_prodi}}','id');

        $this->addForeignKey('fk-k9_lk_s1_prodi_k1-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria1}}','id_k9_lk_s1_prodi','{{%k9_lk_s1_prodi}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k1-usr_crt','{{%k9_lk_s1_prodi_kriteria1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k1-usr_upd','{{%k9_lk_s1_prodi_kriteria1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-k9_lk_s1_prodi_k2-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria2}}','id_k9_lk_s1_prodi','{{%k9_lk_s1_prodi}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k2-usr_crt','{{%k9_lk_s1_prodi_kriteria2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k2-usr_upd','{{%k9_lk_s1_prodi_kriteria2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-k9_lk_s1_prodi_k3-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria3}}','id_k9_lk_s1_prodi','{{%k9_lk_s1_prodi}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k3-usr_crt','{{%k9_lk_s1_prodi_kriteria3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k3-usr_upd','{{%k9_lk_s1_prodi_kriteria3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-k9_lk_s1_prodi_k4-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria4}}','id_k9_lk_s1_prodi','{{%k9_lk_s1_prodi}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k4-usr_crt','{{%k9_lk_s1_prodi_kriteria4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k4-usr_upd','{{%k9_lk_s1_prodi_kriteria4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-k9_lk_s1_prodi_k5-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria5}}','id_k9_lk_s1_prodi','{{%k9_lk_s1_prodi}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k5-usr_crt','{{%k9_lk_s1_prodi_kriteria5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k5-usr_upd','{{%k9_lk_s1_prodi_kriteria5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-k9_lk_s1_prodi_k6-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria6}}','id_k9_lk_s1_prodi','{{%k9_lk_s1_prodi}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k6-usr_crt','{{%k9_lk_s1_prodi_kriteria6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k6-usr_upd','{{%k9_lk_s1_prodi_kriteria6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-k9_lk_s1_prodi_k7-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria7}}','id_k9_lk_s1_prodi','{{%k9_lk_s1_prodi}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k7-usr_crt','{{%k9_lk_s1_prodi_kriteria7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k7-usr_upd','{{%k9_lk_s1_prodi_kriteria7}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-k9_lk_s1_prodi_k8-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria8}}','id_k9_lk_s1_prodi','{{%k9_lk_s1_prodi}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k8-usr_crt','{{%k9_lk_s1_prodi_kriteria8}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k8-usr_upd','{{%k9_lk_s1_prodi_kriteria8}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-k9_lk_s1_prodi_k9-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria9}}','id_k9_lk_s1_prodi','{{%k9_lk_s1_prodi}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k9-usr_crt','{{%k9_lk_s1_prodi_kriteria9}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-k9_lk_s1_prodi_k9-usr_upd','{{%k9_lk_s1_prodi_kriteria9}}','updated_by','{{%user}}','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k9-usr_upd','{{%k9_lk_s1_prodi_kriteria9}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k9-usr_crt','{{%k9_lk_s1_prodi_kriteria9}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k9-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria9}}');

        $this->dropForeignKey('fk-k9_lk_s1_prodi_k8-usr_upd','{{%k9_lk_s1_prodi_kriteria8}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k8-usr_crt','{{%k9_lk_s1_prodi_kriteria8}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k8-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria8}}');

        $this->dropForeignKey('fk-k9_lk_s1_prodi_k7-usr_upd','{{%k9_lk_s1_prodi_kriteria7}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k7-usr_crt','{{%k9_lk_s1_prodi_kriteria7}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k7-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria7}}');

        $this->dropForeignKey('fk-k9_lk_s1_prodi_k6-usr_upd','{{%k9_lk_s1_prodi_kriteria6}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k6-usr_crt','{{%k9_lk_s1_prodi_kriteria6}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k6-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria6}}');

        $this->dropForeignKey('fk-k9_lk_s1_prodi_k5-usr_upd','{{%k9_lk_s1_prodi_kriteria5}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k5-usr_crt','{{%k9_lk_s1_prodi_kriteria5}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k5-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria5}}');

        $this->dropForeignKey('fk-k9_lk_s1_prodi_k4-usr_upd','{{%k9_lk_s1_prodi_kriteria4}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k4-usr_crt','{{%k9_lk_s1_prodi_kriteria4}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k4-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria4}}');

        $this->dropForeignKey('fk-k9_lk_s1_prodi_k3-usr_upd','{{%k9_lk_s1_prodi_kriteria3}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k3-usr_crt','{{%k9_lk_s1_prodi_kriteria3}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k3-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria3}}');

        $this->dropForeignKey('fk-k9_lk_s1_prodi_k2-usr_upd','{{%k9_lk_s1_prodi_kriteria2}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k2-usr_crt','{{%k9_lk_s1_prodi_kriteria2}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k2-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria2}}');

        $this->dropForeignKey('fk-k9_lk_s1_prodi_k1-usr_upd','{{%k9_lk_s1_prodi_kriteria1}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k1-usr_crt','{{%k9_lk_s1_prodi_kriteria1}}');
        $this->dropForeignKey('fk-k9_lk_s1_prodi_k1-k9_lk_s1_prodi','{{%k9_lk_s1_prodi_kriteria1}}');

        $this->dropForeignKey('fk-k9_lk_s1_prodi-s7_akreditasi_prodi','{{%k9_lk_s1_prodi}}');

        $this->dropTable('{{%k9_lk_s1_prodi_kriteria9}}');
        $this->dropTable('{{%k9_lk_s1_prodi_kriteria8}}');
        $this->dropTable('{{%k9_lk_s1_prodi_kriteria7}}');
        $this->dropTable('{{%k9_lk_s1_prodi_kriteria6}}');
        $this->dropTable('{{%k9_lk_s1_prodi_kriteria5}}');
        $this->dropTable('{{%k9_lk_s1_prodi_kriteria4}}');
        $this->dropTable('{{%k9_lk_s1_prodi_kriteria3}}');
        $this->dropTable('{{%k9_lk_s1_prodi_kriteria2}}');
        $this->dropTable('{{%k9_lk_s1_prodi_kriteria1}}');
        $this->dropTable('{{%k9_lk_s1_prodi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190723_094232_add_tabel_lk cannot be reverted.\n";

        return false;
    }
    */
}
