<?php

use yii\db\Migration;

/**
 * Class m190518_145048_insert_jenis_akreditasi
 */
class m190518_145048_insert_jenis_akreditasi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $data = [
            [1,'Institusi',1557554873,1557554873],
            [2,'Program Studi',1557554873,1557554873],
        ];

        $this->batchInsert('{{%jenis_akreditasi}}',['id','nama','created_at','updated_at'],$data);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->delete('{{%jenis_akreditasi}}',['id'=>2]);
       $this->delete('{{%jenis_akreditasi}}',['id'=>1]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190518_145048_insert_jenis_akreditasi cannot be reverted.\n";

        return false;
    }
    */
}
