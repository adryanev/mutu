<?php

use yii\db\Migration;

/**
 * Class m190511_141319_add_relation_to_standar
 */
class m190511_141319_add_relation_to_standar extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->borangS1Prodi();
        $this->borangS1Fakultas();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->borangS1ProdiDelete();
        $this->borangS1FakultasDelete();

    }

    private function borangS1Prodi()
    {
        $this->addForeignKey('fk-borang_s1_prodi_standar1-usr_crt','{{%s7_borang_s1_prodi_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_prodi_standar1-usr_upd','{{%s7_borang_s1_prodi_standar1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_prodi_standar2-usr_crt','{{%s7_borang_s1_prodi_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_prodi_standar2-usr_upd','{{%s7_borang_s1_prodi_standar2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_prodi_standar3-usr_crt','{{%s7_borang_s1_prodi_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_prodi_standar3-usr_upd','{{%s7_borang_s1_prodi_standar3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_prodi_standar4-usr_crt','{{%s7_borang_s1_prodi_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_prodi_standar4-usr_upd','{{%s7_borang_s1_prodi_standar4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_prodi_standar5-usr_crt','{{%s7_borang_s1_prodi_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_prodi_standar5-usr_upd','{{%s7_borang_s1_prodi_standar5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_prodi_standar6-usr_crt','{{%s7_borang_s1_prodi_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_prodi_standar6-usr_upd','{{%s7_borang_s1_prodi_standar6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_prodi_standar7-usr_crt','{{%s7_borang_s1_prodi_standar7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_prodi_standar7-usr_upd','{{%s7_borang_s1_prodi_standar7}}','updated_by','{{%user}}','id');



        $this->addForeignKey('fk-d_borang_s1_prodi_standar1-usr_crt','{{%s7_detail_borang_s1_prodi_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_prodi_standar1-usr_upd','{{%s7_detail_borang_s1_prodi_standar1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_prodi_standar2-usr_crt','{{%s7_detail_borang_s1_prodi_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_prodi_standar2-usr_upd','{{%s7_detail_borang_s1_prodi_standar2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_prodi_standar3-usr_crt','{{%s7_detail_borang_s1_prodi_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_prodi_standar3-usr_upd','{{%s7_detail_borang_s1_prodi_standar3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_prodi_standar4-usr_crt','{{%s7_detail_borang_s1_prodi_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_prodi_standar4-usr_upd','{{%s7_detail_borang_s1_prodi_standar4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_prodi_standar5-usr_crt','{{%s7_detail_borang_s1_prodi_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_prodi_standar5-usr_upd','{{%s7_detail_borang_s1_prodi_standar5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_prodi_standar6-usr_crt','{{%s7_detail_borang_s1_prodi_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_prodi_standar6-usr_upd','{{%s7_detail_borang_s1_prodi_standar6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_prodi_standar7-usr_crt','{{%s7_detail_borang_s1_prodi_standar7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_prodi_standar7-usr_upd','{{%s7_detail_borang_s1_prodi_standar7}}','updated_by','{{%user}}','id');
    }

    private function borangS1Fakultas()
    {
        $this->addForeignKey('fk-borang_s1_fakultas_standar1-usr_crt','{{%s7_borang_s1_fakultas_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_fakultas_standar1-usr_upd','{{%s7_borang_s1_fakultas_standar1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_fakultas_standar2-usr_crt','{{%s7_borang_s1_fakultas_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_fakultas_standar2-usr_upd','{{%s7_borang_s1_fakultas_standar2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_fakultas_standar3-usr_crt','{{%s7_borang_s1_fakultas_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_fakultas_standar3-usr_upd','{{%s7_borang_s1_fakultas_standar3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_fakultas_standar4-usr_crt','{{%s7_borang_s1_fakultas_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_fakultas_standar4-usr_upd','{{%s7_borang_s1_fakultas_standar4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_fakultas_standar5-usr_crt','{{%s7_borang_s1_fakultas_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_fakultas_standar5-usr_upd','{{%s7_borang_s1_fakultas_standar5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_fakultas_standar6-usr_crt','{{%s7_borang_s1_fakultas_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_fakultas_standar6-usr_upd','{{%s7_borang_s1_fakultas_standar6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-borang_s1_fakultas_standar7-usr_crt','{{%s7_borang_s1_fakultas_standar7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-borang_s1_fakultas_standar7-usr_upd','{{%s7_borang_s1_fakultas_standar7}}','updated_by','{{%user}}','id');



        $this->addForeignKey('fk-d_borang_s1_fakultas_standar1-usr_crt','{{%s7_detail_borang_s1_fakultas_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar1-usr_upd','{{%s7_detail_borang_s1_fakultas_standar1}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_fakultas_standar2-usr_crt','{{%s7_detail_borang_s1_fakultas_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar2-usr_upd','{{%s7_detail_borang_s1_fakultas_standar2}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_fakultas_standar3-usr_crt','{{%s7_detail_borang_s1_fakultas_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar3-usr_upd','{{%s7_detail_borang_s1_fakultas_standar3}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_fakultas_standar4-usr_crt','{{%s7_detail_borang_s1_fakultas_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar4-usr_upd','{{%s7_detail_borang_s1_fakultas_standar4}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_fakultas_standar5-usr_crt','{{%s7_detail_borang_s1_fakultas_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar5-usr_upd','{{%s7_detail_borang_s1_fakultas_standar5}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_fakultas_standar6-usr_crt','{{%s7_detail_borang_s1_fakultas_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar6-usr_upd','{{%s7_detail_borang_s1_fakultas_standar6}}','updated_by','{{%user}}','id');

        $this->addForeignKey('fk-d_borang_s1_fakultas_standar7-usr_crt','{{%s7_detail_borang_s1_fakultas_standar7}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-d_borang_s1_fakultas_standar7-usr_upd','{{%s7_detail_borang_s1_fakultas_standar7}}','updated_by','{{%user}}','id');
    }

    private function borangS1ProdiDelete()
    {


        $this->dropForeignKey('fk-borang_s1_prodi_standar1-usr_crt','{{%s7_borang_s1_prodi_standar1}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar1-usr_upd','{{%s7_borang_s1_prodi_standar1}}');

        $this->dropForeignKey('fk-borang_s1_prodi_standar2-usr_crt','{{%s7_borang_s1_prodi_standar2}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar2-usr_upd','{{%s7_borang_s1_prodi_standar2}}');

        $this->dropForeignKey('fk-borang_s1_prodi_standar3-usr_crt','{{%s7_borang_s1_prodi_standar3}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar3-usr_upd','{{%s7_borang_s1_prodi_standar3}}');

        $this->dropForeignKey('fk-borang_s1_prodi_standar4-usr_crt','{{%s7_borang_s1_prodi_standar4}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar4-usr_upd','{{%s7_borang_s1_prodi_standar4}}');

        $this->dropForeignKey('fk-borang_s1_prodi_standar5-usr_crt','{{%s7_borang_s1_prodi_standar5}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar5-usr_upd','{{%s7_borang_s1_prodi_standar5}}');

        $this->dropForeignKey('fk-borang_s1_prodi_standar6-usr_crt','{{%s7_borang_s1_prodi_standar6}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar6-usr_upd','{{%s7_borang_s1_prodi_standar6}}');

        $this->dropForeignKey('fk-borang_s1_prodi_standar7-usr_crt','{{%s7_borang_s1_prodi_standar7}}');
        $this->dropForeignKey('fk-borang_s1_prodi_standar7-usr_upd','{{%s7_borang_s1_prodi_standar7}}');



        $this->dropForeignKey('fk-d_borang_s1_prodi_standar1-usr_crt','{{%s7_detail_borang_s1_prodi_standar1}}');
        $this->dropForeignKey('fk-d_borang_s1_prodi_standar1-usr_upd','{{%s7_detail_borang_s1_prodi_standar1}}');

        $this->dropForeignKey('fk-d_borang_s1_prodi_standar2-usr_crt','{{%s7_detail_borang_s1_prodi_standar2}}');
        $this->dropForeignKey('fk-d_borang_s1_prodi_standar2-usr_upd','{{%s7_detail_borang_s1_prodi_standar2}}');

        $this->dropForeignKey('fk-d_borang_s1_prodi_standar3-usr_crt','{{%s7_detail_borang_s1_prodi_standar3}}');
        $this->dropForeignKey('fk-d_borang_s1_prodi_standar3-usr_upd','{{%s7_detail_borang_s1_prodi_standar3}}');

        $this->dropForeignKey('fk-d_borang_s1_prodi_standar4-usr_crt','{{%s7_detail_borang_s1_prodi_standar4}}');
        $this->dropForeignKey('fk-d_borang_s1_prodi_standar4-usr_upd','{{%s7_detail_borang_s1_prodi_standar4}}');

        $this->dropForeignKey('fk-d_borang_s1_prodi_standar5-usr_crt','{{%s7_detail_borang_s1_prodi_standar5}}');
        $this->dropForeignKey('fk-d_borang_s1_prodi_standar5-usr_upd','{{%s7_detail_borang_s1_prodi_standar5}}');

        $this->dropForeignKey('fk-d_borang_s1_prodi_standar6-usr_crt','{{%s7_detail_borang_s1_prodi_standar6}}');
        $this->dropForeignKey('fk-d_borang_s1_prodi_standar6-usr_upd','{{%s7_detail_borang_s1_prodi_standar6}}');

        $this->dropForeignKey('fk-d_borang_s1_prodi_standar7-usr_crt','{{%s7_detail_borang_s1_prodi_standar7}}');
        $this->dropForeignKey('fk-d_borang_s1_prodi_standar7-usr_upd','{{%s7_detail_borang_s1_prodi_standar7}}');
    }

    private function borangS1FakultasDelete()
    {

        $this->dropForeignKey('fk-borang_s1_fakultas_standar1-usr_crt','{{%s7_borang_s1_fakultas_standar1}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar1-usr_upd','{{%s7_borang_s1_fakultas_standar1}}');

        $this->dropForeignKey('fk-borang_s1_fakultas_standar2-usr_crt','{{%s7_borang_s1_fakultas_standar2}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar2-usr_upd','{{%s7_borang_s1_fakultas_standar2}}');

        $this->dropForeignKey('fk-borang_s1_fakultas_standar3-usr_crt','{{%s7_borang_s1_fakultas_standar3}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar3-usr_upd','{{%s7_borang_s1_fakultas_standar3}}');

        $this->dropForeignKey('fk-borang_s1_fakultas_standar4-usr_crt','{{%s7_borang_s1_fakultas_standar4}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar4-usr_upd','{{%s7_borang_s1_fakultas_standar4}}');

        $this->dropForeignKey('fk-borang_s1_fakultas_standar5-usr_crt','{{%s7_borang_s1_fakultas_standar5}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar5-usr_upd','{{%s7_borang_s1_fakultas_standar5}}');

        $this->dropForeignKey('fk-borang_s1_fakultas_standar6-usr_crt','{{%s7_borang_s1_fakultas_standar6}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar6-usr_upd','{{%s7_borang_s1_fakultas_standar6}}');

        $this->dropForeignKey('fk-borang_s1_fakultas_standar7-usr_crt','{{%s7_borang_s1_fakultas_standar7}}');
        $this->dropForeignKey('fk-borang_s1_fakultas_standar7-usr_upd','{{%s7_borang_s1_fakultas_standar7}}');



        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar1-usr_crt','{{%s7_detail_borang_s1_fakultas_standar1}}');
        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar1-usr_upd','{{%s7_detail_borang_s1_fakultas_standar1}}');

        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar2-usr_crt','{{%s7_detail_borang_s1_fakultas_standar2}}');
        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar2-usr_upd','{{%s7_detail_borang_s1_fakultas_standar2}}');

        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar3-usr_crt','{{%s7_detail_borang_s1_fakultas_standar3}}');
        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar3-usr_upd','{{%s7_detail_borang_s1_fakultas_standar3}}');

        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar4-usr_crt','{{%s7_detail_borang_s1_fakultas_standar4}}');
        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar4-usr_upd','{{%s7_detail_borang_s1_fakultas_standar4}}');

        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar5-usr_crt','{{%s7_detail_borang_s1_fakultas_standar5}}');
        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar5-usr_upd','{{%s7_detail_borang_s1_fakultas_standar5}}');

        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar6-usr_crt','{{%s7_detail_borang_s1_fakultas_standar6}}');
        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar6-usr_upd','{{%s7_detail_borang_s1_fakultas_standar6}}');

        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar7-usr_crt','{{%s7_detail_borang_s1_fakultas_standar7}}');
        $this->dropForeignKey('fk-d_borang_s1_fakultas_standar7-usr_upd','{{%s7_detail_borang_s1_fakultas_standar7}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190511_141319_add_relation_to_standar cannot be reverted.\n";

        return false;
    }
    */
}
