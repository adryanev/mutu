<?php

use yii\db\Migration;

/**
 * Class m190520_044427_insert_isian_borang
 */
class m190520_044427_insert_isian_borang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $data = [
            [1,'3.2','template-3.2.xlsx','prodi',1557554873,1557554873],
            [2,'3.3.1','template-3.3.1.xlsx','prodi',1557554873,1557554873],
            [3,'4.5.1','template-4.5.1.xlsx','prodi',1557554873,1557554873],
            [4,'4.5.2','template-4.5.2.xlsx','prodi',1557554873,1557554873],
            [5,'4.5.5','template-4.5.5.xlsx','prodi',1557554873,1557554873],
            [6,'5.1.2.2','template-5.1.2.2.xlsx','prodi',1557554873,1557554873],
            [7,'5.1.4','template-5.1.4.xlsx','prodi',1557554873,1557554873],
            [8,'5.2','template-5.2.xlsx','prodi',1557554873,1557554873],
            [9,'5.4.2','template-5.4.2.xlsx','prodi',1557554873,1557554873],
            [10,'5.6','template-5.6.xlsx','prodi',1557554873,1557554873],
            [11,'5.7','template-5.7.xlsx','prodi',1557554873,1557554873],
            [12,'6.2.1','template-6.2.1.xlsx','prodi',1557554873,1557554873],
            [13,'6.3.1','template-6.3.1.xlsx','prodi',1557554873,1557554873],
            [14,'6.3.2','template-6.3.2.xlsx','prodi',1557554873,1557554873],
            [15,'6.3.3','template-6.3.3.xlsx','prodi',1557554873,1557554873],
            [16,'6.3.7','template-6.3.7.xlsx','prodi',1557554873,1557554873],
            [17,'6.4.3','template-6.4.3.xlsx','prodi',1557554873,1557554873],
            [18,'6.5.2','template-6.5.2.xlsx','prodi',1557554873,1557554873],
            [19,'7.1.1','template-7.1.1.xlsx','prodi',1557554873,1557554873],
            [20,'7.1.3','template-7.1.3.xlsx','prodi',1557554873,1557554873],
            [21,'7.1.4','template-7.1.4.xlsx','prodi',1557554873,1557554873],
            [22,'7.2.1','template-7.2.1.xlsx','prodi',1557554873,1557554873],
            [23,'7.3.1','template-7.3.1.xlsx','prodi',1557554873,1557554873],
            [24,'7.3.2','template-7.3.2.xlsx','prodi',1557554873,1557554873],
            [25,'7.3.2','template-7.3.2.xlsx','fakultas',1557554873,1557554873],
            [26,'6.3.7','template-6.3.7.xlsx','institusi',1557554873,1557554873],
        ];

        $this->batchInsert('{{%s7_isian_borang}}',['id','nomor_borang','nama_file','untuk','created_at','updated_at'],$data);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190520_044427_insert_isian_borang cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190520_044427_insert_isian_borang cannot be reverted.\n";

        return false;
    }
    */
}
