<?php

use yii\db\Migration;

/**
 * Class m190521_140017_create_table_penilaian_borang
 */
class m190521_140017_create_table_penilaian_borang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%penilaian}}',[

        ]);
        $this->createTableProdi();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190521_140017_create_table_penilaian_borang cannot be reverted.\n";

        return false;
    }

    private function createTableProdi()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190521_140017_create_table_penilaian_borang cannot be reverted.\n";

        return false;
    }
    */
}
