<?php

use yii\db\Migration;

/**
 * Class m190611_132021_add_data_perguruan_tinggi
 */
class m190611_132021_add_data_perguruan_tinggi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%unit}}',['id'=>1,
            'nama'=>'PTIPD',
            'created_at'=>1557554873,
            'updated_at'=>1557554873]);
        $this->addToTabelFakultas();
        $this->addToTabelProdi();
        $this->insertUser();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%unit}}',['id'=>1]);
        $this->deleteTabelProdi();
       $this->deleteTabelFakultas();
       $this->deleteUser();
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


    private function addToTabelFakultas()
    {
        $data = [
            [1,'FSI','Fakultas Syariah dan Ilmu Hukum','Dr.H.Fatahuddin Aziz Siregar,M.Ag.',1557554873,1557554873],
            [2,'FTK','Fakultas Tarbiyah dan Ilmu Keguruan','Dr.Lelya Hilda,M.Si.',1557554873,1557554873],
            [3,'FDK','Fakultas Dakwah dan Ilmu Komunikasi','Dr.Ali Sati,M.Ag.',1557554873,1557554873],
            [4,'FEB','Fakultas Ekonomi dan Bisnis Islam','Dr.Darwis Harahap,S.HI.,M.Si.',1557554873,1557554873],

        ];

        $this->batchInsert('{{%fakultas_akademi}}',['id','kode','nama','dekan','created_at','updated_at'],$data);
    }

    private function addToTabelProdi()
    {
        $data = [
            [1,'74230','Hukum Keluarga Islam (Ahwal Syakhshiyyah)',1,'Musa Aripin,S.H.I.,M.S.I','S1',1557554873,1557554873],
            [2,'76231','Ilmu Al Quran dan Tafsir',1,'Drs.H.Dame Siregar,M.A.','S1',1557554873,1557554873],
            [3,'74234','Hukum Ekonomi Syariah',1,'Musa Aripin,S.H.I.,M.S.I','S1',1557554873,1557554873],
            [4,'74235','Hukum Tata Negara',1,'Dermina Dalimunthe,S.H.,M.H.','S1',1557554873,1557554873],
            [5,'74231','Hukum Pidana Islam',1,'Dermina Dalimunthe,S.H.,M.H.','S1',1557554873,1557554873],

            [6,'86108','Pendidikan Agama Islam',2,'Dr.Erawadi,M.Ag.','S2',1557554873,1557554873],
            [7,'86208','Pendidikan Agama Islam',2,'Drs.H.Abdul Sattar Daulay,M.Ag','S1',1557554873,1557554873],
            [8,'88203','Pendidikan Bahasa Inggris',2,'Fitri Rayani Siregar,M.Hum.','S1',1557554873,1557554873],
            [9,'84202','Tadris/ Pendidikan Matematika',2,'Suparni,S.Si.,M.Pd.','S1',1557554873,1557554873],
            [10,'88204','Pendidikan  Bahasa Arab',2,'Muhammad Yusuf Pulungan,M.A.','S1',1557554873,1557554873],
            [11,'86232','PGMI',2,'Nursyaidah,M.Pd.','S1',1557554873,1557554873],
            [12,'86233','PIAUD',2,'Drs.H.Abdul Sattar Daulay,M.Ag','S1',1557554873,1557554873],

            [13,'70233','Komunikasi Penyiaran Islam',3,'Risdawati Siregar,S.Ag,M.Pd','S1',1557554873,1557554873],
            [14,'70230','Manajemen Dakwah',3,'H.Ali Anas Nasution,M.A.','S1',1557554873,1557554873],
            [15,'70232','Bimbingan Konseling Islam',3,'Maslina Daulay,MA.','S1',1557554873,1557554873],
            [16,'70231','Pengembangan Masyarakat Islam',3,'H.Ali Anas Nasution,M.A.','S1',1557554873,1557554873],

            [17,'60202','Perbankan Syariah',4,'Nofinawati,M.A.','S1',1557554873,1557554873],
            [18,'61206','Ekonomi Syariah',4,'Delima Sari Lubis,M.A.','S1',1557554873,1557554873],

        ];
        $this->batchInsert('{{%program_studi}}',['id','kode','nama','id_fakultas_akademi','kaprodi','jenjang','created_at','updated_at'],$data);
    }

    private function deleteTabelProdi()
    {
        $this->delete('{{%program_studi}}',['id'=>1]);
    }

    private function deleteTabelFakultas()
    {
        $this->delete('{{%fakultas_akademi}}',['id'=>1]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190611_132021_add_data_perguruan_tinggi cannot be reverted.\n";

        return false;
    }
    */
}
