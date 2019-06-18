<?php

use yii\db\Migration;

/**
 * Class m190617_094927_led_std_7
 */
class m190617_094927_led_std_7 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createLedInstitusi();
        $this->createLedFakultas();
        $this->createLedProdi();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->removeLedInstitusi();
        $this->removeLedFakultas();
        $this->removeLedProdi();
    }

    private function createLedInstitusi()
    {

        $this->createTable('s7_led_institusi',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_institusi'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('s7_led_institusi_standar1',[
            'id'=>$this->primaryKey(),
            'id_led_institusi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_institusi_standar2',[
            'id'=>$this->primaryKey(),
            'id_led_institusi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_institusi_standar3',[
            'id'=>$this->primaryKey(),
            'id_led_institusi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_institusi_standar4',[
            'id'=>$this->primaryKey(),
            'id_led_institusi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_institusi_standar5',[
            'id'=>$this->primaryKey(),
            'id_led_institusi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_institusi_standar6',[
            'id'=>$this->primaryKey(),
            'id_led_institusi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_institusi_standar7',[
            'id'=>$this->primaryKey(),
            'id_led_institusi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        //fk s1
        $this->addForeignKey('fk-s7_led_institusi-s7_akreditasi_institusi','{{%s7_led_institusi}}','id_akreditasi_institusi','{{%s7_akreditasi}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std1-s7_led_institusi','{{%s7_led_institusi_standar1}}','id_led_institusi_s1','{{%s7_led_institusi}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std2-s7_led_institusi','{{%s7_led_institusi_standar2}}','id_led_institusi_s1','{{%s7_led_institusi}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std3-s7_led_institusi','{{%s7_led_institusi_standar3}}','id_led_institusi_s1','{{%s7_led_institusi}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std4-s7_led_institusi','{{%s7_led_institusi_standar4}}','id_led_institusi_s1','{{%s7_led_institusi}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std5-s7_led_institusi','{{%s7_led_institusi_standar5}}','id_led_institusi_s1','{{%s7_led_institusi}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std6-s7_led_institusi','{{%s7_led_institusi_standar6}}','id_led_institusi_s1','{{%s7_led_institusi}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std7-s7_led_institusi','{{%s7_led_institusi_standar7}}','id_led_institusi_s1','{{%s7_led_institusi}}','id');

        $this->addForeignKey('fk-s7_led_institusi_std1-usr_crd','{{%s7_led_institusi_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std1-usr_upd','{{%s7_led_institusi_standar1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_institusi_std2-usr_crd','{{%s7_led_institusi_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std2-usr_upd','{{%s7_led_institusi_standar2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_institusi_std3-usr_crd','{{%s7_led_institusi_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std3-usr_upd','{{%s7_led_institusi_standar3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_institusi_std4-usr_crd','{{%s7_led_institusi_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std4-usr_upd','{{%s7_led_institusi_standar4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_institusi_std5-usr_crd','{{%s7_led_institusi_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std5-usr_upd','{{%s7_led_institusi_standar5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_institusi_std6-usr_crd','{{%s7_led_institusi_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std6-usr_upd','{{%s7_led_institusi_standar6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_institusi_std7-usr_crd','{{%s7_led_institusi_standar7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_institusi_std7-usr_upd','{{%s7_led_institusi_standar7}}','updated_by','{{%user}}','id');


    }

    private function createLedFakultas()
    {

        $this->createTable('s7_led_fakultas',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_fakultas'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('s7_led_fakultas_standar1',[
            'id'=>$this->primaryKey(),
            'id_led_fakultas_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_fakultas_standar2',[
            'id'=>$this->primaryKey(),
            'id_led_fakultas_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_fakultas_standar3',[
            'id'=>$this->primaryKey(),
            'id_led_fakultas_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_fakultas_standar4',[
            'id'=>$this->primaryKey(),
            'id_led_fakultas_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_fakultas_standar5',[
            'id'=>$this->primaryKey(),
            'id_led_fakultas_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_fakultas_standar6',[
            'id'=>$this->primaryKey(),
            'id_led_fakultas_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_fakultas_standar7',[
            'id'=>$this->primaryKey(),
            'id_led_fakultas_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        //fk s1
        $this->addForeignKey('fk-s7_led_fakultas-s7_akreditasi','{{%s7_led_fakultas}}','id_akreditasi','{{%s7_akreditasi}}','id');
        $this->addForeignKey('fk-s7_led_fakultas-fakultas_akademi','{{%s7_led_fakultas}}','id_fakultas','{{%fakultas_akademi}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std1-s7_led_fakultas','{{%s7_led_fakultas_standar1}}','id_led_fakultas_s1','{{%s7_led_fakultas}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std2-s7_led_fakultas','{{%s7_led_fakultas_standar2}}','id_led_fakultas_s1','{{%s7_led_fakultas}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std3-s7_led_fakultas','{{%s7_led_fakultas_standar3}}','id_led_fakultas_s1','{{%s7_led_fakultas}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std4-s7_led_fakultas','{{%s7_led_fakultas_standar4}}','id_led_fakultas_s1','{{%s7_led_fakultas}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std5-s7_led_fakultas','{{%s7_led_fakultas_standar5}}','id_led_fakultas_s1','{{%s7_led_fakultas}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std6-s7_led_fakultas','{{%s7_led_fakultas_standar6}}','id_led_fakultas_s1','{{%s7_led_fakultas}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std7-s7_led_fakultas','{{%s7_led_fakultas_standar7}}','id_led_fakultas_s1','{{%s7_led_fakultas}}','id');

        $this->addForeignKey('fk-s7_led_fakultas_std1-usr_crd','{{%s7_led_fakultas_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std1-usr_upd','{{%s7_led_fakultas_standar1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_fakultas_std2-usr_crd','{{%s7_led_fakultas_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std2-usr_upd','{{%s7_led_fakultas_standar2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_fakultas_std3-usr_crd','{{%s7_led_fakultas_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std3-usr_upd','{{%s7_led_fakultas_standar3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_fakultas_std4-usr_crd','{{%s7_led_fakultas_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std4-usr_upd','{{%s7_led_fakultas_standar4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_fakultas_std5-usr_crd','{{%s7_led_fakultas_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std5-usr_upd','{{%s7_led_fakultas_standar5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_fakultas_std6-usr_crd','{{%s7_led_fakultas_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std6-usr_upd','{{%s7_led_fakultas_standar6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_fakultas_std7-usr_crd','{{%s7_led_fakultas_standar7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_std7-usr_upd','{{%s7_led_fakultas_standar7}}','updated_by','{{%user}}','id');


    }

    private function createLedProdi()
    {
        //S1
        $this->createTable('s7_led_prodi_s1',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_s1_standar1',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_s1_standar2',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_s1_standar3',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_s1_standar4',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_s1_standar5',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_s1_standar6',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_s1_standar7',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_s1'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);


        //PascaSarjana
        $this->createTable('s7_led_prodi_pasca',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_pasca'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_pasca_standar1',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_pasca'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_pasca_standar2',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_pasca'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_pasca_standar3',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_pasca'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_pasca_standar4',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_pasca'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_pasca_standar5',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_pasca'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_pasca_standar6',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_pasca'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_pasca_standar7',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_pasca'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        //Diploma

        $this->createTable('s7_led_prodi_diploma',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_diploma'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_diploma_standar1',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_diploma'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_diploma_standar2',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_diploma'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_diploma_standar3',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_diploma'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_diploma_standar4',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_diploma'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_diploma_standar5',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_diploma'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_diploma_standar6',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_diploma'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('s7_led_prodi_diploma_standar7',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_diploma'=>$this->integer(),
            'nama_file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        //fk s1
        $this->addForeignKey('fk-s7_led_prodi_s1-s7_akred_prodi_s1','{{%s7_led_prodi_s1}}','id_akreditasi_prodi_s1','{{%s7_akreditasi_prodi_s1}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std1-s7_led_prodi_s1','{{%s7_led_prodi_s1_standar1}}','id_led_prodi_s1','{{%s7_led_prodi_s1}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std2-s7_led_prodi_s1','{{%s7_led_prodi_s1_standar2}}','id_led_prodi_s1','{{%s7_led_prodi_s1}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std3-s7_led_prodi_s1','{{%s7_led_prodi_s1_standar3}}','id_led_prodi_s1','{{%s7_led_prodi_s1}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std4-s7_led_prodi_s1','{{%s7_led_prodi_s1_standar4}}','id_led_prodi_s1','{{%s7_led_prodi_s1}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std5-s7_led_prodi_s1','{{%s7_led_prodi_s1_standar5}}','id_led_prodi_s1','{{%s7_led_prodi_s1}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std6-s7_led_prodi_s1','{{%s7_led_prodi_s1_standar6}}','id_led_prodi_s1','{{%s7_led_prodi_s1}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std7-s7_led_prodi_s1','{{%s7_led_prodi_s1_standar7}}','id_led_prodi_s1','{{%s7_led_prodi_s1}}','id');

        $this->addForeignKey('fk-s7_led_prodi_s1_std1-usr_crd','{{%s7_led_prodi_s1_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std1-usr_upd','{{%s7_led_prodi_s1_standar1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_s1_std2-usr_crd','{{%s7_led_prodi_s1_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std2-usr_upd','{{%s7_led_prodi_s1_standar2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_s1_std3-usr_crd','{{%s7_led_prodi_s1_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std3-usr_upd','{{%s7_led_prodi_s1_standar3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_s1_std4-usr_crd','{{%s7_led_prodi_s1_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std4-usr_upd','{{%s7_led_prodi_s1_standar4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_s1_std5-usr_crd','{{%s7_led_prodi_s1_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std5-usr_upd','{{%s7_led_prodi_s1_standar5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_s1_std6-usr_crd','{{%s7_led_prodi_s1_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std6-usr_upd','{{%s7_led_prodi_s1_standar6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_s1_std7-usr_crd','{{%s7_led_prodi_s1_standar7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_std7-usr_upd','{{%s7_led_prodi_s1_standar7}}','updated_by','{{%user}}','id');

        //fk pasca
        $this->addForeignKey('fk-s7_led_prodi_pasca-s7_akred_prodi_pasca','{{%s7_led_prodi_pasca}}','id_akreditasi_prodi_pasca','{{%s7_akreditasi_prodi_pasca}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std1-s7_led_prodi_pasca','{{%s7_led_prodi_pasca_standar1}}','id_led_prodi_pasca','{{%s7_led_prodi_pasca}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std2-s7_led_prodi_pasca','{{%s7_led_prodi_pasca_standar2}}','id_led_prodi_pasca','{{%s7_led_prodi_pasca}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std3-s7_led_prodi_pasca','{{%s7_led_prodi_pasca_standar3}}','id_led_prodi_pasca','{{%s7_led_prodi_pasca}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std4-s7_led_prodi_pasca','{{%s7_led_prodi_pasca_standar4}}','id_led_prodi_pasca','{{%s7_led_prodi_pasca}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std5-s7_led_prodi_pasca','{{%s7_led_prodi_pasca_standar5}}','id_led_prodi_pasca','{{%s7_led_prodi_pasca}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std6-s7_led_prodi_pasca','{{%s7_led_prodi_pasca_standar6}}','id_led_prodi_pasca','{{%s7_led_prodi_pasca}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std7-s7_led_prodi_pasca','{{%s7_led_prodi_pasca_standar7}}','id_led_prodi_pasca','{{%s7_led_prodi_pasca}}','id');

        $this->addForeignKey('fk-s7_led_prodi_pasca_std1-usr_crd','{{%s7_led_prodi_pasca_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std1-usr_upd','{{%s7_led_prodi_pasca_standar1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_pasca_std2-usr_crd','{{%s7_led_prodi_pasca_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std2-usr_upd','{{%s7_led_prodi_pasca_standar2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_pasca_std3-usr_crd','{{%s7_led_prodi_pasca_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std3-usr_upd','{{%s7_led_prodi_pasca_standar3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_pasca_std4-usr_crd','{{%s7_led_prodi_pasca_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std4-usr_upd','{{%s7_led_prodi_pasca_standar4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_pasca_std5-usr_crd','{{%s7_led_prodi_pasca_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std5-usr_upd','{{%s7_led_prodi_pasca_standar5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_pasca_std6-usr_crd','{{%s7_led_prodi_pasca_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std6-usr_upd','{{%s7_led_prodi_pasca_standar6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_pasca_std7-usr_crd','{{%s7_led_prodi_pasca_standar7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_std7-usr_upd','{{%s7_led_prodi_pasca_standar7}}','updated_by','{{%user}}','id');

        //fk diploma
        $this->addForeignKey('fk-s7_led_prodi_diploma-s7_akred_prodi_diploma','{{%s7_led_prodi_diploma}}','id_akreditasi_prodi_diploma','{{%s7_akreditasi_prodi_diploma}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std1-s7_led_prodi_diploma','{{%s7_led_prodi_diploma_standar1}}','id_led_prodi_diploma','{{%s7_led_prodi_diploma}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std2-s7_led_prodi_diploma','{{%s7_led_prodi_diploma_standar2}}','id_led_prodi_diploma','{{%s7_led_prodi_diploma}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std3-s7_led_prodi_diploma','{{%s7_led_prodi_diploma_standar3}}','id_led_prodi_diploma','{{%s7_led_prodi_diploma}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std4-s7_led_prodi_diploma','{{%s7_led_prodi_diploma_standar4}}','id_led_prodi_diploma','{{%s7_led_prodi_diploma}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std5-s7_led_prodi_diploma','{{%s7_led_prodi_diploma_standar5}}','id_led_prodi_diploma','{{%s7_led_prodi_diploma}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std6-s7_led_prodi_diploma','{{%s7_led_prodi_diploma_standar6}}','id_led_prodi_diploma','{{%s7_led_prodi_diploma}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std7-s7_led_prodi_diploma','{{%s7_led_prodi_diploma_standar7}}','id_led_prodi_diploma','{{%s7_led_prodi_diploma}}','id');

        $this->addForeignKey('fk-s7_led_prodi_diploma_std1-usr_crd','{{%s7_led_prodi_diploma_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std1-usr_upd','{{%s7_led_prodi_diploma_standar1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_diploma_std2-usr_crd','{{%s7_led_prodi_diploma_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std2-usr_upd','{{%s7_led_prodi_diploma_standar2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_diploma_std3-usr_crd','{{%s7_led_prodi_diploma_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std3-usr_upd','{{%s7_led_prodi_diploma_standar3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_diploma_std4-usr_crd','{{%s7_led_prodi_diploma_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std4-usr_upd','{{%s7_led_prodi_diploma_standar4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_diploma_std5-usr_crd','{{%s7_led_prodi_diploma_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std5-usr_upd','{{%s7_led_prodi_diploma_standar5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_diploma_std6-usr_crd','{{%s7_led_prodi_diploma_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std6-usr_upd','{{%s7_led_prodi_diploma_standar6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-s7_led_prodi_diploma_std7-usr_crd','{{%s7_led_prodi_diploma_standar7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_diploma_std7-usr_upd','{{%s7_led_prodi_diploma_standar7}}','updated_by','{{%user}}','id');


    }

    private function removeLedInstitusi()
    {
        $this->dropTable('{{%s7_led_institusi_standar1}}');
        $this->dropTable('{{%s7_led_institusi_standar2}}');
        $this->dropTable('{{%s7_led_institusi_standar3}}');
        $this->dropTable('{{%s7_led_institusi_standar4}}');
        $this->dropTable('{{%s7_led_institusi_standar5}}');
        $this->dropTable('{{%s7_led_institusi_standar6}}');
        $this->dropTable('{{%s7_led_institusi_standar7}}');
        $this->dropTable('{{%s7_led_institusi}}');
    }

    private function removeLedFakultas()
    {
        $this->dropTable('{{%s7_led_fakultas_standar1}}');
        $this->dropTable('{{%s7_led_fakultas_standar2}}');
        $this->dropTable('{{%s7_led_fakultas_standar3}}');
        $this->dropTable('{{%s7_led_fakultas_standar4}}');
        $this->dropTable('{{%s7_led_fakultas_standar5}}');
        $this->dropTable('{{%s7_led_fakultas_standar6}}');
        $this->dropTable('{{%s7_led_fakultas_standar7}}');
        $this->dropTable('{{%s7_led_fakultas}}');

    }

    private function removeLedProdi()
    {
        $this->dropTable('{{%s7_led_prodi_s1_standar1}}');
        $this->dropTable('{{%s7_led_prodi_s1_standar2}}');
        $this->dropTable('{{%s7_led_prodi_s1_standar3}}');
        $this->dropTable('{{%s7_led_prodi_s1_standar4}}');
        $this->dropTable('{{%s7_led_prodi_s1_standar5}}');
        $this->dropTable('{{%s7_led_prodi_s1_standar6}}');
        $this->dropTable('{{%s7_led_prodi_s1_standar7}}');
        $this->dropTable('{{%s7_led_prodi_s1}}');

        $this->dropTable('{{%s7_led_prodi_pasca_standar1}}');
        $this->dropTable('{{%s7_led_prodi_pasca_standar2}}');
        $this->dropTable('{{%s7_led_prodi_pasca_standar3}}');
        $this->dropTable('{{%s7_led_prodi_pasca_standar4}}');
        $this->dropTable('{{%s7_led_prodi_pasca_standar5}}');
        $this->dropTable('{{%s7_led_prodi_pasca_standar6}}');
        $this->dropTable('{{%s7_led_prodi_pasca_standar7}}');
        $this->dropTable('{{%s7_led_prodi_pasca}}');

        $this->dropTable('{{%s7_led_prodi_diploma_standar1}}');
        $this->dropTable('{{%s7_led_prodi_diploma_standar2}}');
        $this->dropTable('{{%s7_led_prodi_diploma_standar3}}');
        $this->dropTable('{{%s7_led_prodi_diploma_standar4}}');
        $this->dropTable('{{%s7_led_prodi_diploma_standar5}}');
        $this->dropTable('{{%s7_led_prodi_diploma_standar6}}');
        $this->dropTable('{{%s7_led_prodi_diploma_standar7}}');
        $this->dropTable('{{%s7_led_prodi_diploma}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190617_094927_led_std_7 cannot be reverted.\n";

        return false;
    }
    */
}
