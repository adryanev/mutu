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
        $this->addToTabelFakultas();
        $this->addToTabelProdi();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190611_132021_add_data_perguruan_tinggi cannot be reverted.\n";

        return false;
    }

    private function addToTabelFakultas()
    {
        $data = [
            [1,'FST','Sains dan Teknologi','Dr. ADAkdakdakdka',0,0],
            [],
            [],

        ];

        $this->batchInsert('{{%fakultas_akademi}}',['id','kode','nama','dekan','created_at','updated_at'],$data);
    }

    private function addToTabelProdi()
    {
        $data = [
            [1,'925829','Teknik Informatika',1,'Dr. asdakdadad','S1',0,0],
            [],
            [],
        ];
        $this->batchInsert('{{%program_studi}}',['id','kode','nama','id_fakultas_akademi','kaprodi','jenjang','created_at','updated_at'],$data);
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
