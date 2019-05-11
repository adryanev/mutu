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

        $this->createTable('{{%profil_user}}',[
            'id'=>$this->primaryKey(),
            'id_user'=>$this->integer(),
            'nama_lengkap'=>$this->string(),
            'id_fakultas'=>$this->integer(),
            'id_prodi'=>$this->integer(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);

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

        $this->createTable('{{%dokumen_borang_s1_prodi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('{{%borang_s1_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_prodi_s1'=>$this->integer(),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ]);
        $this->createTable('{{%dokumen_borang_s1_fakultas}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
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
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%detail_borang_s1_prodi_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi_standar1' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
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
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%detail_borang_s1_prodi_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi_standar2' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
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
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%detail_borang_s1_prodi_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi_standar3' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
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
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%detail_borang_s1_prodi_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi_standar4' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
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
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%detail_borang_s1_prodi_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi_standar5' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%borang_s1_prodi_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi'=>$this->integer(),
            '_6_1'=>$this->text()->comment('Pengelolaan Dana Keterlibatan aktif program studi harus tercerminkan dalam dokumen tentang proses perencanaan, pengelolaan dan pelaporan serta pertanggungjawaban penggunaan dana kepada pemangku kepentingan melalui mekanisme yang transparan dan akuntabel.'),
            '_6_2'=>$this->text()->comment('Perolehan dan Alokasi Dana.'),
            '_6_2_1'=>$this->text()->comment('Realisasi Perolehan dan Alokasi Dana.'),
            '_6_2_2'=>$this->text()->comment('Tuliskan dana untuk kegiatan penelitian pada tiga tahun terakhir yang melibatkan dosen yang bidang keahliannya sesuai dengan program studi.'),
            '_6_2_3'=>$this->text()->comment('Dana Kegiatan Pengabdian Kepada Masyarakat'),
            '_6_3_1'=>$this->text()->comment('Data ruang kerja dosen tetap yang bidang keahliannya sesuai dengan PS'),
            '_6_3_2'=>$this->text()->comment('Tuliskan data prasarana (kantor, ruang kelas, ruang laboratorium, studio, ruang perpustakaan, kebun percobaan, dsb. kecuali ruang dosen) yang dipergunakan PS dalam proses belajar mengajar dengan mengikuti format tabel berikut:'),
            '_6_3_3'=>$this->text()->comment('Data prasarana lain yang menunjang'),
            '_6_3_7'=>$this->text()->comment('Aksesibiltas Data'),
            '_6_4'=>$this->text()->comment('Sarana Pelaksanaan Kegiatan Akademik'),
            '_6_4_1'=>$this->text()->comment('Pustaka (buku teks, karya ilmiah, dan jurnal; termasuk juga dalam bentuk CD-ROM dan media lainnya)'),
            '_6_4_2'=>$this->text()->comment('Sumber-sumber pustaka di lembaga lain (lembaga perpustakaan/ sumber dari internet beserta alamat website) yang biasa diakses/dimanfaatkan oleh dosen dan mahasiswa program studi ini.'),
            '_6_4_3'=>$this->text()->comment('Tuliskan peralatan utama yang digunakan di laboratorium (tempat praktikum, bengkel, studio, ruang simulasi, rumah sakit, puskesmas/balai kesehatan, green house, lahan untuk pertanian, dan sejenisnya) yang dipergunakan dalam proses pembelajaran di jurusan/fakultas dengan mengikuti format tabel berikut:'),
            '_6_5'=>$this->text()->comment('Sistem Informasi '),
            '_6_5_1'=>$this->text()->comment('Jelaskan sistem informasi dan fasilitas yang digunakan oleh program studi untuk proses pembelajaran (hardware, software, e-learning, perpustakaan, dll.).'),
            '_6_5_2'=>$this->text()->comment('Aksesibilitas tiap jenis data'),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%detail_borang_s1_prodi_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi_standar6' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%borang_s1_prodi_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi'=>$this->integer(),
            '_7_1'=>$this->text()->comment('Penelitian Dosen Tetap yang Bidang Keahliannya Sesuai dengan PS.'),
            '_7_1_1'=>$this->text()->comment('Judul penelitian* yang sesuai dengan bidang keilmuan PS, yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS selama tiga tahun terakhir.'),
            '_7_1_2'=>$this->text()->comment('Mahasiswa tugas akhir yang dilibatkan dalam penelitian dosen dalam tiga tahun terakhir.'),
            '_7_1_3'=>$this->text()->comment('Judul artikel ilmiah/karya ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap yang bidang keahliannya sesuai dengan PS.'),
            '_7_1_4'=>$this->text()->comment('Karya dosen dan atau mahasiswa Program Studi yang telah memperoleh/sedang memproses perlindungan Hak atas Kekayaan Intelektual (HaKI) selama tiga tahun terakhir.'),
            '_7_2'=>$this->text()->comment('Kegiatan Pengabdian kepada Masyarakat'),
            '_7_2_1'=>$this->text()->comment('Pelayanan/Pengabdian kepada Masyarakat (*) yang sesuai dengan bidang keilmuan PS selama tiga tahun terakhir yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS'),
            '_7_2_2'=>$this->text()->comment('Mahasiswa yang dilibatkan dalam kegiatan pelayanan/pengabdian kepada masyarakat dalam tiga tahun terakhir'),
            '_7_3'=>$this->text()->comment('Kerjasama dengan Instansi Lain'),
            '_7_3_1'=>$this->text()->comment('Instansi dalam negeri yang menjalin kerjasama* yang terkait dengan program studi/jurusan dalam tiga tahun terakhir.'),
            '_7_3_2'=>$this->text()->comment('Instansi luar negeri yang menjalin kerjasama* yang terkait dengan program studi/jurusan dalam tiga tahun terakhir.'),
            'progress'=>$this->float(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%detail_borang_s1_prodi_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_prodi_standar7' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);


        $this->createTable('{{%borang_s1_fakultas_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            '_1_1'=>$this->text()->comment('Visi, misi, tujuan, dan sasaran serta strategi pencapaian Fakultas/Sekolah Tinggi'),
            '_1_1_1'=>$this->text()->comment('Visi'),
            '_1_1_2'=>$this->text()->comment('Misi'),
            '_1_1_3'=>$this->text()->comment('Tujuan'),
            '_1_1_4'=>$this->text()->comment('Sasaran dan Strategi Pencapaiannya'),
            '_1_2'=>$this->text()->comment('Upaya penyebaran/sosialisasi, serta tingkat pemahaman sivitas akademika (dosen dan mahasiswa) dan tenaga kependidikan tentang visi, misi dan tujuan Fakultas/Sekolah Tinggi.'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('{{%detail_borang_s1_fakultas_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas_standar1' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);


        $this->createTable('{{%borang_s1_fakultas_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            '_2_1'=>$this->text()->comment('Tata Pamong'),
            '_2_2'=>$this->text()->comment('Struktur Organisasi, Koordinasi dan Cara Kerja Fakultas/Sekolah Tinggi'),
            '_2_3'=>$this->text()->comment('Karakteristik kepemimpinan'),
            '_2_4'=>$this->text()->comment('Sistem Pengelolaan'),
            '_2_5'=>$this->text()->comment('Sistem Penjaminan Mutu Fakultas/Sekolah Tinggi'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);
        $this->createTable('{{%detail_borang_s1_fakultas_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas_standar2' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%borang_s1_fakultas_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            '_3_1'=>$this->text()->comment('Mahasiswa'),
            '_3_1_1'=>$this->text()->comment('Sistem Rekrutmen dan Seleksi Calon Mahasiswa Baru dan Efektivitasnya'),
            '_3_1_2'=>$this->text()->comment('Data mahasiswa reguler dan mahasiswa transfer untuk masing-masing program studi S1 pada TS (tahun akademik penuh yang terakhir) di Fakultas/Sekolah Tinggi'),
            '_3_1_3'=>$this->text()->comment('Uraikan alasan/pertimbangan Fakultas/Sekolah Tinggi dalam menerima mahasiswa transfer. Jelaskan pula alasan mahasiswa melakukan transfer.'),
            '_3_2'=>$this->text()->comment('Lulusan'),
            '_3_2_1'=>$this->text()->comment('Rata-rata masa studi dan rata-rata IPK lulusan selama tiga tahun terakhir dari mahasiswa reguler bukan transfer untuk tiap program studi S1 yang dikelola oleh Fakultas/Sekolah Tinggi'),
            '_3_2_2'=>$this->text()->comment('Pandangan Fakultas/Sekolah Tinggi tentang rara-rata masa studi dan rata-rata IPK lulusan, yang mencakup aspek : kewajaran, upaya pengembangan, dan upaya peningkatan mutu'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('{{%detail_borang_s1_fakultas_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas_standar3' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%borang_s1_fakultas_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            '_4_1'=>$this->text()->comment('Dosen tetap'),
            '_4_1_1'=>$this->text()->comment('Jumlah dosen tetap yang bidang keahliannya sesuai dengan masing-masing PS di lingkungan Fakultas/Sekolah Tinggi, berdasarkan jabatan fungsional dan pendidikan tertinggi'),
            '_4_1_2'=>$this->text()->comment('Banyaknya penggantian dan perekrutan serta pengembangan dosen tetap yang bidang keahliannya sesuai dengan program studi pada Fakultas/Sekolah Tinggi dalam tiga tahun terakhir'),
            '_4_1_3'=>$this->text()->comment('Pandangan Fakultas/Sekolah Tinggi tentang data pada butir 4.1.1 dan 4.1.2, yang mencakup aspek: kecukupan, kualifikasi, dan pengembangan karir'),
            '_4_2'=>$this->text()->comment('Tenaga kependidikan'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('{{%detail_borang_s1_fakultas_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas_standar4' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%borang_s1_fakultas_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            '_5_1'=>$this->text()->comment('Kurikulum'),
            '_5_2'=>$this->text()->comment('Pembelajaran'),
            '_5_3'=>$this->text()->comment('Suasana Akademik'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('{{%detail_borang_s1_fakultas_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas_standar5' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);
        $this->createTable('{{%borang_s1_fakultas_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            '_6_1'=>$this->text()->comment('Pembiayaan'),
            '_6_1_1'=>$this->text()->comment('Jumlah dana termasuk gaji dan upah yang diterima di Fakultas/Sekolah Tinggi selama tiga tahun terakhir'),
            '_6_1_2'=>$this->text()->comment('Pendapat pimpinan Fakultas/Sekolah Tinggi tentang perolehan dana pada butir 6.1.1, yang mencakup aspek: kecukupan dan upaya pengembangannya'),
            '_6_2'=>$this->text()->comment('Sarana'),
            '_6_2_1'=>$this->text()->comment('Penilaian Fakultas/Sekolah Tinggi tentang sarana untuk menjamin penyelenggaraan program Tridarma PT yang bermutu tinggi. Uraian ini mencakup aspek: kecukupan/ketersediaan/akses dan kewajaran serta rencana pengembangan dalam lima tahun mendatang.'),
            '_6_2_2'=>$this->text()->comment('Sarana tambahan untuk meningkatkan mutu penyelenggarakan program Tridarma PT pada semua program studi yang dikelola dalam tiga tahun terakhir.'),
            '_6_3'=>$this->text()->comment('Prasarana'),
            '_6_3_1'=>$this->text()->comment('Penilaian Fakultas/Sekolah Tinggi tentang prasarana yang telah dimiliki, khususnya yang digunakan untuk program-program studi. Uraian ini mencakup aspek: kecukupan dan kewajaran serta rencana pengembangan dalam lima tahun mendatang'),
            '_6_3_2'=>$this->text()->comment('Prasarana tambahan untuk semua program studi yang dikelola dalam tiga tahun terakhir. Uraikan pula rencana investasi untuk prasarana dalam lima tahun mendatang,'),
            '_6_4'=>$this->text()->comment('Sistem Informasi'),
            '_6_4_1'=>$this->text()->comment('Sistem informasi manajemen dan fasilitas ICT (Information and Communication Technology) yang digunakan Fakultas/Sekolah Tinggi untuk proses penyelenggaraan akademik dan administrasi (misalkan SIAKAD, SIMKEU, SIMAWA, SIMFA, SIMPEG dan sejenisnya), termasuk distance-learning.'),
            '_6_4_2'=>$this->text()->comment('Aksesibilitas tiap jenis data'),
            '_6_4_3'=>$this->text()->comment('Upaya penyebaran informasi/kebijakan untuk sivitas akademika di Fakultas/ Sekolah Tinggi (misalnya melalui surat, faksimili, mailing list, e-mail,sms, buletin).'),
            '_6_4_4'=>$this->text()->comment('Rencana pengembangan sistem informasi jangka panjang dan upaya pencapaiannya. Uraikan pula kendala-kendala yang dihadapi.'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ]);

        $this->createTable('{{%detail_borang_s1_fakultas_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas_standar6' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%borang_s1_fakultas_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas'=>$this->integer(),
            '_7_1'=>$this->text()->comment('Penelitian'),
            '_7_1_1'=>$this->text()->comment('Jumlah dan dana penelitian yang dilakukan oleh masing-masing PS di lingkungan Fakultas/Sekolah Tinggi dalam tiga tahun terakhir'),
            '_7_1_2'=>$this->text()->comment('Pandangan pimpinan Fakultas/Sekolah Tinggi tentang data pada butir 7.1.1, dalam perspektif: kesesuaian dengan Visi dan Misi, kecukupan, kewajaran, upaya pengembangan dan peningkatan mutu'),
            '_7_2'=>$this->text()->comment('Pelayanan/Pengabdian kepada Masyarakat'),
            '_7_2_1'=>$this->text()->comment('Jumlah dan dana kegiatan pelayanan/pengabdian kepada masyarakat yang dilakukan oleh masing-masing PS di lingkungan Fakultas dalam tiga tahun terakhir'),
            '_7_2_2'=>$this->text()->comment('Pandangan Fakultas/Sekolah Tinggi tentang data pada butir 7.2.1 dalam perspektif: kesesuaian dengan Visi dan Misi, kecukupan, kewajaran, upaya pengembangan dan peningkatan mutu'),
            '_7_3'=>$this->text()->comment('Kerjasama dengan Instansi Lain'),
            '_7_3_1'=>$this->text()->comment('Kerjasama dengan Instansi Lain'),
            '_7_3_2'=>$this->text()->comment('Instansi luar negeri yang menjalin kerjasama* dengan Fakultas/Sekolah Tinggi dalam tiga tahun terakhir.'),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ]);

        $this->createTable('{{%detail_borang_s1_fakultas_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_borang_s1_fakultas_standar7' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
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

        $this->dropTable('{{%borang_s1_fakultas_standar7}}');
        $this->dropTable('{{%borang_s1_fakultas_standar6}}');
        $this->dropTable('{{%borang_s1_fakultas_standar5}}');
        $this->dropTable('{{%borang_s1_fakultas_standar4}}');
        $this->dropTable('{{%borang_s1_fakultas_standar3}}');
        $this->dropTable('{{%borang_s1_fakultas_standar2}}');
        $this->dropTable('{{%borang_s1_fakultas_standar1}}');
        $this->dropTable('{{%detail_borang_s1_prodi_standar7}}');
        $this->dropTable('{{%borang_s1_prodi_standar7}}');
        $this->dropTable('{{%detail_borang_s1_prodi_standar6}}');
        $this->dropTable('{{%borang_s1_prodi_standar6}}');
        $this->dropTable('{{%detail_borang_s1_prodi_standar5}}');
        $this->dropTable('{{%borang_s1_prodi_standar5}}');
        $this->dropTable('{{%detail_borang_s1_prodi_standar4}}');
        $this->dropTable('{{%borang_s1_prodi_standar4}}');
        $this->dropTable('{{%detail_borang_s1_prodi_standar3}}');
        $this->dropTable('{{%borang_s1_prodi_standar3}}');
        $this->dropTable('{{%detail_borang_s1_prodi_standar2}}');
        $this->dropTable('{{%borang_s1_prodi_standar2}}');
        $this->dropTable('{{%borang_s1_prodi_standar1}}');
        $this->dropTable('{{%detail_borang_s1_prodi_standar1}}');
        $this->dropTable('{{%borang_s3_fakultas}}');
        $this->dropTable('{{%borang_s3_prodi}}');
        $this->dropTable('{{%borang_s2_fakultas}}');
        $this->dropTable('{{%borang_s2_prodi}}');
        $this->dropTable('{{%dokumen_borang_s1_fakultas}}');
        $this->dropTable('{{%borang_s1_fakultas}}');
        $this->dropTable('{{%dokumen_borang_s1_prodi}}');
        $this->dropTable('{{%borang_s1_prodi}}');
        $this->dropTable('{{%borang_diploma_akademi}}');
        $this->dropTable('{{%borang_diploma_prodi}}');
        $this->dropTable('{{%akreditasi_institusi}}');
        $this->dropTable('{{%akreditasi_prodi_s3}}');
        $this->dropTable('{{%akreditasi_prodi_s2}}');
        $this->dropTable('{{%akreditasi_prodi_s1}}');
        $this->dropTable('{{%akreditasi_prodi_diploma}}');
        $this->dropTable('{{%akreditasi}}');
        $this->dropTable('{{%jenis_akreditasi}}');
        $this->dropTable('{{%unit}}');
        $this->dropTable('{{%program_studi}}');
        $this->dropTable('{{%program}}');
        $this->dropTable('{{%fakultas_akademi}}');
        $this->dropTable('{{%profil_user}}');
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
