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

        $this->createTable('{{%s7_led_institusi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_institusi'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),

        ]);
        
        $this->createTable('{{%s7_led_institusi_detail}}',[
            'id'=>$this->primaryKey(),
            'id_led_institusi'=>$this->integer(),
            'jenis_file'=>$this->string(),
            'file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->addForeignKey('fk-s7_led_institusi-s7_akreditasi_institusi','{{%s7_led_institusi}}','id_akreditasi_institusi','{{%s7_akreditasi_institusi}}','id');
        $this->addForeignKey('fk-s7_led_institusi_det-s7_led_institusi','{{%s7_led_institusi_detail}}','id_led_institusi','{{%s7_led_institusi}}','id');
        $this->addForeignKey('fk-s7_led_institusi_det-usr_crd','{{%s7_led_institusi_detail}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_institusi_det-usr_upd','{{%s7_led_institusi_detail}}','updated_by','{{%user}}','id');

    }

    private function createLedFakultas()
    {

        $this->createTable('s7_led_fakultas',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_fakultas'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);

        $this->createTable('{{%s7_led_fakultas_detail}}',[
            'id'=>$this->primaryKey(),
            'id_led_fakultas'=>$this->integer(),
            'jenis_file'=>$this->string(),
            'file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->addForeignKey('fk-s7_led_fakultas-s7_akreditasi','{{%s7_led_fakultas}}','id_akreditasi','{{%s7_akreditasi}}','id');
        $this->addForeignKey('fk-s7_led_fakultas-fakultas_akademi','{{%s7_led_fakultas}}','id_fakultas','{{%fakultas_akademi}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_det-s7_led_fakultas','{{%s7_led_fakultas_detail}}','id_led_fakultas','{{%s7_led_fakultas}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_det-usr_crd','{{%s7_led_fakultas_detail}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_fakultas_det-usr_upd','{{%s7_led_fakultas_detail}}','updated_by','{{%user}}','id');

    }

    private function createLedProdi()
    {
        //S1
        $this->createTable('{{%s7_led_prodi_s1}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),

        ]);

        $this->createTable('{{%s7_led_prodi_s1_detail}}',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_s1'=>$this->integer(),
            'jenis_file'=>$this->string(),
            'file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);



        //PascaSarjana
        $this->createTable('{{%s7_led_prodi_pasca}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_pasca'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);

        //PascaSarjana
        $this->createTable('{{%s7_led_prodi_pasca_detail}}',[
            'id'=>$this->primaryKey(),
            'id_led_prodi_pasca'=>$this->integer(),
            'jenis_file'=>$this->string(),
            'file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        //fk s1
        $this->addForeignKey('fk-s7_led_prodi_s1-s7_akred_prodi_s1','{{%s7_led_prodi_s1}}','id_akreditasi_prodi_s1','{{%s7_akreditasi_prodi_s1}}','id');

        $this->addForeignKey('fk-s7_led_prodi_s1_det-s7_led_prodi_s1','{{%s7_led_prodi_s1_detail}}','id_led_prodi_s1','{{%s7_led_prodi_s1}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_det-usr_crd','{{%s7_led_prodi_s1_detail}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1_det-usr_upd','{{%s7_led_prodi_s1_detail}}','updated_by','{{%user}}','id');

        //fk pasca
        $this->addForeignKey('fk-s7_led_prodi_pasca-s7_akred_prodi_pasca','{{%s7_led_prodi_pasca}}','id_akreditasi_prodi_pasca','{{%s7_akreditasi_prodi_pasca}}','id');

        $this->addForeignKey('fk-s7_led_prodi_pasca_s7_led_prodi_pasca','{{%s7_led_prodi_pasca_detail}}','created_by','{{%s7_led_prodi_pasca}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_det-usr_crd','{{%s7_led_prodi_pasca_detail}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca_det-usr_upd','{{%s7_led_prodi_pasca_detail}}','updated_by','{{%user}}','id');

    }

    private function removeLedInstitusi()
    {
        $this->dropTable('{{%s7_led_institusi}}');
        $this->dropTable('{{%s7_led_institusi_detail}}');
    }

    private function removeLedFakultas()
    {
        $this->dropTable('{{%s7_led_fakultas}}');
        $this->dropTable('{{%s7_led_fakultas_detail}}');

    }

    private function removeLedProdi()
    {

        $this->dropTable('{{%s7_led_prodi_s1}}');
        $this->dropTable('{{%s7_led_prodi_s1_detail}}');
        $this->dropTable('{{%s7_led_prodi_pasca}}');
        $this->dropTable('{{%s7_led_prodi_pasca_detail}}');

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
