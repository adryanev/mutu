<?php

use yii\db\Migration;

/**
 * Class m190429_191120_init_mutu_database
 */
class m190429_191120_init_mutu_database extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('{{%fakultas}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);


        $this->createTable('{{%program}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);

        $this->createTable('{{%program_studi}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'id_program'=>$this->integer(),
            'id_fakultas'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%unit}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%unit}}');
       $this->dropTable('{{%program_studi}}');
       $this->dropTable('{{%program}}');
       $this->dropTable('{{%fakultas}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190429_191120_init_mutu_database cannot be reverted.\n";

        return false;
    }
    */
}
