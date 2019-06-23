<?php

use yii\db\Schema;
use yii\db\Migration;

class m190622_101027_auth_assignmentDataInsert extends Migration
{

    public function init()
    {
        $this->db = 'db';
        parent::init();
    }

    public function safeUp()
    {
        $this->batchInsert('{{%auth_assignment}}',
                           ["item_name", "user_id", "created_at"],
                            [
    [
        'item_name' => 'adminFakultas',
        'user_id' => '3',
        'created_at' => '1561181071',
    ],
    [
        'item_name' => 'adminInstitusi',
        'user_id' => '2',
        'created_at' => '1561181065',
    ],
    [
        'item_name' => 'adminProdi',
        'user_id' => '4',
        'created_at' => '1561181076',
    ],
    [
        'item_name' => 'superUser',
        'user_id' => '1',
        'created_at' => '1561169781',
    ],
    [
        'item_name' => 'userFakultas',
        'user_id' => '6',
        'created_at' => '1561181095',
    ],
    [
        'item_name' => 'userInstitusi',
        'user_id' => '5',
        'created_at' => '1561181084',
    ],
    [
        'item_name' => 'userProdi',
        'user_id' => '7',
        'created_at' => '1561181101',
    ],
]
        );
    }

    public function safeDown()
    {
        //$this->truncateTable('{{%auth_assignment}} CASCADE');
    }
}
