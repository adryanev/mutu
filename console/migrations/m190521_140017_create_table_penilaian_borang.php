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
        $this->penilaianBorangProdiS1();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
      $this->hapusPenilaianBorangProdiS1();
    }

    private function penilaianBorangProdiS1()
    {

        $this->createTable('{{%s7_penilaian_prodi_s1}}', [
            'id' => $this->primaryKey(),
            'id_akreditasi_prodi_s1' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->createTable('{{%s7_penilaian_borang_prodi_s1}}', [
            'id' => $this->primaryKey(),
            'id_penilaian_prodi_s1' => $this->integer(),
            'total' => $this->float(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->createTable('{{%s7_penilaian_borang_prodi_s1_standar1}}', [
            'id' => $this->primaryKey(),
            'id_pnl_brg_prd_s1'=>$this->integer(),
            'aspek' => $this->string(),
            'nilai' => $this->integer(),
            'bobot_nilai' => $this->float(),
            'informasi'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()

        ]);

        $this->createTable('{{%s7_penilaian_borang_prodi_s1_standar2}}', [
            'id' => $this->primaryKey(),
            'id_pnl_brg_prd_s1'=>$this->integer(),
            'aspek' => $this->string(),
            'nilai' => $this->integer(),
            'bobot_nilai' => $this->float(),
            'informasi'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()

        ]);

        $this->createTable('{{%s7_penilaian_borang_prodi_s1_standar3}}', [
            'id' => $this->primaryKey(),
            'id_pnl_brg_prd_s1'=>$this->integer(),
            'aspek' => $this->string(),
            'nilai' => $this->integer(),
            'bobot_nilai' => $this->float(),
            'informasi'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()

        ]);

        $this->createTable('{{%s7_penilaian_borang_prodi_s1_standar4}}', [
            'id' => $this->primaryKey(),
            'id_pnl_brg_prd_s1'=>$this->integer(),
            'aspek' => $this->string(),
            'nilai' => $this->integer(),
            'bobot_nilai' => $this->float(),
            'informasi'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()

        ]);

        $this->createTable('{{%s7_penilaian_borang_prodi_s1_standar5}}', [
            'id' => $this->primaryKey(),
            'id_pnl_brg_prd_s1'=>$this->integer(),
            'aspek' => $this->string(),
            'nilai' => $this->integer(),
            'bobot_nilai' => $this->float(),
            'informasi'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()

        ]);

        $this->createTable('{{%s7_penilaian_borang_prodi_s1_standar6}}', [
            'id' => $this->primaryKey(),
            'id_pnl_brg_prd_s1'=>$this->integer(),
            'aspek' => $this->string(),
            'nilai' => $this->integer(),
            'bobot_nilai' => $this->float(),
            'informasi'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()

        ]);
        $this->createTable('{{%s7_penilaian_borang_prodi_s1_standar7}}', [
            'id' => $this->primaryKey(),
            'id_pnl_brg_prd_s1'=>$this->integer(),
            'aspek' => $this->string(),
            'nilai' => $this->integer(),
            'bobot_nilai' => $this->float(),
            'informasi'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->addForeignKey('fk-penilaian_prodi_s1-akreditasi_prodi_s1','{{%s7_penilaian_prodi_s1}}','id_akreditasi_prodi_s1','{{%s7_akreditasi_prodi_s1}}','id');
        $this->addForeignKey('fk-pnl_brg_prodi_s1_','{{%s7_penilaian_borang_prodi_s1}}','id_penilaian_prodi_s1','{{%s7_penilaian_prodi_s1}}','id');

        $this->addForeignKey('fk-pnl_brg_prd_s1_std1-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar1}}','id_pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std2-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar2}}','id_pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std3-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar3}}','id_pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std4-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar4}}','id_pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std5-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar5}}','id_pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std6-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar6}}','id_pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std7-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar7}}','id_pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1}}','id');

        $this->addForeignKey('fk-pnl_brg_prd_s1_std1-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar1}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std2-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar2}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std3-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar3}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std4-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar4}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std5-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar5}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std6-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar6}}','created_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std7-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar7}}','created_by','{{%user}}','id');

        $this->addForeignKey('fk-pnl_brg_prd_s1_std1-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar1}}','updated_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std2-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar2}}','updated_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std3-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar3}}','updated_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std4-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar4}}','updated_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std5-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar5}}','updated_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std6-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar6}}','updated_by','{{%user}}','id');
        $this->addForeignKey('fk-pnl_brg_prd_s1_std7-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar7}}','updated_by','{{%user}}','id');
    }

    private function hapusPenilaianBorangProdiS1()
    {

        $this->dropForeignKey('fk-penilaian_prodi_s1-akreditasi_prodi_s1','{{%s7_penilaian_prodi_s1}}');
        $this->dropForeignKey('fk-pnl_brg_prodi_s1_','{{%s7_penilaian_borang_prodi_s1}}');

        $this->dropForeignKey('fk-pnl_brg_prd_s1_std1-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar1}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std2-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar2}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std3-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar3}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std4-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar4}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std5-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar5}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std6-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar6}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std7-pnl_brg_prd_s1','{{%s7_penilaian_borang_prodi_s1_standar7}}');

        $this->dropForeignKey('fk-pnl_brg_prd_s1_std1-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar1}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std2-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar2}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std3-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar3}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std4-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar4}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std5-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar5}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std6-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar6}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std7-usr-crd','{{%s7_penilaian_borang_prodi_s1_standar7}}');

        $this->dropForeignKey('fk-pnl_brg_prd_s1_std1-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar1}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std2-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar2}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std3-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar3}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std4-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar4}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std5-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar5}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std6-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar6}}');
        $this->dropForeignKey('fk-pnl_brg_prd_s1_std7-usr-upd','{{%s7_penilaian_borang_prodi_s1_standar7}}');



        $this->dropTable('{{%s7_penilaian_borang_prodi_s1_standar1}}');
        $this->dropTable('{{%s7_penilaian_borang_prodi_s1_standar2}}');
        $this->dropTable('{{%s7_penilaian_borang_prodi_s1_standar3}}');
        $this->dropTable('{{%s7_penilaian_borang_prodi_s1_standar4}}');
        $this->dropTable('{{%s7_penilaian_borang_prodi_s1_standar5}}');
        $this->dropTable('{{%s7_penilaian_borang_prodi_s1_standar6}}');
        $this->dropTable('{{%s7_penilaian_borang_prodi_s1_standar7}}');

        $this->dropTable('{{%s7_penilaian_prodi_s1}}');

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
