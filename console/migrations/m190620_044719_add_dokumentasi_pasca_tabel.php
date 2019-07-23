<?php

use yii\db\Migration;

/**
 * Class m190620_044719_add_dokumentasi_pasca_tabel
 */
class m190620_044719_add_dokumentasi_pasca_tabel extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // create tabel dokumentasi s1 prodi dan standar
        $this->createTable('{{%s7_dokumentasi_pasca_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_pasca'=>$this->integer(),
            'progress'=>$this->float()->defaultValue(0),
            'is_publik'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%s7_dokumentasi_pasca_prodi_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_prodi_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_prodi_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_prodi_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_prodi_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_prodi_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_prodi_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_prodi'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);




        // foreign key tabel dokumentasi s1 prodi
        $this->addForeignKey('fk-dok_pasca_prodi-akreditasi_prodi_pasca','{{%s7_dokumentasi_pasca_prodi}}','id_akreditasi_prodi_pasca', '{{%s7_akreditasi_prodi_pasca}}','id');

        // foreign key tabel dokumen s1 prodi standar
        $this->addForeignKey('fk-dok_pasca_prodi_standar1-dok_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi_standar1}}', 'id_dokumentasi_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar2-dok_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi_standar2}}', 'id_dokumentasi_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar3-dok_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi_standar3}}', 'id_dokumentasi_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar4-dok_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi_standar4}}', 'id_dokumentasi_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar5-dok_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi_standar5}}', 'id_dokumentasi_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar6-dok_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi_standar6}}', 'id_dokumentasi_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar7-dok_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi_standar7}}', 'id_dokumentasi_pasca_prodi', '{{%s7_dokumentasi_pasca_prodi}}', 'id');

        // foreign key tabel user created updated s1 prodi standar
        $this->addForeignKey('fk-dok_pasca_prodi_standar1-usr_crt', '{{%s7_dokumentasi_pasca_prodi_standar1}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_prodi_standar1-usr_upd', '{{%s7_dokumentasi_pasca_prodi_standar1}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar2-usr_crt', '{{%s7_dokumentasi_pasca_prodi_standar2}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_prodi_standar2-usr_upd', '{{%s7_dokumentasi_pasca_prodi_standar2}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar3-usr_crt', '{{%s7_dokumentasi_pasca_prodi_standar3}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_prodi_standar3-usr_upd', '{{%s7_dokumentasi_pasca_prodi_standar3}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar4-usr_crt', '{{%s7_dokumentasi_pasca_prodi_standar4}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_prodi_standar4-usr_upd', '{{%s7_dokumentasi_pasca_prodi_standar4}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar5-usr_crt', '{{%s7_dokumentasi_pasca_prodi_standar5}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_prodi_standar5-usr_upd', '{{%s7_dokumentasi_pasca_prodi_standar5}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar6-usr_crt', '{{%s7_dokumentasi_pasca_prodi_standar6}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_prodi_standar6-usr_upd', '{{%s7_dokumentasi_pasca_prodi_standar6}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_prodi_standar7-usr_crt', '{{%s7_dokumentasi_pasca_prodi_standar7}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_prodi_standar7-usr_upd', '{{%s7_dokumentasi_pasca_prodi_standar7}}', 'updated_by', '{{%user}}', 'id');

// create tabel dokumentasi pasca fakultas dan standar
        $this->createTable('{{%s7_dokumentasi_pasca_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_fakultas'=>$this->integer(),
            'progress'=>$this->float()->defaultValue(0),
            'is_publik'=>$this->boolean(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%s7_dokumentasi_pasca_fakultas_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_fakultas_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_fakultas_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_fakultas_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_fakultas_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_fakultas_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%s7_dokumentasi_pasca_fakultas_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_dokumentasi_pasca_fakultas'=>$this->integer(),
            'kode'=>$this->string(),
            'dokumen'=>$this->string(),
            'is_publik'=>$this->boolean(),
            'is_asesor'=>$this->boolean(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);




        // foreign key tabel dokumentasi s1 prodi
        $this->addForeignKey('fk-dok_pasca_fakultas-akreditasi_prodi_pasca','{{%s7_dokumentasi_pasca_fakultas}}','id_akreditasi', '{{%s7_akreditasi}}','id');
        $this->addForeignKey('fk-dok_pasca_fakultas-fakultas_akademi','{{%s7_dokumentasi_pasca_fakultas}}','id_fakultas', '{{%fakultas_akademi}}','id');

        // foreign key tabel dokumen s1 prodi standar
        $this->addForeignKey('fk-dok_pasca_standar1_fakultas-dok_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas_standar1}}', 'id_dokumentasi_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar2_fakultas-dok_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas_standar2}}', 'id_dokumentasi_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar3_fakultas-dok_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas_standar3}}', 'id_dokumentasi_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar4_fakultas-dok_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas_standar4}}', 'id_dokumentasi_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar5_fakultas-dok_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas_standar5}}', 'id_dokumentasi_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar6_fakultas-dok_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas_standar6}}', 'id_dokumentasi_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar7_fakultas-dok_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas_standar7}}', 'id_dokumentasi_pasca_fakultas', '{{%s7_dokumentasi_pasca_fakultas}}', 'id');

        // foreign key tabel user created updated s1 prodi standar
        $this->addForeignKey('fk-dok_pasca_standar1_fakultas-usr_crt', '{{%s7_dokumentasi_pasca_fakultas_standar1}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_standar1_fakultas-usr_upd', '{{%s7_dokumentasi_pasca_fakultas_standar1}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar2_fakultas-usr_crt', '{{%s7_dokumentasi_pasca_fakultas_standar2}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_standar2_fakultas-usr_upd', '{{%s7_dokumentasi_pasca_fakultas_standar2}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar3_fakultas-usr_crt', '{{%s7_dokumentasi_pasca_fakultas_standar3}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_standar3_fakultas-usr_upd', '{{%s7_dokumentasi_pasca_fakultas_standar3}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar4_fakultas-usr_crt', '{{%s7_dokumentasi_pasca_fakultas_standar4}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_standar4_fakultas-usr_upd', '{{%s7_dokumentasi_pasca_fakultas_standar4}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar5_fakultas-usr_crt', '{{%s7_dokumentasi_pasca_fakultas_standar5}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_standar5_fakultas-usr_upd', '{{%s7_dokumentasi_pasca_fakultas_standar5}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar6_fakultas-usr_crt', '{{%s7_dokumentasi_pasca_fakultas_standar6}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_standar6_fakultas-usr_upd', '{{%s7_dokumentasi_pasca_fakultas_standar6}}', 'updated_by', '{{%user}}', 'id');

        $this->addForeignKey('fk-dok_pasca_standar7_fakultas-usr_crt', '{{%s7_dokumentasi_pasca_fakultas_standar7}}', 'created_by', '{{%user}}', 'id');
        $this->addForeignKey('fk-dok_pasca_standar7_fakultas-usr_upd', '{{%s7_dokumentasi_pasca_fakultas_standar7}}', 'updated_by', '{{%user}}', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
// fakultas
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar7-usr_upd','{{%s7_dokumentasi_pasca_fakultas_standar7}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar7-usr_crt','{{%s7_dokumentasi_pasca_fakultas_standar7}}');

        $this->dropForeignKey('fk-dok_pasca_fakultas_standar6-usr_upd','{{%s7_dokumentasi_pasca_fakultas_standar6}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar6-usr_crt','{{%s7_dokumentasi_pasca_fakultas_standar6}}');

        $this->dropForeignKey('fk-dok_pasca_fakultas_standar5-usr_upd','{{%s7_dokumentasi_pasca_fakultas_standar5}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar5-usr_crt','{{%s7_dokumentasi_pasca_fakultas_standar5}}');

        $this->dropForeignKey('fk-dok_pasca_fakultas_standar4-usr_upd','{{%s7_dokumentasi_pasca_fakultas_standar4}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar4-usr_crt','{{%s7_dokumentasi_pasca_fakultas_standar4}}');

        $this->dropForeignKey('fk-dok_pasca_fakultas_standar3-usr_upd','{{%s7_dokumentasi_pasca_fakultas_standar3}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar3-usr_crt','{{%s7_dokumentasi_pasca_fakultas_standar3}}');

        $this->dropForeignKey('fk-dok_pasca_fakultas_standar2-usr_upd','{{%s7_dokumentasi_pasca_fakultas_standar2}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar2-usr_crt','{{%s7_dokumentasi_pasca_fakultas_standar2}}');

        $this->dropForeignKey('fk-dok_pasca_fakultas_standar1-usr_upd','{{%s7_dokumentasi_pasca_fakultas_standar1}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar1-usr_crt','{{%s7_dokumentasi_pasca_fakultas_standar1}}');

        $this->dropForeignKey('fk-dok_pasca_fakultas_standar7-dok_pasca_fakultas','{{%s7_dokumentasi_pasca_fakultas_standar7}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar6-dok_pasca_fakultas','{{%s7_dokumentasi_pasca_fakultas_standar6}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar5-dok_pasca_fakultas','{{%s7_dokumentasi_pasca_fakultas_standar5}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar4-dok_pasca_fakultas','{{%s7_dokumentasi_pasca_fakultas_standar4}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar3-dok_pasca_fakultas','{{%s7_dokumentasi_pasca_fakultas_standar3}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar2-dok_pasca_fakultas','{{%s7_dokumentasi_pasca_fakultas_standar2}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas_standar1-dok_pasca_fakultas','{{%s7_dokumentasi_pasca_fakultas_standar1}}');

        $this->dropForeignKey('fk-dok_pasca_fakultas-fakultas_akademi','{{%s7_dokumentasi_pasca_fakultas}}');
        $this->dropForeignKey('fk-dok_pasca_fakultas-akreditasi_prodi_pasca','{{%s7_dokumentasi_pasca_fakultas}}');


        $this->dropTable('{{%s7_dokumentasi_pasca_fakultas_standar7}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_fakultas_standar6}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_fakultas_standar5}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_fakultas_standar4}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_fakultas_standar3}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_fakultas_standar2}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_fakultas_standar1}}');

        $this->dropTable('{{%s7_dokumentasi_pasca_fakultas}}');

        // prodi
        $this->dropForeignKey('fk-dok_pasca_prodi_standar7-usr_upd','{{%s7_dokumentasi_pasca_prodi_standar7}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar7-usr_crt','{{%s7_dokumentasi_pasca_prodi_standar7}}');

        $this->dropForeignKey('fk-dok_pasca_prodi_standar6-usr_upd','{{%s7_dokumentasi_pasca_prodi_standar6}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar6-usr_crt','{{%s7_dokumentasi_pasca_prodi_standar6}}');

        $this->dropForeignKey('fk-dok_pasca_prodi_standar5-usr_upd','{{%s7_dokumentasi_pasca_prodi_standar5}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar5-usr_crt','{{%s7_dokumentasi_pasca_prodi_standar5}}');

        $this->dropForeignKey('fk-dok_pasca_prodi_standar4-usr_upd','{{%s7_dokumentasi_pasca_prodi_standar4}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar4-usr_crt','{{%s7_dokumentasi_pasca_prodi_standar4}}');

        $this->dropForeignKey('fk-dok_pasca_prodi_standar3-usr_upd','{{%s7_dokumentasi_pasca_prodi_standar3}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar3-usr_crt','{{%s7_dokumentasi_pasca_prodi_standar3}}');

        $this->dropForeignKey('fk-dok_pasca_prodi_standar2-usr_upd','{{%s7_dokumentasi_pasca_prodi_standar2}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar2-usr_crt','{{%s7_dokumentasi_pasca_prodi_standar2}}');

        $this->dropForeignKey('fk-dok_pasca_prodi_standar1-usr_upd','{{%s7_dokumentasi_pasca_prodi_standar1}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar1-usr_crt','{{%s7_dokumentasi_pasca_prodi_standar1}}');

        $this->dropForeignKey('fk-dok_pasca_prodi_standar7-dok_pasca_prodi','{{%s7_dokumentasi_pasca_prodi_standar7}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar6-dok_pasca_prodi','{{%s7_dokumentasi_pasca_prodi_standar6}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar5-dok_pasca_prodi','{{%s7_dokumentasi_pasca_prodi_standar5}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar4-dok_pasca_prodi','{{%s7_dokumentasi_pasca_prodi_standar4}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar3-dok_pasca_prodi','{{%s7_dokumentasi_pasca_prodi_standar3}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar2-dok_pasca_prodi','{{%s7_dokumentasi_pasca_prodi_standar2}}');
        $this->dropForeignKey('fk-dok_pasca_prodi_standar1-dok_pasca_prodi','{{%s7_dokumentasi_pasca_prodi_standar1}}');

        $this->dropForeignKey('fk-dok_pasca_prodi-akreditasi_prodi_pasca','{{%s7_dokumentasi_pasca_prodi}}');


        $this->dropTable('{{%s7_dokumentasi_pasca_prodi_standar7}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_prodi_standar6}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_prodi_standar5}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_prodi_standar4}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_prodi_standar3}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_prodi_standar2}}');
        $this->dropTable('{{%s7_dokumentasi_pasca_prodi_standar1}}');

        $this->dropTable('{{%s7_dokumentasi_pasca_prodi}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190620_044719_add_dokumentasi_pasca_prodi_tabel cannot be reverted.\n";

        return false;
    }
    */
}
