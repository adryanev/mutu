<?php

use yii\db\Migration;

/**
 * Class m190511_053754_insert_minimal_data
 */
class m190511_053754_insert_minimal_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->insertDataInstitusi();
        $this->insertUser();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->deleteDataInstitusi();
        $this->deleteUser();
    }

    private function insertUser()
    {

        $dataUser = [
            [2,'admin_institusi','Pwys0TRico7Ha4YSyX2fmjABrFskscxh','$2y$13$tyy5A3UZe0ipSoaWDrbpXOfBE8bph0sawnVHrGu6RFfgD7Nihq9he',null,'admin_institusi@mutu.test',10,1,1,1,1,1557554873,1557554873,'Pwys0TRico7Ha4YSyX2fmjABrFskscxh'],
            [3,'admin_fakultas','Pwys0TRico7Ha4YSyX2fmjABrFskscxh','$2y$13$tyy5A3UZe0ipSoaWDrbpXOfBE8bph0sawnVHrGu6RFfgD7Nihq9he',null,'admin_fakultas@mutu.test',10,1,0,1,1,1557554873,1557554873,'Pwys0TRico7Ha4YSyX2fmjABrFskscxh'],
            [4,'admin_prodi','Pwys0TRico7Ha4YSyX2fmjABrFskscxh','$2y$13$tyy5A3UZe0ipSoaWDrbpXOfBE8bph0sawnVHrGu6RFfgD7Nihq9he',null,'admin_prodi@mutu.test',10,1,0,0,1,1557554873,1557554873,'Pwys0TRico7Ha4YSyX2fmjABrFskscxh'],
            [5,'user_institusi','Pwys0TRico7Ha4YSyX2fmjABrFskscxh','$2y$13$tyy5A3UZe0ipSoaWDrbpXOfBE8bph0sawnVHrGu6RFfgD7Nihq9he',null,'user_institusi@mutu.test',10,0,1,0,0,1557554873,1557554873,'Pwys0TRico7Ha4YSyX2fmjABrFskscxh'],
            [6,'user_fakultas','Pwys0TRico7Ha4YSyX2fmjABrFskscxh','$2y$13$tyy5A3UZe0ipSoaWDrbpXOfBE8bph0sawnVHrGu6RFfgD7Nihq9he',null,'user_fakultas@mutu.test',10,0,0,1,0,1557554873,1557554873,'Pwys0TRico7Ha4YSyX2fmjABrFskscxh'],
            [7,'user_prodi','Pwys0TRico7Ha4YSyX2fmjABrFskscxh','$2y$13$tyy5A3UZe0ipSoaWDrbpXOfBE8bph0sawnVHrGu6RFfgD7Nihq9he',null,'user_prodi@mutu.test',10,0,0,0,1,1557554873,1557554873,'Pwys0TRico7Ha4YSyX2fmjABrFskscxh'],
        ];
        $dataProfilUser = [
            [2,2,'Admin Institusi',null,1557554873,1557554873,null],
            [3,3,'Admin Fakultas',1,1557554873,1557554873,null],
            [4,4,'Admin Prodi',1,1557554873,1557554873,1],
            [5,5,'User Institusi',null,1557554873,1557554873,null],
            [6,6,'User Fakultas',1,1557554873,1557554873,null],
            [7,7,'User Prodi',1,1557554873,1557554873,1],
        ];

        $this->batchInsert('{{%user}}',['id','username','auth_key','password_hash','password_reset_token','email','status','is_admin','is_institusi','is_fakultas','is_prodi','created_at','updated_at','verification_token'],$dataUser);
        $this->batchInsert('{{%profil_user}}',['id','id_user','nama_lengkap','id_prodi','created_at','updated_at','id_fakultas'],$dataProfilUser);
    }

    private function insertDataInstitusi()
    {

        $this->insert('{{%unit}}',['id'=>1,
            'nama'=>'PTIPD',
            'created_at'=>1557554873,
            'updated_at'=>1557554873]);
        $this->insert('{{%fakultas_akademi}}',['id'=>1,
            'nama'=>'Sains dan Teknologi',
            'created_at'=>1557554873,
            'updated_at'=>1557554873]);
        $this->insert('{{%program_studi}}',['id'=>1,
            'nama'=>'Teknik Informatika',
            'id_fakultas_akademi'=>1,
            'id_program'=>1,
            'created_at'=>1557554873,
            'updated_at'=>1557554873]);
    }

    private function deleteUser()
    {
        $this->delete('{{%profil_user}}',['id'=>2]);
        $this->delete('{{%profil_user}}',['id'=>3]);
        $this->delete('{{%profil_user}}',['id'=>4]);
        $this->delete('{{%profil_user}}',['id'=>5]);
        $this->delete('{{%profil_user}}',['id'=>6]);
        $this->delete('{{%profil_user}}',['id'=>7]);

        $this->delete('{{%user}}',['id'=>2]);
        $this->delete('{{%user}}',['id'=>3]);
        $this->delete('{{%user}}',['id'=>4]);
        $this->delete('{{%user}}',['id'=>5]);
        $this->delete('{{%user}}',['id'=>6]);
        $this->delete('{{%user}}',['id'=>7]);
    }

    private function deleteDataInstitusi()
    {
        $this->delete('{{%unit}}',['id'=>1]);
        $this->delete('{{%fakultas_akademi}}',['id'=>1]);
        $this->delete('{{%program_studi}}',['id'=>1]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190511_053754_insert_minimal_data cannot be reverted.\n";

        return false;
    }
    */
}
