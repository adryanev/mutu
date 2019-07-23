<?php

use yii\db\Migration;

/**
 * Class m190723_094307_add_tabel_led
 */
class m190723_094307_add_tabel_led extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%k9_led_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi'=>$this->integer(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('{{%k9_led_prodi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190723_094307_add_tabel_led cannot be reverted.\n";

        return false;
    }
    */
}
