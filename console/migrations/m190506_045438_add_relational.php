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

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190506_045438_add_relational cannot be reverted.\n";

        return false;
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
