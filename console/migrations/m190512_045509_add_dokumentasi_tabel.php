<?php

use yii\db\Migration;

/**
 * Class m190512_045509_add_dokumentasi_tabel
 */
class m190512_045509_add_dokumentasi_tabel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // create tabel dokumentasi s1 prodi dan standar
        $this->createTable('{{%dokumentasi_s1_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'progress'=>$this->float(),
            'is_publik'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%dokumentasi_s1_prodi_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_prodi_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_prodi_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_prodi_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_prodi_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_prodi_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_prodi_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
 
        // create tabel dokumentasi s1 fakultas dan standar
        $this->createTable('{{%dokumentasi_s1_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'progress'=>$this->float(),
            'is_publik'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%dokumentasi_s1_fakultas_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_fakultas_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_fakultas_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_fakultas_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_fakultas_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_fakultas_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_s1_fakultas_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        // create tabel dokumentasi institusi dan standar
        $this->createTable('{{%dokumentasi_institusi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_institusi'=>$this->integer(),
            'progress'=>$this->float(),
            'is_publik'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%dokumentasi_institusi_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_institusi_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_institusi_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_institusi_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_institusi_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_institusi_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%dokumentasi_institusi_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);



        // foreign key tabel dokumentasi s1 prodi
        $this->addForeignKey('fk-dok_s1_prodi-akreditasi_prodi_s1','{{%dokumentasi_s1_prodi}}','id_akreditasi_prodi_s1', '{{%akreditasi_prodi_s1}}','id');

        // foreign key tabel dokumen s1 prodi standar 
        $this->addForeignKey('fk-dok_s1_prodi_standar1-dok_s1_prodi', '{{%dokumentasi_s1_prodi_standar1}}', 'id_dokumentasi_s1_prodi', '{{%dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar2-dok_s1_prodi', '{{%dokumentasi_s1_prodi_standar2}}', 'id_dokumentasi_s1_prodi', '{{%dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar3-dok_s1_prodi', '{{%dokumentasi_s1_prodi_standar3}}', 'id_dokumentasi_s1_prodi', '{{%dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar4-dok_s1_prodi', '{{%dokumentasi_s1_prodi_standar4}}', 'id_dokumentasi_s1_prodi', '{{%dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar5-dok_s1_prodi', '{{%dokumentasi_s1_prodi_standar5}}', 'id_dokumentasi_s1_prodi', '{{%dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar6-dok_s1_prodi', '{{%dokumentasi_s1_prodi_standar6}}', 'id_dokumentasi_s1_prodi', '{{%dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar7-dok_s1_prodi', '{{%dokumentasi_s1_prodi_standar7}}', 'id_dokumentasi_s1_prodi', '{{%dokumentasi_s1_prodi}}', 'id');

        // foreign key tabel user created updated s1 prodi standar
        $this->addForeignKey('fk-dok_s1_prodi_standar1-usr_crt', '{{%dokumentasi_s1_prodi_standar1}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar1-usr_upd', '{{%dokumentasi_s1_prodi_standar1}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar2-usr_crt', '{{%dokumentasi_s1_prodi_standar2}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar2-usr_upd', '{{%dokumentasi_s1_prodi_standar2}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar3-usr_crt', '{{%dokumentasi_s1_prodi_standar3}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar3-usr_upd', '{{%dokumentasi_s1_prodi_standar3}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar4-usr_crt', '{{%dokumentasi_s1_prodi_standar4}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar4-usr_upd', '{{%dokumentasi_s1_prodi_standar4}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar5-usr_crt', '{{%dokumentasi_s1_prodi_standar5}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar5-usr_upd', '{{%dokumentasi_s1_prodi_standar5}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar6-usr_crt', '{{%dokumentasi_s1_prodi_standar6}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar6-usr_upd', '{{%dokumentasi_s1_prodi_standar6}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar7-usr_crt', '{{%dokumentasi_s1_prodi_standar7}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar7-usr_upd', '{{%dokumentasi_s1_prodi_standar7}}', 'updated_by', '{{%user}}', 'id');

        // foreign key tabel dokumentasi s1 fakultas
        $this->addForeignKey('fk-dok_s1_fakultas-akreditasi_prodi_s1','{{%dokumentasi_s1_fakultas}}','id_akreditasi_prodi_s1', '{{%akreditasi_prodi_s1}}','id');

        // foreign key tabel dokumen s1 fakultas standar
        $this->addForeignKey('fk-dok_s1_fakultas_standar1-dok_s1_fakultas', '{{%dokumentasi_s1_fakultas_standar1}}', 'id_dokumentasi_s1_fakultas', '{{%dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar2-dok_s1_fakultas', '{{%dokumentasi_s1_fakultas_standar2}}', 'id_dokumentasi_s1_fakultas', '{{%dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar3-dok_s1_fakultas', '{{%dokumentasi_s1_fakultas_standar3}}', 'id_dokumentasi_s1_fakultas', '{{%dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar4-dok_s1_fakultas', '{{%dokumentasi_s1_fakultas_standar4}}', 'id_dokumentasi_s1_fakultas', '{{%dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar5-dok_s1_fakultas', '{{%dokumentasi_s1_fakultas_standar5}}', 'id_dokumentasi_s1_fakultas', '{{%dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar6-dok_s1_fakultas', '{{%dokumentasi_s1_fakultas_standar6}}', 'id_dokumentasi_s1_fakultas', '{{%dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar7-dok_s1_fakultas', '{{%dokumentasi_s1_fakultas_standar7}}', 'id_dokumentasi_s1_fakultas', '{{%dokumentasi_s1_fakultas}}', 'id');

        // foreign key tabel user created updated s1 fakultas standar
        $this->addForeignKey('fk-dok_s1_fakultas_standar1-usr_crt', '{{%dokumentasi_s1_fakultas_standar1}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar1-usr_upd', '{{%dokumentasi_s1_fakultas_standar1}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar2-usr_crt', '{{%dokumentasi_s1_fakultas_standar2}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar2-usr_upd', '{{%dokumentasi_s1_fakultas_standar2}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar3-usr_crt', '{{%dokumentasi_s1_fakultas_standar3}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar3-usr_upd', '{{%dokumentasi_s1_fakultas_standar3}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar4-usr_crt', '{{%dokumentasi_s1_fakultas_standar4}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar4-usr_upd', '{{%dokumentasi_s1_fakultas_standar4}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar5-usr_crt', '{{%dokumentasi_s1_fakultas_standar5}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar5-usr_upd', '{{%dokumentasi_s1_fakultas_standar5}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar6-usr_crt', '{{%dokumentasi_s1_fakultas_standar6}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar6-usr_upd', '{{%dokumentasi_s1_fakultas_standar6}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar7-usr_crt', '{{%dokumentasi_s1_fakultas_standar7}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar7-usr_upd', '{{%dokumentasi_s1_fakultas_standar7}}', 'updated_by', '{{%user}}', 'id');

        // foreign key tabel dokumentasi institusi
        $this->addForeignKey('fk-dok_institusi-akreditasi_institusi','{{%dokumentasi_institusi}}','id_akreditasi_institusi', '{{%akreditasi_institusi}}','id');

        // foreign key tabel dokumentasi institusi standar
        $this->addForeignKey('fk-dok_institusi_standar1-dok_institusi', '{{%dokumentasi_institusi_standar1}}', 'id_dokumentasi_institusi', '{{%dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar2-dok_institusi', '{{%dokumentasi_institusi_standar2}}', 'id_dokumentasi_institusi', '{{%dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar3-dok_institusi', '{{%dokumentasi_institusi_standar3}}', 'id_dokumentasi_institusi', '{{%dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar4-dok_institusi', '{{%dokumentasi_institusi_standar4}}', 'id_dokumentasi_institusi', '{{%dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar5-dok_institusi', '{{%dokumentasi_institusi_standar5}}', 'id_dokumentasi_institusi', '{{%dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar6-dok_institusi', '{{%dokumentasi_institusi_standar6}}', 'id_dokumentasi_institusi', '{{%dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar7-dok_institusi', '{{%dokumentasi_institusi_standar7}}', 'id_dokumentasi_institusi', '{{%dokumentasi_institusi}}', 'id');

        // foreign key tabel user created updated institusi standar
        $this->addForeignKey('fk-dok_institusi_standar1-usr_crt', '{{%dokumentasi_institusi_standar1}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar1-usr_upd', '{{%dokumentasi_institusi_standar1}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar2-usr_crt', '{{%dokumentasi_institusi_standar2}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar2-usr_upd', '{{%dokumentasi_institusi_standar2}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar3-usr_crt', '{{%dokumentasi_institusi_standar3}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar3-usr_upd', '{{%dokumentasi_institusi_standar3}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar4-usr_crt', '{{%dokumentasi_institusi_standar4}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar4-usr_upd', '{{%dokumentasi_institusi_standar4}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar5-usr_crt', '{{%dokumentasi_institusi_standar5}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar5-usr_upd', '{{%dokumentasi_institusi_standar5}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar6-usr_crt', '{{%dokumentasi_institusi_standar6}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar6-usr_upd', '{{%dokumentasi_institusi_standar6}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar7-usr_crt', '{{%dokumentasi_institusi_standar7}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar7-usr_upd', '{{%dokumentasi_institusi_standar7}}', 'updated_by', '{{%user}}', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // institusi
        $this->dropForeignKey('fk-dok_institusi_standar7-usr_upd','{{%dokumentasi_institusi_standar7}}');
        $this->dropForeignKey('fk-dok_institusi_standar7-usr_crt','{{%dokumentasi_institusi_standar7}}');

        $this->dropForeignKey('fk-dok_institusi_standar6-usr_upd','{{%dokumentasi_institusi_standar6}}');
        $this->dropForeignKey('fk-dok_institusi_standar6-usr_crt','{{%dokumentasi_institusi_standar6}}');

        $this->dropForeignKey('fk-dok_institusi_standar5-usr_upd','{{%dokumentasi_institusi_standar5}}');
        $this->dropForeignKey('fk-dok_institusi_standar5-usr_crt','{{%dokumentasi_institusi_standar5}}');

        $this->dropForeignKey('fk-dok_institusi_standar4-usr_upd','{{%dokumentasi_institusi_standar4}}');
        $this->dropForeignKey('fk-dok_institusi_standar4-usr_crt','{{%dokumentasi_institusi_standar4}}');

        $this->dropForeignKey('fk-dok_institusi_standar3-usr_upd','{{%dokumentasi_institusi_standar3}}');
        $this->dropForeignKey('fk-dok_institusi_standar3-usr_crt','{{%dokumentasi_institusi_standar3}}');

        $this->dropForeignKey('fk-dok_institusi_standar2-usr_upd','{{%dokumentasi_institusi_standar2}}');
        $this->dropForeignKey('fk-dok_institusi_standar2-usr_crt','{{%dokumentasi_institusi_standar2}}');

        $this->dropForeignKey('fk-dok_institusi_standar1-usr_upd','{{%dokumentasi_institusi_standar1}}');
        $this->dropForeignKey('fk-dok_institusi_standar1-usr_crt','{{%dokumentasi_institusi_standar1}}');

        $this->dropForeignKey('fk-dok_institusi_standar7-dok_institusi','{{%dokumentasi_institusi_standar7}}');
        $this->dropForeignKey('fk-dok_institusi_standar6-dok_institusi','{{%dokumentasi_institusi_standar6}}');
        $this->dropForeignKey('fk-dok_institusi_standar5-dok_institusi','{{%dokumentasi_institusi_standar5}}');
        $this->dropForeignKey('fk-dok_institusi_standar4-dok_institusi','{{%dokumentasi_institusi_standar4}}');
        $this->dropForeignKey('fk-dok_institusi_standar3-dok_institusi','{{%dokumentasi_institusi_standar3}}');
        $this->dropForeignKey('fk-dok_institusi_standar2-dok_institusi','{{%dokumentasi_institusi_standar2}}');
        $this->dropForeignKey('fk-dok_institusi_standar1-dok_institusi','{{%dokumentasi_institusi_standar1}}');

        $this->dropForeignKey('fk-dok_institusi-akreditasi_institusi','{{%dokumentasi_institusi}}');


        // fakultas
        $this->dropForeignKey('fk-dok_s1_fakultas_standar7-usr_upd','{{%dokumentasi_s1_fakultas_standar7}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar7-usr_crt','{{%dokumentasi_s1_fakultas_standar7}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar6-usr_upd','{{%dokumentasi_s1_fakultas_standar6}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar6-usr_crt','{{%dokumentasi_s1_fakultas_standar6}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar5-usr_upd','{{%dokumentasi_s1_fakultas_standar5}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar5-usr_crt','{{%dokumentasi_s1_fakultas_standar5}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar4-usr_upd','{{%dokumentasi_s1_fakultas_standar4}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar4-usr_crt','{{%dokumentasi_s1_fakultas_standar4}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar3-usr_upd','{{%dokumentasi_s1_fakultas_standar3}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar3-usr_crt','{{%dokumentasi_s1_fakultas_standar3}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar2-usr_upd','{{%dokumentasi_s1_fakultas_standar2}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar2-usr_crt','{{%dokumentasi_s1_fakultas_standar2}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar1-usr_upd','{{%dokumentasi_s1_fakultas_standar1}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar1-usr_crt','{{%dokumentasi_s1_fakultas_standar1}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar7-dok_s1_fakultas','{{%dokumentasi_s1_fakultas_standar7}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar6-dok_s1_fakultas','{{%dokumentasi_s1_fakultas_standar6}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar5-dok_s1_fakultas','{{%dokumentasi_s1_fakultas_standar5}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar4-dok_s1_fakultas','{{%dokumentasi_s1_fakultas_standar4}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar3-dok_s1_fakultas','{{%dokumentasi_s1_fakultas_standar3}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar2-dok_s1_fakultas','{{%dokumentasi_s1_fakultas_standar2}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar1-dok_s1_fakultas','{{%dokumentasi_s1_fakultas_standar1}}');

        $this->dropForeignKey('fk-dok_s1_fakultas-akreditasi_prodi_s1','{{%dokumentasi_s1_fakultas}}');
        
        // prodi
        $this->dropForeignKey('fk-dok_s1_prodi_standar7-usr_upd','{{%dokumentasi_s1_prodi_standar7}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar7-usr_crt','{{%dokumentasi_s1_prodi_standar7}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar6-usr_upd','{{%dokumentasi_s1_prodi_standar6}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar6-usr_crt','{{%dokumentasi_s1_prodi_standar6}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar5-usr_upd','{{%dokumentasi_s1_prodi_standar5}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar5-usr_crt','{{%dokumentasi_s1_prodi_standar5}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar4-usr_upd','{{%dokumentasi_s1_prodi_standar4}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar4-usr_crt','{{%dokumentasi_s1_prodi_standar4}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar3-usr_upd','{{%dokumentasi_s1_prodi_standar3}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar3-usr_crt','{{%dokumentasi_s1_prodi_standar3}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar2-usr_upd','{{%dokumentasi_s1_prodi_standar2}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar2-usr_crt','{{%dokumentasi_s1_prodi_standar2}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar1-usr_upd','{{%dokumentasi_s1_prodi_standar1}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar1-usr_crt','{{%dokumentasi_s1_prodi_standar1}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar7-dok_s1_prodi','{{%dokumentasi_s1_prodi_standar7}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar6-dok_s1_prodi','{{%dokumentasi_s1_prodi_standar6}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar5-dok_s1_prodi','{{%dokumentasi_s1_prodi_standar5}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar4-dok_s1_prodi','{{%dokumentasi_s1_prodi_standar4}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar3-dok_s1_prodi','{{%dokumentasi_s1_prodi_standar3}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar2-dok_s1_prodi','{{%dokumentasi_s1_prodi_standar2}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar1-dok_s1_prodi','{{%dokumentasi_s1_prodi_standar1}}');

        $this->dropForeignKey('fk-dok_s1_prodi-akreditasi_prodi_s1','{{%dokumentasi_s1_prodi}}');

        $this->dropTable('{{%dokumentasi_institusi_standar7}}');
        $this->dropTable('{{%dokumentasi_institusi_standar6}}');
        $this->dropTable('{{%dokumentasi_institusi_standar5}}');
        $this->dropTable('{{%dokumentasi_institusi_standar4}}');
        $this->dropTable('{{%dokumentasi_institusi_standar3}}');
        $this->dropTable('{{%dokumentasi_institusi_standar2}}');
        $this->dropTable('{{%dokumentasi_institusi_standar1}}');

        $this->dropTable('{{%dokumentasi_institusi}}');

        $this->dropTable('{{%dokumentasi_s1_fakultas_standar7}}');
        $this->dropTable('{{%dokumentasi_s1_fakultas_standar6}}');
        $this->dropTable('{{%dokumentasi_s1_fakultas_standar5}}');
        $this->dropTable('{{%dokumentasi_s1_fakultas_standar4}}');
        $this->dropTable('{{%dokumentasi_s1_fakultas_standar3}}');
        $this->dropTable('{{%dokumentasi_s1_fakultas_standar2}}');
        $this->dropTable('{{%dokumentasi_s1_fakultas_standar1}}');

        $this->dropTable('{{%dokumentasi_s1_fakultas}}');

        $this->dropTable('{{%dokumentasi_s1_prodi_standar7}}');
        $this->dropTable('{{%dokumentasi_s1_prodi_standar6}}');
        $this->dropTable('{{%dokumentasi_s1_prodi_standar5}}');
        $this->dropTable('{{%dokumentasi_s1_prodi_standar4}}');
        $this->dropTable('{{%dokumentasi_s1_prodi_standar3}}');
        $this->dropTable('{{%dokumentasi_s1_prodi_standar2}}');
        $this->dropTable('{{%dokumentasi_s1_prodi_standar1}}');

        $this->dropTable('{{%dokumentasi_s1_prodi}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190512_045509_add_dokumentasi_tabel cannot be reverted.\n";

        return false;
    }
    */
}
