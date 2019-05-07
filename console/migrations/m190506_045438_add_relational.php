<?php

use yii\db\Migration;

/**
 * Class m190506_045438_add_relational
 */
class m190506_045438_add_relational extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-profil_user-user','{{%profil_user}}','id_user', 'user','id');
        $this->addForeignKey('fk-profil_user-program_studi','{{%profil_user}}','id_prodi', 'program_studi','id');
        $this->addForeignKey('fk-program_studi-program','{{%program_studi}}','id_program','program','id');
        $this->addForeignKey('fk-program_studi_fakultas_akademi','{{%program_studi}}','id_fakultas_akademi','{{%fakultas_akademi}}','id');
        $this->addForeignKey('fk-akreditasi-jenis_akreditasi','{{%akreditasi}}','id_jenis_akreditasi','{{%jenis_akreditasi}}','id');
        $this->addForeignKey('fk-akreditasi_prodi_diploma-akreditasi','{{%akreditasi_prodi_diploma}}','id_akreditasi','{{%akreditasi}}','id');
        $this->addForeignKey('fk-akreditasi_prodi_diploma-program_studi','{{%akreditasi_prodi_diploma}}','id_prodi','{{%program_studi}}','id');
        $this->addForeignKey('fk-akreditasi_prodi_s1-akreditasi','{{%akreditasi_prodi_s1}}','id_akreditasi','{{%akreditasi}}','id');
        $this->addForeignKey('fk-akreditasi_prodi_s1-program_studi','{{%akreditasi_prodi_s1}}','id_prodi','{{%program_studi}}','id');
        $this->addForeignKey('fk-akreditasi_prodi_s2-akreditasi','{{%akreditasi_prodi_s2}}','id_akreditasi','{{%akreditasi}}','id');
        $this->addForeignKey('fk-akreditasi_prodi_s2-program_studi','{{%akreditasi_prodi_s2}}','id_prodi','{{%program_studi}}','id');
        $this->addForeignKey('fk-akreditasi_prodi_s3-akreditasi','{{%akreditasi_prodi_s3}}','id_akreditasi','{{%akreditasi}}','id');
        $this->addForeignKey('fk-akreditasi_prodi_s3-program_studi','{{%akreditasi_prodi_s3}}','id_prodi','{{%program_studi}}','id');
        $this->addForeignKey('fk-akreditasi_institusi-akreditasi','{{%akreditasi_institusi}}','id_akreditasi','{{%akreditasi}}','id');
        $this->addForeignKey('fk-borang_diploma_prodi-akreditasi_prodi-diploma','{{%borang_diploma_prodi}}','id_akreditasi_prodi_diploma','{{%akreditasi_prodi_diploma}}','id');
        $this->addForeignKey('fk-borang_diploma_akademi-akreditasi_prodi_diploma','{{%borang_diploma_akademi}}','id_akreditasi_prodi_diploma','{{%akreditasi_prodi_diploma}}','id');
        $this->addForeignKey('fk-borang_s1_prodi-akreditasi_prodi_s1','{{%borang_s1_prodi}}','id_akreditasi_prodi_s1','{{%akreditasi_prodi_s1}}','id');
        $this->addForeignKey('fk-dokumen_borang_s1_prodi-borang_s1_prodi','{{%dokumen_borang_s1_prodi}}','id_akreditasi_prodi_s1','{{%borang_s1_prodi}}','id');
        $this->addForeignKey('fk-borang_s1_fakultas-akreditasi_prodi_s1','{{%borang_s1_fakultas}}','id_akreditasi_prodi_s1','{{%akreditasi_prodi_s1}}','id');
        $this->addForeignKey('fk-dokumen_borang_s1_fakultas-borang_s1_fakultas','{{%dokumen_borang_s1_fakultas}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');
        $this->addForeignKey('fk-borang_s2_prodi-akreditasi_prodi_s2','{{%borang_s2_prodi}}','id_akreditasi_prodi_s2','{{%akreditasi_prodi_s2}}','id');
        $this->addForeignKey('fk-borang_s2_fakultas-akreditasi_prodi_s2','{{%borang_s2_fakultas}}','id_akreditasi_prodi_s2','{{%akreditasi_prodi_s2}}','id');
        $this->addForeignKey('fk-borang_s3_prodi-akreditasi_prodi_s2','{{%borang_s3_prodi}}','id_akreditasi_prodi_s3','{{%akreditasi_prodi_s3}}','id');
        $this->addForeignKey('fk-borang_s3_fakultas-akreditasi_prodi_s2','{{%borang_s3_fakultas}}','id_akreditasi_prodi_s3','{{%akreditasi_prodi_s3}}','id');


        //borang standar prodi

        $this->addForeignKey('fk-borang_s1_prodi_standar1-borang_s1_prodi','{{%borang_s1_prodi_standar1}}','id_borang_s1_prodi','{{%borang_s1_prodi}}','id');
        $this->addForeignKey('fk-detail_borang_s1_prodi_standar1-borang_s1_prodi_standar1','{{%detail_borang_s1_prodi_standar1}}','id_borang_s1_prodi_standar1','{{%borang_s1_prodi_standar1}}','id');


        $this->addForeignKey('fk-borang_s1_prodi_standar2-borang_s1_prodi','{{%borang_s1_prodi_standar2}}','id_borang_s1_prodi','{{%borang_s1_prodi}}','id');
        $this->addForeignKey('fk-detail_borang_s1_prodi_standar2-borang_s1_prodi_standar2','{{%detail_borang_s1_prodi_standar2}}','id_borang_s1_prodi_standar2','{{%borang_s1_prodi_standar2}}','id');


        $this->addForeignKey('fk-borang_s1_prodi_standar3-borang_s1_prodi','{{%borang_s1_prodi_standar3}}','id_borang_s1_prodi','{{%borang_s1_prodi}}','id');
        $this->addForeignKey('fk-detail_borang_s1_prodi_standar3-borang_s1_prodi_standar3','{{%detail_borang_s1_prodi_standar3}}','id_borang_s1_prodi_standar3','{{%borang_s1_prodi_standar3}}','id');


        $this->addForeignKey('fk-borang_s1_prodi_standar4-borang_s1_prodi','{{%borang_s1_prodi_standar4}}','id_borang_s1_prodi','{{%borang_s1_prodi}}','id');
        $this->addForeignKey('fk-detail_borang_s1_prodi_standar4-borang_s1_prodi_standar4','{{%detail_borang_s1_prodi_standar4}}','id_borang_s1_prodi_standar4','{{%borang_s1_prodi_standar4}}','id');


        $this->addForeignKey('fk-borang_s1_prodi_standar5-borang_s1_prodi','{{%borang_s1_prodi_standar5}}','id_borang_s1_prodi','{{%borang_s1_prodi}}','id');
        $this->addForeignKey('fk-detail_borang_s1_prodi_standar5-borang_s1_prodi_standar5','{{%detail_borang_s1_prodi_standar5}}','id_borang_s1_prodi_standar5','{{%borang_s1_prodi_standar5}}','id');


        $this->addForeignKey('fk-borang_s1_prodi_standar6-borang_s1_prodi','{{%borang_s1_prodi_standar6}}','id_borang_s1_prodi','{{%borang_s1_prodi}}','id');
        $this->addForeignKey('fk-detail_borang_s1_prodi_standar6-borang_s1_prodi_standar6','{{%detail_borang_s1_prodi_standar6}}','id_borang_s1_prodi_standar6','{{%borang_s1_prodi_standar6}}','id');


        $this->addForeignKey('fk-borang_s1_prodi_standar7-borang_s1_prodi','{{%borang_s1_prodi_standar7}}','id_borang_s1_prodi','{{%borang_s1_prodi}}','id');
        $this->addForeignKey('fk-detail_borang_s1_prodi_standar7-borang_s1_prodi_standar7','{{%detail_borang_s1_prodi_standar7}}','id_borang_s1_prodi_standar7','{{%borang_s1_prodi_standar7}}','id');


        //borang standar fakultas

        $this->addForeignKey('fk-borang_s1_fakultas_standar1-borang_s1_fakultas','{{%borang_s1_fakultas_standar1}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar1-borang_s1_fakultas_standar1','{{%detail_borang_s1_fakultas_standar1}}','id_borang_s1_fakultas_standar1','{{%borang_s1_fakultas_standar1}}','id');


        $this->addForeignKey('fk-borang_s1_fakultas_standar2-borang_s1_fakultas','{{%borang_s1_fakultas_standar2}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar2-borang_s1_fakultas_standar2','{{%detail_borang_s1_fakultas_standar2}}','id_borang_s1_fakultas_standar2','{{%borang_s1_fakultas_standar2}}','id');


        $this->addForeignKey('fk-borang_s1_fakultas_standar3-borang_s1_fakultas','{{%borang_s1_fakultas_standar3}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar3-borang_s1_fakultas_standar3','{{%detail_borang_s1_fakultas_standar3}}','id_borang_s1_fakultas_standar3','{{%borang_s1_fakultas_standar3}}','id');


        $this->addForeignKey('fk-borang_s1_fakultas_standar4-borang_s1_fakultas','{{%borang_s1_fakultas_standar4}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar4-borang_s1_fakultas_standar4','{{%detail_borang_s1_fakultas_standar4}}','id_borang_s1_fakultas_standar4','{{%borang_s1_fakultas_standar4}}','id');


        $this->addForeignKey('fk-borang_s1_fakultas_standar5-borang_s1_fakultas','{{%borang_s1_fakultas_standar5}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar5-borang_s1_fakultas_standar5','{{%detail_borang_s1_fakultas_standar5}}','id_borang_s1_fakultas_standar5','{{%borang_s1_fakultas_standar5}}','id');


        $this->addForeignKey('fk-borang_s1_fakultas_standar6-borang_s1_fakultas','{{%borang_s1_fakultas_standar6}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar6-borang_s1_fakultas_standar6','{{%detail_borang_s1_fakultas_standar6}}','id_borang_s1_fakultas_standar6','{{%borang_s1_fakultas_standar6}}','id');


        $this->addForeignKey('fk-borang_s1_fakultas_standar7-borang_s1_fakultas','{{%borang_s1_fakultas_standar7}}','id_borang_s1_fakultas','{{%borang_s1_fakultas}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar7-borang_s1_fakultas_standar7','{{%detail_borang_s1_fakultas_standar7}}','id_borang_s1_fakultas_standar7','{{%borang_s1_fakultas_standar7}}','id');




    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        //borang standar fakultas

        $this->dropForeignKey('fk-detail_borang_s1_fakultas_standar7-borang_s1_fakultas_standar7','{{%detail_borang_s1_fakultas_standar7}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar7-borang_s1_fakultas','{{%borang_s1_fakultas_standar7}}');

        $this->dropForeignKey('fk-detail_borang_s1_fakultas_standar6-borang_s1_fakultas_standar6','{{%detail_borang_s1_fakultas_standar6}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar6-borang_s1_fakultas','{{%borang_s1_fakultas_standar6}}');

        $this->dropForeignKey('fk-detail_borang_s1_fakultas_standar5-borang_s1_fakultas_standar5','{{%detail_borang_s1_fakultas_standar5}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar5-borang_s1_fakultas','{{%borang_s1_fakultas_standar5}}');

        $this->dropForeignKey('fk-detail_borang_s1_fakultas_standar4-borang_s1_fakultas_standar4','{{%detail_borang_s1_fakultas_standar4}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar4-borang_s1_fakultas','{{%borang_s1_fakultas_standar4}}');

        $this->dropForeignKey('fk-detail_borang_s1_fakultas_standar3-borang_s1_fakultas_standar3','{{%detail_borang_s1_fakultas_standar3}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar3-borang_s1_fakultas','{{%borang_s1_fakultas_standar3}}');

        $this->dropForeignKey('fk-detail_borang_s1_fakultas_standar2-borang_s1_fakultas_standar2','{{%detail_borang_s1_fakultas_standar2}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar2-borang_s1_fakultas','{{%borang_s1_fakultas_standar2}}');

        $this->dropForeignKey('fk-detail_borang_s1_fakultas_standar1-borang_s1_fakultas_standar1','{{%detail_borang_s1_fakultas_standar1}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar1-borang_s1_fakultas','{{%borang_s1_fakultas_standar1}}');

        //borang standar prodi

        $this->dropForeignKey('fk-detail_borang_s1_prodi_standar7-borang_s1_prodi_standar7','{{%detail_borang_s1_prodi_standar7}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar7-borang_s1_prodi','{{%borang_s1_prodi_standar7}}');

        $this->dropForeignKey('fk-detail_borang_s1_prodi_standar6-borang_s1_prodi_standar6','{{%detail_borang_s1_prodi_standar6}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar6-borang_s1_prodi','{{%borang_s1_prodi_standar6}}');

        $this->dropForeignKey('fk-detail_borang_s1_prodi_standar5-borang_s1_prodi_standar5','{{%detail_borang_s1_prodi_standar5}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar5-borang_s1_prodi','{{%borang_s1_prodi_standar5}}');

        $this->dropForeignKey('fk-detail_borang_s1_prodi_standar4-borang_s1_prodi_standar4','{{%detail_borang_s1_prodi_standar4}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar4-borang_s1_prodi','{{%borang_s1_prodi_standar4}}');

        $this->dropForeignKey('fk-detail_borang_s1_prodi_standar3-borang_s1_prodi_standar3','{{%detail_borang_s1_prodi_standar3}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar3-borang_s1_prodi','{{%borang_s1_prodi_standar3}}');

        $this->dropForeignKey('fk-detail_borang_s1_prodi_standar2-borang_s1_prodi_standar2','{{%detail_borang_s1_prodi_standar2}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar2-borang_s1_prodi','{{%borang_s1_prodi_standar2}}');

        $this->dropForeignKey('fk-detail_borang_s1_prodi_standar1-borang_s1_prodi_standar1','{{%detail_borang_s1_prodi_standar1}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar1-borang_s1_prodi','{{%borang_s1_prodi_standar1}}');
        //tabel2
        $this->dropForeignKey('fk-borang_s2_fakultas-akreditasi_prodi_s3','{{%borang_s2_fakultas}}');
        $this->dropForeignKey('fk-borang_s2_prodi-akreditasi_prodi_s3','{{%borang_s2_prodi}}');
        $this->dropForeignKey('fk-borang_s2_fakultas-akreditasi_prodi_s2','{{%borang_s2_fakultas}}');
        $this->dropForeignKey('fk-borang_s2_prodi-akreditasi_prodi_s2','{{%borang_s2_prodi}}');
        $this->dropForeignKey('fk-dokumen_borang_s1_fakultas-borang_s1_fakultas','{{%dokumen_borang_s1_fakultas}}');
        $this->dropForeignKey('fk-borang_s1_fakultas-akreditasi_prodi_s1','{{%borang_s1_fakultas}}');
        $this->dropForeignKey('fk-dokumen_borang_s1_prodi-borang_s1_prodi','{{%dokumen_borang_s1_prodi}}');
        $this->dropForeignKey('fk-borang_s1_prodi-akreditasi_prodi_s1','{{%borang_s1_prodi}}');
        $this->dropForeignKey('fk-borang_diploma_akademi-akreditasi_prodi_diploma','{{%borang_diploma_akademi}}');
        $this->dropForeignKey('fk-borang_diploma_prodi-akreditasi_prodi_diploma','{{%borang_diploma_prodi}}');
        $this->dropForeignKey('fk-akreditasi_institusi-akreditasi','{{%akreditasi_institusi}}');
        $this->dropForeignKey('fk-akreditasi_prodi_s3-program_studi','{{%akreditasi_prodi_s3}}');
        $this->dropForeignKey('fk-akreditasi_prodi_s3-akreditasi','{{%akreditasi_prodi_s3}}');
        $this->dropForeignKey('fk-akreditasi_prodi_s2-program_studi','{{%akreditasi_prodi_s2}}');
        $this->dropForeignKey('fk-akreditasi_prodi_s2-akreditasi','{{%akreditasi_prodi_s2}}');
        $this->dropForeignKey('fk-akreditasi_prodi_s1-program_studi','{{%akreditasi_prodi_s1}}');
        $this->dropForeignKey('fk-akreditasi_prodi_s1-akreditasi','{{%akreditasi_prodi_s1}}');
        $this->dropForeignKey('fk-akreditasi_prodi_diploma-program_studi','{{%akreditasi_prodi_diploma}}');
        $this->dropForeignKey('fk-akreditasi_prodi_diploma-akreditasi','{{%akreditasi_prodi_diploma}}');
        $this->dropForeignKey('fk-akreditasi-jenis_akreditasi','{{%akreditasi}}');
        $this->dropForeignKey('fk-program_studi_fakultas_akademi','{{%program_studi}}');
        $this->dropForeignKey('fk-program_studi-program','{{%program_studi}}');
        $this->dropForeignKey('fk-profil_user-program_studi','{{%profil_user}}');
        $this->dropForeignKey('fk-profil_user-user','{{%profil_user}}');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190506_045438_add_relational cannot be reverted.\n";

        return false;
    }
    */
}
