<?php

use yii\db\Migration;

/**
 * Class m190720_163106_add_k9_akreditasi
 */
class m190720_163106_add_k9_akreditasi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%k9_akreditasi}}',[

        ]);

        $this->createTable('{{%k9_akreditasi_prodi}}',[

        ]);


        $this->createTable('{{%k9_akreditasi_institusi}}',[

        ]);



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190720_163106_add_tabel_lkps_s1 cannot be reverted.\n";

        return false;
    }
    */
}
