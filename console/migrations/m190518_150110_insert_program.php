<?php

use yii\db\Migration;

/**
 * Class m190518_150110_insert_program
 */
class m190518_150110_insert_program extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $data = [
            [2,'S2',1557554873,1557554873],
            [3,'S3',1557554873,1557554873],
            [4,'Diploma',1557554873,1557554873],
        ];

        $this->batchInsert('{{%program}}',['id','nama','created_at','updated_at'],$data);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%program}}',['id'=>4]);
        $this->delete('{{%program}}',['id'=>3]);
        $this->delete('{{%program}}',['id'=>2]);

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190518_150110_insert_program cannot be reverted.\n";

        return false;
    }
    */
}
