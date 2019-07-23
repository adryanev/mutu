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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        // create tabel dokumentasi s1 prodi dan standar
        $this->createTable('{{%s7_dokumentasi_s1_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'progress'=>$this->float()->defaultValue(0),
            'is_publik'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);

        $this->createTable('{{%s7_dokumentasi_s1_prodi_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_prodi_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_prodi_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_prodi_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_prodi_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_prodi_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_prodi_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
 
        // create tabel dokumentasi s1 fakultas dan standar
        $this->createTable('{{%s7_dokumentasi_s1_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_fakultas'=>$this->integer(),
            'progress'=>$this->float()->defaultValue(0),
            'is_publik'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);

        $this->createTable('{{%s7_dokumentasi_s1_fakultas_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_fakultas_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_fakultas_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_fakultas_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_fakultas_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_fakultas_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_s1_fakultas_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_s1_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);

        // create tabel dokumentasi institusi dan standar
        $this->createTable('{{%s7_dokumentasi_institusi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_institusi'=>$this->integer(),
            'progress'=>$this->float()->defaultValue(0),
            'is_publik'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);

        $this->createTable('{{%s7_dokumentasi_institusi_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_institusi_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_institusi_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_institusi_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_institusi_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_institusi_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        $this->createTable('{{%s7_dokumentasi_institusi_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_institusi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);



        // foreign key tabel dokumentasi s1 prodi
        $this->addForeignKey('fk-dok_s1_prodi-akreditasi_prodi_s1','{{%s7_dokumentasi_s1_prodi}}','id_akreditasi_prodi_s1', '{{%s7_akreditasi_prodi_s1}}','id');

        // foreign key tabel dokumen s1 prodi standar 
        $this->addForeignKey('fk-dok_s1_prodi_standar1-dok_s1_prodi', '{{%s7_dokumentasi_s1_prodi_standar1}}', 'id_dokumentasi_s1_prodi', '{{%s7_dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar2-dok_s1_prodi', '{{%s7_dokumentasi_s1_prodi_standar2}}', 'id_dokumentasi_s1_prodi', '{{%s7_dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar3-dok_s1_prodi', '{{%s7_dokumentasi_s1_prodi_standar3}}', 'id_dokumentasi_s1_prodi', '{{%s7_dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar4-dok_s1_prodi', '{{%s7_dokumentasi_s1_prodi_standar4}}', 'id_dokumentasi_s1_prodi', '{{%s7_dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar5-dok_s1_prodi', '{{%s7_dokumentasi_s1_prodi_standar5}}', 'id_dokumentasi_s1_prodi', '{{%s7_dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar6-dok_s1_prodi', '{{%s7_dokumentasi_s1_prodi_standar6}}', 'id_dokumentasi_s1_prodi', '{{%s7_dokumentasi_s1_prodi}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar7-dok_s1_prodi', '{{%s7_dokumentasi_s1_prodi_standar7}}', 'id_dokumentasi_s1_prodi', '{{%s7_dokumentasi_s1_prodi}}', 'id');

        // foreign key tabel user created updated s1 prodi standar
        $this->addForeignKey('fk-dok_s1_prodi_standar1-usr_crt', '{{%s7_dokumentasi_s1_prodi_standar1}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar1-usr_upd', '{{%s7_dokumentasi_s1_prodi_standar1}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar2-usr_crt', '{{%s7_dokumentasi_s1_prodi_standar2}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar2-usr_upd', '{{%s7_dokumentasi_s1_prodi_standar2}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar3-usr_crt', '{{%s7_dokumentasi_s1_prodi_standar3}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar3-usr_upd', '{{%s7_dokumentasi_s1_prodi_standar3}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar4-usr_crt', '{{%s7_dokumentasi_s1_prodi_standar4}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar4-usr_upd', '{{%s7_dokumentasi_s1_prodi_standar4}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar5-usr_crt', '{{%s7_dokumentasi_s1_prodi_standar5}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar5-usr_upd', '{{%s7_dokumentasi_s1_prodi_standar5}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar6-usr_crt', '{{%s7_dokumentasi_s1_prodi_standar6}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar6-usr_upd', '{{%s7_dokumentasi_s1_prodi_standar6}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_prodi_standar7-usr_crt', '{{%s7_dokumentasi_s1_prodi_standar7}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_prodi_standar7-usr_upd', '{{%s7_dokumentasi_s1_prodi_standar7}}', 'updated_by', '{{%user}}', 'id');

        // foreign key tabel dokumentasi s1 fakultas
        $this->addForeignKey('fk-dok_s1_fakultas-akreditasi','{{%s7_dokumentasi_s1_fakultas}}','id_akreditasi', '{{%s7_akreditasi}}','id');
        $this->addForeignKey('fk-dok_s1_fakultas-fakultas_akademi','{{%s7_dokumentasi_s1_fakultas}}','id_fakultas', '{{%fakultas_akademi}}','id');

        // foreign key tabel dokumen s1 fakultas standar
        $this->addForeignKey('fk-dok_s1_fakultas_standar1-dok_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas_standar1}}', 'id_dokumentasi_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar2-dok_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas_standar2}}', 'id_dokumentasi_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar3-dok_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas_standar3}}', 'id_dokumentasi_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar4-dok_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas_standar4}}', 'id_dokumentasi_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar5-dok_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas_standar5}}', 'id_dokumentasi_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar6-dok_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas_standar6}}', 'id_dokumentasi_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar7-dok_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas_standar7}}', 'id_dokumentasi_s1_fakultas', '{{%s7_dokumentasi_s1_fakultas}}', 'id');

        // foreign key tabel user created updated s1 fakultas standar
        $this->addForeignKey('fk-dok_s1_fakultas_standar1-usr_crt', '{{%s7_dokumentasi_s1_fakultas_standar1}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar1-usr_upd', '{{%s7_dokumentasi_s1_fakultas_standar1}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar2-usr_crt', '{{%s7_dokumentasi_s1_fakultas_standar2}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar2-usr_upd', '{{%s7_dokumentasi_s1_fakultas_standar2}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar3-usr_crt', '{{%s7_dokumentasi_s1_fakultas_standar3}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar3-usr_upd', '{{%s7_dokumentasi_s1_fakultas_standar3}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar4-usr_crt', '{{%s7_dokumentasi_s1_fakultas_standar4}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar4-usr_upd', '{{%s7_dokumentasi_s1_fakultas_standar4}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar5-usr_crt', '{{%s7_dokumentasi_s1_fakultas_standar5}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar5-usr_upd', '{{%s7_dokumentasi_s1_fakultas_standar5}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar6-usr_crt', '{{%s7_dokumentasi_s1_fakultas_standar6}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar6-usr_upd', '{{%s7_dokumentasi_s1_fakultas_standar6}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_s1_fakultas_standar7-usr_crt', '{{%s7_dokumentasi_s1_fakultas_standar7}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_s1_fakultas_standar7-usr_upd', '{{%s7_dokumentasi_s1_fakultas_standar7}}', 'updated_by', '{{%user}}', 'id');

        // foreign key tabel dokumentasi institusi
        $this->addForeignKey('fk-dok_institusi-akreditasi_institusi','{{%s7_dokumentasi_institusi}}','id_akreditasi_institusi', '{{%s7_akreditasi_institusi}}','id');

        // foreign key tabel dokumentasi institusi standar
        $this->addForeignKey('fk-dok_institusi_standar1-dok_institusi', '{{%s7_dokumentasi_institusi_standar1}}', 'id_dokumentasi_institusi', '{{%s7_dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar2-dok_institusi', '{{%s7_dokumentasi_institusi_standar2}}', 'id_dokumentasi_institusi', '{{%s7_dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar3-dok_institusi', '{{%s7_dokumentasi_institusi_standar3}}', 'id_dokumentasi_institusi', '{{%s7_dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar4-dok_institusi', '{{%s7_dokumentasi_institusi_standar4}}', 'id_dokumentasi_institusi', '{{%s7_dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar5-dok_institusi', '{{%s7_dokumentasi_institusi_standar5}}', 'id_dokumentasi_institusi', '{{%s7_dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar6-dok_institusi', '{{%s7_dokumentasi_institusi_standar6}}', 'id_dokumentasi_institusi', '{{%s7_dokumentasi_institusi}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar7-dok_institusi', '{{%s7_dokumentasi_institusi_standar7}}', 'id_dokumentasi_institusi', '{{%s7_dokumentasi_institusi}}', 'id');

        // foreign key tabel user created updated institusi standar
        $this->addForeignKey('fk-dok_institusi_standar1-usr_crt', '{{%s7_dokumentasi_institusi_standar1}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar1-usr_upd', '{{%s7_dokumentasi_institusi_standar1}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar2-usr_crt', '{{%s7_dokumentasi_institusi_standar2}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar2-usr_upd', '{{%s7_dokumentasi_institusi_standar2}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar3-usr_crt', '{{%s7_dokumentasi_institusi_standar3}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar3-usr_upd', '{{%s7_dokumentasi_institusi_standar3}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar4-usr_crt', '{{%s7_dokumentasi_institusi_standar4}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar4-usr_upd', '{{%s7_dokumentasi_institusi_standar4}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar5-usr_crt', '{{%s7_dokumentasi_institusi_standar5}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar5-usr_upd', '{{%s7_dokumentasi_institusi_standar5}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar6-usr_crt', '{{%s7_dokumentasi_institusi_standar6}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar6-usr_upd', '{{%s7_dokumentasi_institusi_standar6}}', 'updated_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar7-usr_crt', '{{%s7_dokumentasi_institusi_standar7}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_institusi_standar7-usr_upd', '{{%s7_dokumentasi_institusi_standar7}}', 'updated_by', '{{%user}}', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // institusi
        $this->dropForeignKey('fk-dok_institusi_standar7-usr_upd','{{%s7_dokumentasi_institusi_standar7}}');
        $this->dropForeignKey('fk-dok_institusi_standar7-usr_crt','{{%s7_dokumentasi_institusi_standar7}}');

        $this->dropForeignKey('fk-dok_institusi_standar6-usr_upd','{{%s7_dokumentasi_institusi_standar6}}');
        $this->dropForeignKey('fk-dok_institusi_standar6-usr_crt','{{%s7_dokumentasi_institusi_standar6}}');

        $this->dropForeignKey('fk-dok_institusi_standar5-usr_upd','{{%s7_dokumentasi_institusi_standar5}}');
        $this->dropForeignKey('fk-dok_institusi_standar5-usr_crt','{{%s7_dokumentasi_institusi_standar5}}');

        $this->dropForeignKey('fk-dok_institusi_standar4-usr_upd','{{%s7_dokumentasi_institusi_standar4}}');
        $this->dropForeignKey('fk-dok_institusi_standar4-usr_crt','{{%s7_dokumentasi_institusi_standar4}}');

        $this->dropForeignKey('fk-dok_institusi_standar3-usr_upd','{{%s7_dokumentasi_institusi_standar3}}');
        $this->dropForeignKey('fk-dok_institusi_standar3-usr_crt','{{%s7_dokumentasi_institusi_standar3}}');

        $this->dropForeignKey('fk-dok_institusi_standar2-usr_upd','{{%s7_dokumentasi_institusi_standar2}}');
        $this->dropForeignKey('fk-dok_institusi_standar2-usr_crt','{{%s7_dokumentasi_institusi_standar2}}');

        $this->dropForeignKey('fk-dok_institusi_standar1-usr_upd','{{%s7_dokumentasi_institusi_standar1}}');
        $this->dropForeignKey('fk-dok_institusi_standar1-usr_crt','{{%s7_dokumentasi_institusi_standar1}}');

        $this->dropForeignKey('fk-dok_institusi_standar7-dok_institusi','{{%s7_dokumentasi_institusi_standar7}}');
        $this->dropForeignKey('fk-dok_institusi_standar6-dok_institusi','{{%s7_dokumentasi_institusi_standar6}}');
        $this->dropForeignKey('fk-dok_institusi_standar5-dok_institusi','{{%s7_dokumentasi_institusi_standar5}}');
        $this->dropForeignKey('fk-dok_institusi_standar4-dok_institusi','{{%s7_dokumentasi_institusi_standar4}}');
        $this->dropForeignKey('fk-dok_institusi_standar3-dok_institusi','{{%s7_dokumentasi_institusi_standar3}}');
        $this->dropForeignKey('fk-dok_institusi_standar2-dok_institusi','{{%s7_dokumentasi_institusi_standar2}}');
        $this->dropForeignKey('fk-dok_institusi_standar1-dok_institusi','{{%s7_dokumentasi_institusi_standar1}}');

        $this->dropForeignKey('fk-dok_institusi-akreditasi_institusi','{{%s7_dokumentasi_institusi}}');


        // fakultas
        $this->dropForeignKey('fk-dok_s1_fakultas_standar7-usr_upd','{{%s7_dokumentasi_s1_fakultas_standar7}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar7-usr_crt','{{%s7_dokumentasi_s1_fakultas_standar7}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar6-usr_upd','{{%s7_dokumentasi_s1_fakultas_standar6}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar6-usr_crt','{{%s7_dokumentasi_s1_fakultas_standar6}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar5-usr_upd','{{%s7_dokumentasi_s1_fakultas_standar5}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar5-usr_crt','{{%s7_dokumentasi_s1_fakultas_standar5}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar4-usr_upd','{{%s7_dokumentasi_s1_fakultas_standar4}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar4-usr_crt','{{%s7_dokumentasi_s1_fakultas_standar4}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar3-usr_upd','{{%s7_dokumentasi_s1_fakultas_standar3}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar3-usr_crt','{{%s7_dokumentasi_s1_fakultas_standar3}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar2-usr_upd','{{%s7_dokumentasi_s1_fakultas_standar2}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar2-usr_crt','{{%s7_dokumentasi_s1_fakultas_standar2}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar1-usr_upd','{{%s7_dokumentasi_s1_fakultas_standar1}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar1-usr_crt','{{%s7_dokumentasi_s1_fakultas_standar1}}');

        $this->dropForeignKey('fk-dok_s1_fakultas_standar7-dok_s1_fakultas','{{%s7_dokumentasi_s1_fakultas_standar7}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar6-dok_s1_fakultas','{{%s7_dokumentasi_s1_fakultas_standar6}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar5-dok_s1_fakultas','{{%s7_dokumentasi_s1_fakultas_standar5}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar4-dok_s1_fakultas','{{%s7_dokumentasi_s1_fakultas_standar4}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar3-dok_s1_fakultas','{{%s7_dokumentasi_s1_fakultas_standar3}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar2-dok_s1_fakultas','{{%s7_dokumentasi_s1_fakultas_standar2}}');
        $this->dropForeignKey('fk-dok_s1_fakultas_standar1-dok_s1_fakultas','{{%s7_dokumentasi_s1_fakultas_standar1}}');

        $this->dropForeignKey('fk-dok_s1_fakultas-akreditasi_prodi_s1','{{%s7_dokumentasi_s1_fakultas}}');
        
        // prodi
        $this->dropForeignKey('fk-dok_s1_prodi_standar7-usr_upd','{{%s7_dokumentasi_s1_prodi_standar7}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar7-usr_crt','{{%s7_dokumentasi_s1_prodi_standar7}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar6-usr_upd','{{%s7_dokumentasi_s1_prodi_standar6}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar6-usr_crt','{{%s7_dokumentasi_s1_prodi_standar6}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar5-usr_upd','{{%s7_dokumentasi_s1_prodi_standar5}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar5-usr_crt','{{%s7_dokumentasi_s1_prodi_standar5}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar4-usr_upd','{{%s7_dokumentasi_s1_prodi_standar4}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar4-usr_crt','{{%s7_dokumentasi_s1_prodi_standar4}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar3-usr_upd','{{%s7_dokumentasi_s1_prodi_standar3}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar3-usr_crt','{{%s7_dokumentasi_s1_prodi_standar3}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar2-usr_upd','{{%s7_dokumentasi_s1_prodi_standar2}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar2-usr_crt','{{%s7_dokumentasi_s1_prodi_standar2}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar1-usr_upd','{{%s7_dokumentasi_s1_prodi_standar1}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar1-usr_crt','{{%s7_dokumentasi_s1_prodi_standar1}}');

        $this->dropForeignKey('fk-dok_s1_prodi_standar7-dok_s1_prodi','{{%s7_dokumentasi_s1_prodi_standar7}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar6-dok_s1_prodi','{{%s7_dokumentasi_s1_prodi_standar6}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar5-dok_s1_prodi','{{%s7_dokumentasi_s1_prodi_standar5}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar4-dok_s1_prodi','{{%s7_dokumentasi_s1_prodi_standar4}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar3-dok_s1_prodi','{{%s7_dokumentasi_s1_prodi_standar3}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar2-dok_s1_prodi','{{%s7_dokumentasi_s1_prodi_standar2}}');
        $this->dropForeignKey('fk-dok_s1_prodi_standar1-dok_s1_prodi','{{%s7_dokumentasi_s1_prodi_standar1}}');

        $this->dropForeignKey('fk-dok_s1_prodi-akreditasi_prodi_s1','{{%s7_dokumentasi_s1_prodi}}');

        $this->dropTable('{{%s7_dokumentasi_institusi_standar7}}');
        $this->dropTable('{{%s7_dokumentasi_institusi_standar6}}');
        $this->dropTable('{{%s7_dokumentasi_institusi_standar5}}');
        $this->dropTable('{{%s7_dokumentasi_institusi_standar4}}');
        $this->dropTable('{{%s7_dokumentasi_institusi_standar3}}');
        $this->dropTable('{{%s7_dokumentasi_institusi_standar2}}');
        $this->dropTable('{{%s7_dokumentasi_institusi_standar1}}');

        $this->dropTable('{{%s7_dokumentasi_institusi}}');

        $this->dropTable('{{%s7_dokumentasi_s1_fakultas_standar7}}');
        $this->dropTable('{{%s7_dokumentasi_s1_fakultas_standar6}}');
        $this->dropTable('{{%s7_dokumentasi_s1_fakultas_standar5}}');
        $this->dropTable('{{%s7_dokumentasi_s1_fakultas_standar4}}');
        $this->dropTable('{{%s7_dokumentasi_s1_fakultas_standar3}}');
        $this->dropTable('{{%s7_dokumentasi_s1_fakultas_standar2}}');
        $this->dropTable('{{%s7_dokumentasi_s1_fakultas_standar1}}');

        $this->dropTable('{{%s7_dokumentasi_s1_fakultas}}');

        $this->dropTable('{{%s7_dokumentasi_s1_prodi_standar7}}');
        $this->dropTable('{{%s7_dokumentasi_s1_prodi_standar6}}');
        $this->dropTable('{{%s7_dokumentasi_s1_prodi_standar5}}');
        $this->dropTable('{{%s7_dokumentasi_s1_prodi_standar4}}');
        $this->dropTable('{{%s7_dokumentasi_s1_prodi_standar3}}');
        $this->dropTable('{{%s7_dokumentasi_s1_prodi_standar2}}');
        $this->dropTable('{{%s7_dokumentasi_s1_prodi_standar1}}');

        $this->dropTable('{{%s7_dokumentasi_s1_prodi}}');

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
