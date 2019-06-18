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
            'jenis_file'=>$this->string(),
            'file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->addForeignKey('fk-s7_led_institusi-s7_akreditasi','{{%s7_led_fakultas}}','id_akreditasi','{{%s7_akreditasi}}','id');

        $this->addForeignKey('fk-s7_led_institusi-usr_crd','{{%s7_led_institusi}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_institusi-usr_upd','{{%s7_led_institusi}}','updated_by','{{%user}}','id');

    }

    private function createLedFakultas()
    {

        $this->createTable('s7_led_fakultas',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_fakultas'=>$this->integer(),
            'jenis_file'=>$this->string(),
            'file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        //fk s1
        $this->addForeignKey('fk-s7_led_fakultas-s7_akreditasi','{{%s7_led_fakultas}}','id_akreditasi','{{%s7_akreditasi}}','id');
        $this->addForeignKey('fk-s7_led_fakultas-fakultas_akademi','{{%s7_led_fakultas}}','id_fakultas','{{%fakultas_akademi}}','id');

    }

    private function createLedProdi()
    {
        //S1
        $this->createTable('s7_led_prodi_s1',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'jenis_file'=>$this->string(),
            'file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        //PascaSarjana
        $this->createTable('s7_led_prodi_pasca',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_pasca'=>$this->integer(),
            'jenis_file'=>$this->string(),
            'file'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        //fk s1
        $this->addForeignKey('fk-s7_led_prodi_s1-s7_akred_prodi_s1','{{%s7_led_prodi_s1}}','id_akreditasi_prodi_s1','{{%s7_akreditasi_prodi_s1}}','id');

        $this->addForeignKey('fk-s7_led_prodi_s1-usr_crd','{{%s7_led_prodi_s1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_s1-usr_upd','{{%s7_led_prodi_s1}}','updated_by','{{%user}}','id');

        //fk pasca
        $this->addForeignKey('fk-s7_led_prodi_pasca-s7_akred_prodi_pasca','{{%s7_led_prodi_pasca}}','id_akreditasi_prodi_pasca','{{%s7_akreditasi_prodi_pasca}}','id');

        $this->addForeignKey('fk-s7_led_prodi_pasca-usr_crd','{{%s7_led_prodi_pasca}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-s7_led_prodi_pasca-usr_upd','{{%s7_led_prodi_pasca}}','updated_by','{{%user}}','id');

    }

    private function removeLedInstitusi()
    {
        $this->dropTable('{{%s7_led_institusi}}');
    }

    private function removeLedFakultas()
    {
        $this->dropTable('{{%s7_led_fakultas}}');

    }

    private function removeLedProdi()
    {

        $this->dropTable('{{%s7_led_prodi_s1}}');
        $this->dropTable('{{%s7_led_prodi_pasca}}');

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
