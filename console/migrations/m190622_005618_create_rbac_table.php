<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rbac}}`.
 */
class m190622_005618_create_rbac_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%rbac}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%rbac}}');
    }
}
