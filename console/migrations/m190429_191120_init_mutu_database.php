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

        $this->createTable('{{%fakultas_akademi}}',[
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
            'id_fakultas_akademi'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%unit}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%jenis_akreditasi}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->createTable('{{%akreditasi}}',[
            'id'=>$this->primaryKey(),
            'nama'=>$this->string(),
            'tahun'=>$this->string(4),
            'id_jenis_akreditasi'=>$this->integer(),
            'lembaga'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%akreditasi_prodi_diploma}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_prodi'=>$this->integer(),
            'progress'=>$this->float(),
            'peringkat'=>$this->char(1),
            'skor'=>$this->integer(3),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->createTable('{{%akreditasi_prodi_s1}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_prodi'=>$this->integer(),
            'progress'=>$this->float(),
            'peringkat'=>$this->char(1),
            'skor'=>$this->integer(3),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->createTable('{{%akreditasi_prodi_s2}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_prodi'=>$this->integer(),
            'progress'=>$this->float(),
            'peringkat'=>$this->char(1),
            'skor'=>$this->integer(3),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->createTable('{{%akreditasi_prodi_s3}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'id_prodi'=>$this->integer(),
            'progress'=>$this->float(),
            'peringkat'=>$this->char(1),
            'skor'=>$this->integer(3),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);


        $this->createTable('{{%akreditasi_institusi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi'=>$this->integer(),
            'progress'=>$this->float(),
            'peringkat'=>$this->char(1),
            'skor'=>$this->integer(3),
            'created_at'=>$this->integer(),
            'updated_at'=> $this->integer(),
        ]);

        $this->createTable('{{%borang_diploma_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_diploma'=>$this->integer(),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);
        $this->createTable('{{%borang_diploma_akademi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_diploma'=>$this->integer(),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%borang_s1_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%borang_s1_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);


        $this->createTable('{{%borang_s2_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s2'=>$this->integer(),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%borang_s2_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s2'=>$this->integer(),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%borang_s3_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s3'=>$this->integer(),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);

        $this->createTable('{{%borang_s3_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s3'=>$this->integer(),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);


        $this->createTable('{{%borang_s1_prodi_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi'=>$this->integer(),
            '_1_1'=>$this->text()->comment('Visi, Misi, Sasaran, serta Strategi Pencapaian'),
            '_1_1_1'=>$this->text()->comment('Mekanisme penyusunan visi, misi, tujuan dan sasaran program studi, serta pihak-pihak yang dilibatkan'),
            '_1_1_2'=>$this->text()->comment('Visi'),
            '_1_1_3'=>$this->text()->comment('Misi'),
            '_1_1_4'=>$this->text()->comment('Tujuan'),
            '_1_1_5'=>$this->text()->comment('Sasaran dan Strategi Pencapaian'),
            '_1_2'=>$this->text()->comment('Sosialisasi'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%borang_s1_prodi_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi'=>$this->integer(),
            '_2_1'=>$this->text()->comment('Sistem Tata Pamong'),
            '_2_2'=>$this->text()->comment('Kepemimpinan'),
            '_2_3'=>$this->text()->comment('Sistem Pengelolaan'),
            '_2_4'=>$this->text()->comment('Penjaminan Mutu'),
            '_2_5'=>$this->text()->comment('Umpan Balik'),
            '_2_6'=>$this->text()->comment('Keberlanjutan'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%borang_s1_prodi_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi'=>$this->integer(),
            '_3_1'=>$this->text()->comment('Profil Mahasiswa dan Lulusan'),
            '_3_1_1'=>$this->text()->comment('Profil Mahasiswa dan Lulusan'),
            '_3_1_2'=>$this->text()->comment('Tabel data mahasiswa non-reguler(2) dalam lima tahun terakhir'),
            '_3_1_3'=>$this->text()->comment('Pencapaian prestasi/reputasi mahasiswa dalam tiga tahun terakhir di bidang akademik dan non-akademik'),
            '_3_1_4'=>$this->text()->comment('Tabel data jumlah mahasiswa reguler tujuh tahun terakhir'),
            '_3_2'=>$this->text()->comment('Layanan kepada Mahasiswa'),
            '_3_3'=>$this->text()->comment('Evaluasi Lulusan'),
            '_3_3_1'=>$this->text()->comment('Evaluasi Kinerja lulusan oleh Pihak Pengguna Lulusan'),
            '_3_3_2'=>$this->text()->comment('Rata-rata waktu tunggu lulusan untuk memperoleh pekerjaan yang pertama = … bulan '),
            '_3_3_3'=>$this->text()->comment('Persentase lulusan yang bekerja pada bidang yang sesuai dengan keahliannya = … %'),
            '_3_4'=>$this->text()->comment('Himpunan Alumni'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%borang_s1_prodi_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi'=>$this->integer(),
            '_4_1'=>$this->text()->comment('Sistem Seleksi dan Pengembangan'),
            '_4_2'=>$this->text()->comment('Monitoring dan Evaluasi'),
            '_4_3'=>$this->text()->comment('Dosen Tetap'),
            '_4_3_1'=>$this->text()->comment('Data dosen tetap yang bidang keahliannya sesuai dengan bidang PS'),
            '_4_3_2'=>$this->text()->comment('Data dosen tetap yang bidang keahliannya di luar bidang PS'),
            '_4_3_3'=>$this->text()->comment('Aktivitas dosen tetap yang bidang bidang keahliannya sesuai dengan PS'),
            '_4_3_4'=>$this->text()->comment('Data aktivitas mengajar dosen tetap'),
            '_4_3_5'=>$this->text()->comment('Data aktivitas mengajar dosen tetap yang bidang keahliannya di luar PS, dalam satu tahun akademik terakhir di PS'),
            '_4_4'=>$this->text()->comment('Data Dosen Tidak Tetap'),
            '_4_4_1'=>$this->text()->comment('Dosen Tidak Tetap'),
            '_4_4_2'=>$this->text()->comment('Data Aktivistas Mengajar Dosen Tidak Tetap Satu Tahun Terakhir'),
            '_4_5'=>$this->text()->comment('Upaya Peningkatan Sumber Daya Manusia (SDM) dalam tiga tahun terakhir'),
            '_4_5_1'=>$this->text()->comment('Kegiatan Tenaga Ahli/Pakar sebagai Pembicara dalam Seminar/Pelatihan'),
            '_4_5_2'=>$this->text()->comment('Peningkatan kemampuan dosen tetap melalui program tugas belajar dalam bidang yang sesuai dengan bidang PS'),
            '_4_5_3'=>$this->text()->comment('Kegiatan dosen tetap yang bidang keahliannya sesuai dengan PS dalam seminar ilmiah/lokakarya/penataran/workshop/ pagelaran/ pameran/peragaan yang tidak hanya melibatkan dosen PT sendiri'),
            '_4_5_4'=>$this->text()->comment('Sebutkan pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat)'),
            '_4_5_5'=>$this->text()->comment('Sebutkan keikutsertaan dosen tetap dalam organisasi keilmuan atau organisasi profesi'),
            '_4_6'=>$this->text()->comment('Tenaga kependidikan'),
            '_4_6_1'=>$this->text()->comment('Data tenaga kependidikan yang ada di PS, Jurusan, Fakultas atau PT yang melayani mahasiswa PS Tuliskan data tenaga kependidikan yang ada di PS, Jurusan, Fakultas atau PT yang melayani mahasiswa PS'),
            '_4_6_2'=>$this->text()->comment('Jelaskan upaya yang telah dilakukan PS dalam meningkatkan kualifikasi dan kompetensi tenaga kependidikan, dalam hal pemberian kesempatan belajar/pelatihan, pemberian fasilitas termasuk dana, dan jenjang karir'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%borang_s1_prodi_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi'=>$this->integer(),
            '_5_1'=>$this->text()->comment('Kurikulum'),
            '_5_1_1'=>$this->text()->comment('Kompetensi'),
            '_5_1_1_1'=>$this->text()->comment('Uraikan secara ringkas kompetensi utama lulusan'),
            '_5_1_1_2'=>$this->text()->comment('Uraikan secara ringkas kompetensi pendukung lulusan'),
            '_5_1_1_3'=>$this->text()->comment('Uraikan secara ringkas kompetensi lainnya/pilihan lulusan'),
            '_5_1_2'=>$this->text()->comment('Struktur Kurikulum'),
            '_5_1_2_1'=>$this->text()->comment('Jumlah sks PS (minimum untuk kelulusan) : … sks yang tersusun sebagai berikut'),
            '_5_1_2_2'=>$this->text()->comment('Struktur kurikulum berdasarkan urutan mata kuliah (MK) semester demi semester'),
            '_5_1_3'=>$this->text()->comment('Mata kuliah pilihan yang dilaksanakan dalam tiga tahun terakhir'),
            '_5_1_4'=>$this->text()->comment('Substansi praktikum/praktek yang mandiri ataupun yang merupakan bagian dari mata kuliah tertentu'),
            '_5_2'=>$this->text()->comment('Peninjauan Kurikulum dalam 5 Tahun Terakhir'),
            '_5_3'=>$this->text()->comment('Peninjauan Kurikulum dalam 5 Tahun Terakhir'),
            '_5_3_1'=>$this->text()->comment('Mekanisme Penyusunan Materi Kuliah dan Monitoring Perkuliahan'),
            '_5_3_2'=>$this->text()->comment('Contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian berikut silabusnya'),
            '_5_4'=>$this->text()->comment('Sistem Pembimbingan Akademik'),
            '_5_4_1'=>$this->text()->comment('Dosen PA dan Jumlah Mahasiswa'),
            '_5_4_2'=>$this->text()->comment('Jelaskan proses pembimbingan akademik yang diterapkan pada Program Studi ini dalam hal-hal berikut:'),
            '_5_5'=>$this->text()->comment('Pembimbingan Tugas Akhir / Skripsi'),
            '_5_5_1'=>$this->text()->comment('Jelaskan pelaksanaan pembimbingan Tugas Akhir atau Skripsi yang diterapkan pada PS ini'),
            '_5_5_2'=>$this->text()->comment('Rata-rata lama penyelesaian tugas akhir/skripsi pada tiga tahun terakhir'),
            '_5_6'=>$this->text()->comment('Upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya'),
            '_5_7'=>$this->text()->comment('Upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya'),
            '_5_7_1'=>$this->text()->comment('Gambaran yang jelas mengenai upaya dan kegiatan untuk menciptakan suasana akademik yang kondusif di lingkungan PS'),
            '_5_7_2'=>$this->text()->comment('Ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika'),
            '_5_7_3'=>$this->text()->comment('Program dan kegiatan di dalam dan di luar proses pembelajaran, yang dilaksanakan baik di dalam maupun di luar kelas, untuk menciptakan suasana akademik yang kondusif (misalnya seminar, simposium, lokakarya, bedah buku, penelitian bersama, pengenalan kehidupan kampus, dan temu dosen-mahasiswa-alumni). 	'),
            '_5_7_4'=>$this->text()->comment('Interaksi akademik antara dosen-mahasiswa, antar mahasiswa, serta antar dosen'),
            '_5_7_5'=>$this->text()->comment('Pengembangan perilaku kecendikiawanan'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%borang_s1_prodi_standar5}}');
        $this->dropTable('{{%borang_s1_prodi_standar4}}');
        $this->dropTable('{{%borang_s1_prodi_standar3}}');
        $this->dropTable('{{%borang_s1_prodi_standar2}}');
        $this->dropTable('{{%borang_s1_prodi_standar1}}');
        $this->dropTable('{{%borang_s3_fakultas}}');
        $this->dropTable('{{%borang_s3_prodi}}');
        $this->dropTable('{{%borang_s2_fakultas}}');
        $this->dropTable('{{%borang_s2_prodi}}');
        $this->dropTable('{{%borang_s1_fakultas}}');
        $this->dropTable('{{%borang_s1_prodi}}');
        $this->dropTable('{{%borang_diploma_akademi}}');
        $this->dropTable('{{%borang_diploma_prodi}}');
        $this->dropTable('{{%akreditasi_institusi}}');
        $this->dropTable('{{%akreditasi_prodi_s3}}');
        $this->dropTable('{{%akreditasi_prodi_s2}}');
        $this->dropTable('{{%akreditasi_prodi_s1}');
        $this->dropTable('{{%akreditasi_prodi_diploma}}');
        $this->dropTable('{{%akreditasi}}');
        $this->dropTable('{{%jenis_akreditasi}}');
        $this->dropTable('{{%unit}}');
        $this->dropTable('{{%program_studi}}');
        $this->dropTable('{{%program}}');
        $this->dropTable('{{%fakultas_akademi}}');
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
