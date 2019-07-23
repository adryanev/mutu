<?php

use yii\db\Migration;

/**
 * Class m190513_224936_add_borang_institusi
 */
class m190513_224936_add_borang_institusi extends Migration
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
        
        // migrasi borang institusi
        $this->createTable('{{%s7_borang_institusi}}',[
            'id'=>$this->primaryKey(),
            'id_akreditasi_institusi'=>$this->integer(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer()
        ],$tableOptions);
        // dokumen borang institusi
        $this->createTable('{{%s7_dokumen_borang_institusi}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi'=>$this->integer(),
            'nama_dokumen'=>$this->string(),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer()
        ],$tableOptions);
        // borang standar institusi dan detail standar
        $this->createTable('{{%s7_borang_institusi_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi'=>$this->integer(),
            '_1_1'=>$this->text()->comment('Jelaskan dasar penyusunan dan mekanisme penyusunan visi, misi, tujuan dan sasaran institusi perguruan tinggi, serta pihak-pihak yang dilibatkan dalam penyusunannya'),
            '_1_2'=>$this->text()->comment('Pernyataan mengenai tonggak-tonggak capaian (milestones) tujuan yang dinyatakan dalam sasaran-sasaran yang merupakan target terukur, dan penjelasan mengenai strategi serta tahapan pencapaiannya'),
            '_1_3'=>$this->text()->comment('Sosialisasi visi, misi, tujuan, sasaran dan strategi pencapaian dan penggunaannya sebagai acuan dalam penyusunan rencana kerja institusi PT'),
            '_1_3_1'=>$this->text()->comment('Uraikan sosialisasi visi, misi, tujuan, dan sasaran PT agar dipahami seluruh pemangku kepentingan (sivitas akademika, tenaga kependidikan, pengguna lulusan, dan masyarakat)'),
            '_1_3_2'=>$this->text()->comment('Jelaskan bahwa visi, misi, tujuan, dan sasaran PT serta strategi pencapaiannya untuk dijadikan sebagai acuan semua unit dalam institusi perguruan tinggi dalam menyusun rencana strategis (renstra) dan/atau rencana kerja unit bersangkutan'),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%s7_detail_borang_institusi_standar1}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi_standar1' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%s7_borang_institusi_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi'=>$this->integer(),
            '_2_1'=>$this->text()->comment('Tata Pamong'),
            '_2_1_1'=>$this->text()->comment('Uraikan secara ringkas sistem tata pamong (sebutkan lembaga yang berperan, perangkat pendukung, kebijakan dan peraturan/ketentuan termasuk kode etik yang dijadikan pedoman dalam penyelenggaraan perguruan tinggi, serta prosedur penetapannya) di institusi perguruan tinggi dalam membangun sistem tata pamong yang kredibel, transparan, akuntabel, bertanggung jawab, dan adil, serta pelaksanaannya'),
            '_2_1_2'=>$this->text()->comment('Struktur Organisasi, Koordinasi, dan Cara Kerja Institusi Perguran Tinggi. Gambarkan struktur organisasi perguruan tinggi serta tugas dan fungsi dari tiap unit yang ada. Sebutkan nama lembaga, fakultas, jurusan dan laboratorium yang ada'),
            '_2_1_3'=>$this->text()->comment('Kelembagaan Kode Etik'),
            '_2_2'=>$this->text()->comment('Kepemimpinan'),
            '_2_3'=>$this->text()->comment('Sistem Pengelolaan'),
            '_2_3_1'=>$this->text()->comment('Jelaskan sistem pengelolaan institusi perguruan tinggi serta dokumen pendukungnya (jelaskan unit / bagian / lembaga yang berperan dalam setiap fungsi pengelolaan serta proses pengambilan keputusan)'),
            '_2_3_2'=>$this->text()->comment('Jelaskan program peningkatan kompetensi manajerial untuk menjamin proses pengelolaan yang efektif dan efisien di setiap unit'),
            '_2_3_3'=>$this->text()->comment('Jelaskan diseminasi hasil kerja perguruan tinggi sebagai akuntabilitas publik'),
            '_2_3_4'=>$this->text()->comment('Jelaskan sistem audit internal (lembaga/unit kerja, ruang lingkup tugas, prosedur kerja dsb)'),
            '_2_3_5'=>$this->text()->comment('Jelaskan sistem audit eksternal (lembaga/unit kerja, ruang lingkup tugas, prosedur kerja dsb)'),
            '_2_4'=>$this->text()->comment('Sistem Penjaminan Mutu'),
            '_2_4_1'=>$this->text()->comment('Jelaskan keberadaan manual mutu yang mencakup informasi tentang kebijakan, pernyataan, unit pelaksana, standar, prosedur, SOP, dan pentahapan sasaran mutu perguruan tinggi'),
            '_2_4_2'=>$this->text()->comment('Jelaskan implementasi penjaminan mutu perguruan tinggi'),
            '_2_4_3'=>$this->text()->comment('Jelaskan monitoring dan evaluasi penjaminan mutu perguruan tinggi, serta tindak lanjutnya'),
            '_2_4_4'=>$this->text()->comment('Jelaskan peranan institusi dalam pembinaan program studi (pengembangan program studi serta bantuan penyusunan dokumen akreditasi dalam bentuk pelatihan, dana dan informasi)'),
            '_2_4_5'=>$this->text()->comment('Jelaskan ketersediaan dan pelaksanaan basis data institusi dan program studi untuk mendukung penyusunan dokumen evaluasi diri'),
            '_2_4_6'=>$this->text()->comment('Tuliskan jumlah program studi yang ada dan status akreditasi BAN-PT'),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%s7_detail_borang_institusi_standar2}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi_standar2' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%s7_borang_institusi_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi'=>$this->integer(),
            '_3_1'=>$this->text()->comment('Mahasiswa'),
            '_3_1_1'=>$this->text()->comment('Jelaskan sistem rekruitmen dan seleksi calon mahasiswa baru untuk program sarjana, magister, doktor dan/atau diploma yang diterapkan pada institusi ini serta ketersediaan pedoman tertulis tentang rekrutmen dan seleksi mahasiswa baru'),
            '_3_1_10'=>$this->text()->comment('Jelaskan pelaksanaan program layanan bimbingan karir dan informasi kerja bagi mahasiswa dan lulusan yang mencakup: (1) penyebaran informasi kerja, (2) penyelenggaraan bursa kerja, (3) perencanaan karir, (4) pelatihan melamar kerja, dan (5) layanan penempatan kerja'),
            '_3_1_11'=>$this->text()->comment('Sebutkan pencapaian prestasi mahasiswa dalam tiga tahun terakhir di bidang akademik dan non-akademik, antara lain prestasi dalam penelitian dan lomba karya ilmiah, PkM, olahraga, dan seni dalam tabel berikut'),
            '_3_1_12'=>$this->text()->comment('Jelaskan upaya institusi untuk meningkatkan prestasi mahasiswa dalam bidang akademik dan non-akademik, antara lain prestasi dalam penelitian dan lomba karya ilmiah, PkM, olahraga, dan seni'),
            '_3_1_2'=>$this->text()->comment('Jelaskan kebijakan mengenai penerimaan mahasiswa yang memiliki potensi akademik dan kurang mampu secara ekonomi, fisik, serta implementasinya'),
            '_3_1_3'=>$this->text()->comment('Jelaskan kebijakan mengenai penerimaan mahasiswa berdasarkan prinsip ekuitas (SARA-suku, agama, ras, antar golongan, gender, status sosial, dan politik)'),
            '_3_1_4'=>$this->text()->comment('Jelaskan kebijakan mengenai penerimaan mahasiswa yang berdasarkan prinsip pemerataan wilayah asal mahasiswa, serta informasi mengenai jumlah provinsi asal mahasiswa'),
            '_3_1_5'=>$this->text()->comment('Profil Mahasiswa'),
            '_3_1_6'=>$this->text()->comment('Jelaskan tata cara dan instrumen yang digunakan untuk mengetahui kepuasan mahasiswa terhadap layanan kemahasiswaan'),
            '_3_1_7'=>$this->text()->comment('Jelaskan hasil pelaksanaan pengukuran kepuasan mahasiswa menggunakan instrumen tersebut'),
            '_3_1_8'=>$this->text()->comment('Lengkapilah tabel berikut, untuk data pelayanan kepada mahasiswa dalam satu tahun terakhir'),
            '_3_1_9'=>$this->text()->comment('Jelaskan program layanan bimbingan karir dan informasi kerja bagi mahasiswa dan lulusan yang mencakup: (1) penyebaran informasi kerja, (2) penyelenggaraan bursa kerja, (3) perencanaan karir, (4) pelatihan melamar kerja, dan (5) layanan penempatan kerja'),
            '_3_2'=>$this->text()->comment('Lulusan'),
            '_3_2_1a'=>$this->text()->comment('Jumlah mahasiswa dan lulusan program pendidikan sarjana'),
            '_3_2_1b'=>$this->text()->comment('Tuliskan data jumlah mahasiswa dan lulusan program pendidikan magister (S-2) lima tahun terakhir dengan mengikuti format tabel berikut'),
            '_3_2_1c'=>$this->text()->comment('Tuliskan data jumlah mahasiswa dan lulusan program pendidikan doktor (S-3) enam tahun terakhir dengan mengikuti format tabel berikut'),
            '_3_2_1d'=>$this->text()->comment('Tuliskan data jumlah mahasiswa dan lulusan program pendidikan diploma IV (D-4)tujuh tahun terakhir dengan mengikuti format tabel berikut'),
            '_3_2_1e'=>$this->text()->comment('Tuliskan data jumlah mahasiswa dan lulusan program pendidikan diploma III (D-3) lima tahun terakhir dengan mengikuti format tabel berikut'),
            '_3_2_1f'=>$this->text()->comment('Tuliskan data jumlah mahasiswa dan lulusan program pendidikan diploma II (D-2) tiga tahun terakhir dengan mengikuti format tabel berikut'),
            '_3_2_1g'=>$this->text()->comment('Tuliskan data jumlah mahasiswa dan lulusan program pendidikan diploma I (D-1) dua tahun terakhir dengan mengikuti format tabel berikut'),
            '_3_2_2'=>$this->text()->comment('Tuliskan rata-rata masa studi mahasiswa dan IPK lulusan dalam tabel berikut'),
            '_3_2_3'=>$this->text()->comment('Jelaskan kebijakan institusi terkait dengan studi pelacakan baik dari lulusan maupun dari pengguna lulusan, berikut keberadaan pedoman. Informasi mencakup: (1) kebijakan dan strategi, (2) instrumen, (3) monitoring dan evaluasi, dan (4) tindak lanjut'),
            '_3_2_4'=>$this->text()->comment('Jelaskan pelaksanaan studi pelacakan, hasil evaluasi dalam lima tahun terakhir, dan tindak lanjut dari evaluasi terhadap peningkatan mutu lulusan'),
            '_3_2_5'=>$this->text()->comment('Himpunan Alumni'),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%s7_detail_borang_institusi_standar3}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi_standar3' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%s7_borang_institusi_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi'=>$this->integer(),
            '_4_1'=>$this->text()->comment('Sistem Pengelolaan Sumber Daya Manusia'),
            '_4_2'=>$this->text()->comment('Sistem Monitoring dan Evaluasi'),
            '_4_3'=>$this->text()->comment('Dosen'),
            '_4_3_1'=>$this->text()->comment('Dosen Tetap'),
            '_4_3_2'=>$this->text()->comment('Dosen Tidak Tetap'),
            '_4_4'=>$this->text()->comment('Kegiatan peningkatan sumber daya manusia (dosen) dalam tiga tahun terakhir'),
            '_4_5'=>$this->text()->comment('Tenaga Kependidikan'),
            '_4_5_1'=>$this->text()->comment('Tuliskan data tenaga kependidikan yang ada di institusi yang melayani mahasiswa dengan mengikuti format tabel berikut'),
            '_4_5_2'=>$this->text()->comment('Jelaskan upaya yang telah dilakukan institusi dalam meningkatkan kualifikasi dan kompetensi tenaga kependidikan, dalam hal pemberian kesempatan belajar/ pelatihan, studi banding, pemberian fasilitas termasuk dana, dan jenjang karir'),
            '_4_6'=>$this->text()->comment('Kepuasan dosen dan tenaga kependidikan'),
            '_4_6_1'=>$this->text()->comment('Jelaskan instrumen yang digunakan untuk mengetahui tingkat kepuasan dosen dan tenaga kependidikan terhadap sistem dan praktek pengelolaan sumber daya manusia di institusi ini'),
            '_4_6_2'=>$this->text()->comment('Jelaskan pelaksanaan survei kepuasan dosen, pustakawan, laboran, teknisi, dan tenaga administrasi terhadap sistem pengelolaan sumber daya manusia'),
            '_4_6_3'=>$this->text()->comment('Jelaskan bagaimana hasil penjajagan kepuasan tersebut dan apa tindak lanjutnya'),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%s7_detail_borang_institusi_standar4}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi_standar4' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%s7_borang_institusi_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi'=>$this->integer(),
            '_5_1'=>$this->text()->comment('Kurikulum'),
            '_5_1_1'=>$this->text()->comment('Jelaskan kebijakan institusi dalam pengembangan kurikulum, bentuk dukungan institusi dalam pengembangan kurikulum program studi, sistem monitoring dan evaluasi kurikulum, serta keberadaan dokumen'),
            '_5_1_2'=>$this->text()->comment('Jelaskan monitoring dan evaluasi pengembangan kurikulum program studi'),
            '_5_2'=>$this->text()->comment('Pembelajaran'),
            '_5_2_1'=>$this->text()->comment('Sistem Pembelajaran'),
            '_5_2_2'=>$this->text()->comment('Pengendalian mutu proses pembelajaran'),
            '_5_2_3'=>$this->text()->comment('Pedoman Pelaksanaan Tridarma PT'),
            '_5_3'=>$this->text()->comment('Suasana Akademik'),
            '_5_3_1'=>$this->text()->comment('Kebebasan Akademik, Kebebasan Mimbar Akademik, dan Otonomi Keilmuan'),
            '_5_3_2'=>$this->text()->comment('Jelaskan kebijakan dan dukungan institusi untuk menjamin terciptanya suasana akademik di lingkungan institusi yang kondusif untuk meningkatkan proses dan mutu pembelajaran. Dukungan institusi mencakup antara lain peraturan dan sumber daya'),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%s7_detail_borang_institusi_standar5}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi_standar5' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%s7_borang_institusi_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi'=>$this->integer(),
            '_6_1'=>$this->text()->comment('Pembiayaan'),
            '_6_1_1'=>$this->text()->comment('Jelaskan proses pengelolaan dana institusi perguruan tinggi mulai dari perencanaan, penerimaan, pengalokasian, pelaporan, audit, monitoring dan evaluasi, serta pertanggungjawaban kepada pemangku kepentingan'),
            '_6_1_2'=>$this->text()->comment('Jelaskan mekanisme penetapan biaya pendidikan (SPP dan biaya lainnya), serta jelaskan pihak-pihak yang berperan dalam penetapan tersebut'),
            '_6_1_3'=>$this->text()->comment('Jelaskan kebijakan mengenai pembiayaan mahasiswa yang berpotensi secara akademik dan kurang mampu, jumlah dan persentase mahasiswa yang mendapatkan keringanan atau pembebasan biaya pendidikan terhadap total mahasiswa'),
            '_6_1_4'=>$this->text()->comment('Tuliskan realisasi penerimaan dana (termasuk hibah) dalam juta rupiah, selama tiga tahun terakhir, pada tabel berikut'),
            '_6_1_5'=>$this->text()->comment('Tuliskan penggunaan dana yang diterima pada Tabel 6.2.2 selama tiga tahun terakhir pada tabel berikut'),
            '_6_1_6'=>$this->text()->comment('Tuliskan dana untuk kegiatan penelitian dalam tiga tahun terakhir dengan mengikuti format tabel berikut'),
            '_6_1_7'=>$this->text()->comment('Tuliskan dana yang diperoleh dari/untuk kegiatan pelayanan/pengabdian kepada masyarakat pada tiga tahun terakhir dengan mengikuti format tabel berikut'),
            '_6_1_8'=>$this->text()->comment('Jelaskan sistem monitoring dan evaluasi pendanaan internal untuk pemanfaatan dana yang lebih efektif, transparan, dan memenuhi aturan keuangan yang berlaku'),
            '_6_1_9'=>$this->text()->comment('Jelaskan tentang lembaga audit eksternal keuangan, pelaksanaan audit, ketersediaan laporan bagi pemangku kepentingan, serta tindak lanjutnya oleh perguruan tinggi'),
            '_6_2'=>$this->text()->comment('Prasarana dan Sarana'),
            '_6_2_1'=>$this->text()->comment('Jelaskan sistem pengelolaan prasarana dan sarana (kebijakan pengembangan dan pencatatan, penetapan penggunaan, pemeliharaan/perbaikan/kebersihan, keamanan dan keselamatan prasarana dan sarana) yang digunakan dalam penyelenggaraan kegiatan akademik dan non-akademik, untuk mencapai tujuan institusi'),
            '_6_2_2'=>$this->text()->comment('Tuliskan lokasi, status, penggunaan dan luas lahan yang digunakan perguruan tinggi untuk menjamin penyelenggaraan pendidikan yang bermutu, dalam tabel berikut'),
            '_6_2_3'=>$this->text()->comment('Prasarana untuk kegiatan akademik dan non-akademik'),
            '_6_2_4'=>$this->text()->comment('Sebutkan prasarana tambahan yang dikelola dalam tiga tahun terakhir. Uraikan pula rencana investasi untuk prasarana dalam lima tahun mendatang, dengan mengikuti format tabel berikut'),
            '_6_2_5'=>$this->text()->comment('Pustaka (buku teks, karya ilmiah, dan jurnal; termasuk juga dalam bentuk elektronik/e-library)'),
            '_6_2_6'=>$this->text()->comment('Jelaskan pula aksesibilitas dan pemanfaatan pustaka di atas'),
            '_6_2_7'=>$this->text()->comment('Jelaskan upaya perguruan tinggi menyediakan prasarana dan sarana pembelajaran yang terpusat, serta aksesibilitasnya bagi sivitas akademika'),
            '_6_3'=>$this->text()->comment('Sistem Informasi'),
            '_6_3_1'=>$this->text()->comment('Jelaskan sistem informasi dan fasilitas yang digunakan oleh perguruan tinggi untuk kegiatan pembelajaran (hardware, software, e-learning, e-library)'),
            '_6_3_2'=>$this->text()->comment('Jelaskan sistem informasi dan fasilitas yang digunakan oleh perguruan tinggi untuk kegiatan administrasi (akademik, keuangan, dan personil) serta aksesibilitasnya'),
            '_6_3_3'=>$this->text()->comment('Jelaskan sistem informasi dan fasilitas yang digunakan oleh institusi perguruan tinggi untuk pengelolaan prasarana dan sarana (hardware, software)'),
            '_6_3_4'=>$this->text()->comment('Jelaskan sistem pendukung pengambilan keputusan'),
            '_6_3_5'=>$this->text()->comment('Jelaskan sistem informasi (misalnya website institusi, fasilitas internet, jaringan lokal, jaringan nirkabel) yang dimanfaatkan untuk komunikasi internal dan eksternal kampus. Jelaskan juga akses mahasiswa dan dosen terhadap sumber informasi'),
            '_6_3_6'=>$this->text()->comment('Jelaskan kapasitas internet yang tersedia dan bandwidth per mahasiswa'),
            '_6_3_7'=>$this->text()->comment('Aksesibiltas Data'),
            '_6_3_8'=>$this->text()->comment('Blue print sistem informasi'),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%s7_detail_borang_institusi_standar6}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi_standar6' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);

        $this->createTable('{{%s7_borang_institusi_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi'=>$this->integer(),
            '_7_1'=>$this->text()->comment('Penelitian'),
            '_7_1_1'=>$this->text()->comment('Jelaskan kebijakan dan sistem pengelolaan penelitian (lembaga/unit yang menangani masalah penelitian, pengarahan fokus dan agenda penelitian, pedoman penyusunan usul dan pelaksanaan penelitian, pendanaan, dan jaminan atas HaKI)'),
            '_7_1_2'=>$this->text()->comment('Tuliskan jumlah judul penelitian* yang dilakukan oleh dosen tetap selama tiga tahun terakhir dengan mengikuti format tabel berikut'),
            '_7_1_3'=>$this->text()->comment('Tuliskan judul artikel ilmiah/karya ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap dengan mengikuti format tabel berikut'),
            '_7_1_4'=>$this->text()->comment('Jumlah artikel ilmiah yang tercatat dalam indeks sitasi internasional selama 3 tahun terakhir: _ artikel'),
            '_7_1_5'=>$this->text()->comment('Sebutkan karya dosen dan atau mahasiswa Institusi perguruan tinggi yang telah memperoleh Paten/Hak atas Kekayaan Intelektual (HaKI)/Karya yang mendapatkan penghargaan tingkat nasional/internasional selama tiga tahun terakhir'),
            '_7_1_6'=>$this->text()->comment('Jelaskan kebijakan dan upaya yang dilakukan oleh institusi dalam menjamin keberlanjutan penelitian, yang mencakup informasi tentang agenda penelitian, dukungan SDM, prasarana dan sarana, jejaring penelitian, dan pencarian berbagai sumber dana penelitian'),
            '_7_2'=>$this->text()->comment('Kegiatan Pelayanan/Pengabdian kepada Masyarakat (PkM)'),
            '_7_2_1'=>$this->text()->comment('Jelaskan kebijakan dan sistem pengelolaan kegiatan PkM (lembaga/unit yang menangani masalah, agenda, pedoman penyusunan usul dan pelaksanaan, serta pendanaan PkM)'),
            '_7_2_2'=>$this->text()->comment('Tuliskan jumlah kegiatan PkM* berdasarkan sumber pembiayaan selama tiga tahun terakhir yang dilakukan oleh institusi dengan mengikuti format tabel berikut'),
            '_7_2_3'=>$this->text()->comment('Jelaskan kebijakan dan upaya yang dilakukan oleh institusi dalam menjamin keberlanjutan dan mutu kegiatan PkM, , yang mencakup informasi tentang agenda PkM, dukungan SDM, prasarana dan sarana, jejaring PkM, dan pencarian berbagai sumber dana PkM'),
            '_7_3'=>$this->text()->comment('Kerjasama'),
            '_7_3_1'=>$this->text()->comment('Jelaskan kebijakan dan upaya (pengelolaan serta sistem monitoring dan evaluasi) kerjasama, dalam rangka mewujudkan visi, melaksanakan misi, dan mencapai tujuan dan sasaran institusi'),
            '_7_3_2'=>$this->text()->comment('Tuliskan instansi dalam negeri yang menjalin kerjasama* yang terkait dengan institusi perguruan tinggi dalam tiga tahun terakhir'),
            '_7_3_3'=>$this->text()->comment('Tuliskan instansi luar negeri yang menjalin kerjasama* yang terkait dengan institusi perguruan tinggi/jurusan dalam tiga tahun terakhir'),
            '_7_3_4'=>$this->text()->comment('Jelaskan proses monitoring dan evaluasi pelaksanaan dan hasil kerjasama serta waktu pelaksanaannya'),
            '_7_3_5'=>$this->text()->comment('Jelaskan manfaat dan kepuasan mitra kerja sama. Jelaskan pula cara memperoleh informasi tersebut'),
            'progress'=>$this->float()->defaultValue(0),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);
        $this->createTable('{{%s7_detail_borang_institusi_standar7}}',[
            'id'=>$this->primaryKey(),
            'id_borang_institusi_standar7' =>$this->integer(),
            'nomor_dokumen'=>$this->string(),
            'nama_dokumen'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
            'created_by'=>$this->integer(),
            'updated_by'=>$this->integer(),
        ],$tableOptions);
        
        // relasi borang, dokumen dan user crt upd
        $this->addForeignKey('fk-borang_institusi-akreditasi_institusi','{{%s7_borang_institusi}}','id_akreditasi_institusi', '{{%s7_akreditasi_institusi}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-dokumen_borang_institusi-borang_institusi','{{%s7_dokumen_borang_institusi}}','id_borang_institusi', '{{%s7_borang_institusi}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-dokumen_borang_institusi-user_crt','{{%s7_dokumen_borang_institusi}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-dokumen_borang_institusi-user_upd','{{%s7_dokumen_borang_institusi}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        
        // relasi standar, detail dan user crt upd
        $this->addForeignKey('fk-borang_institusi_standar1-borang_institusi','{{%s7_borang_institusi_standar1}}','id_borang_institusi', '{{%s7_borang_institusi}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-detail_borang_institusi_standar1-borang_institusi_standar1','{{%s7_detail_borang_institusi_standar1}}','id_borang_institusi_standar1', '{{%s7_borang_institusi_standar1}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar1-user_crt','{{%s7_borang_institusi_standar1}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar1-user_upd','{{%s7_borang_institusi_standar1}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar1-user_crt','{{%s7_detail_borang_institusi_standar1}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar1-user_upd','{{%s7_detail_borang_institusi_standar1}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        
        $this->addForeignKey('fk-borang_institusi_standar2-borang_institusi','{{%s7_borang_institusi_standar2}}','id_borang_institusi', '{{%s7_borang_institusi}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-detail_borang_institusi_standar2-borang_institusi_standar2','{{%s7_detail_borang_institusi_standar2}}','id_borang_institusi_standar2', '{{%s7_borang_institusi_standar2}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar2-user_crt','{{%s7_borang_institusi_standar2}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar2-user_upd','{{%s7_borang_institusi_standar2}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar2-user_crt','{{%s7_detail_borang_institusi_standar2}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar2-user_upd','{{%s7_detail_borang_institusi_standar2}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        
        $this->addForeignKey('fk-borang_institusi_standar3-borang_institusi','{{%s7_borang_institusi_standar3}}','id_borang_institusi', '{{%s7_borang_institusi}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-detail_borang_institusi_standar3-borang_institusi_standar3','{{%s7_detail_borang_institusi_standar3}}','id_borang_institusi_standar3', '{{%s7_borang_institusi_standar3}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar3-user_crt','{{%s7_borang_institusi_standar3}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar3-user_upd','{{%s7_borang_institusi_standar3}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar3-user_crt','{{%s7_detail_borang_institusi_standar3}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar3-user_upd','{{%s7_detail_borang_institusi_standar3}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        
        $this->addForeignKey('fk-borang_institusi_standar4-borang_institusi','{{%s7_borang_institusi_standar4}}','id_borang_institusi', '{{%s7_borang_institusi}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-detail_borang_institusi_standar4-borang_institusi_standar4','{{%s7_detail_borang_institusi_standar4}}','id_borang_institusi_standar4', '{{%s7_borang_institusi_standar4}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar4-user_crt','{{%s7_borang_institusi_standar4}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar4-user_upd','{{%s7_borang_institusi_standar4}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar4-user_crt','{{%s7_detail_borang_institusi_standar4}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar4-user_upd','{{%s7_detail_borang_institusi_standar4}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        
        $this->addForeignKey('fk-borang_institusi_standar5-borang_institusi','{{%s7_borang_institusi_standar5}}','id_borang_institusi', '{{%s7_borang_institusi}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-detail_borang_institusi_standar5-borang_institusi_standar5','{{%s7_detail_borang_institusi_standar5}}','id_borang_institusi_standar5', '{{%s7_borang_institusi_standar5}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar5-user_crt','{{%s7_borang_institusi_standar5}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar5-user_upd','{{%s7_borang_institusi_standar5}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar5-user_crt','{{%s7_detail_borang_institusi_standar5}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar5-user_upd','{{%s7_detail_borang_institusi_standar5}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        
        $this->addForeignKey('fk-borang_institusi_standar6-borang_institusi','{{%s7_borang_institusi_standar6}}','id_borang_institusi', '{{%s7_borang_institusi}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-detail_borang_institusi_standar6-borang_institusi_standar6','{{%s7_detail_borang_institusi_standar6}}','id_borang_institusi_standar6', '{{%s7_borang_institusi_standar6}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar6-user_crt','{{%s7_borang_institusi_standar6}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar6-user_upd','{{%s7_borang_institusi_standar6}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar6-user_crt','{{%s7_detail_borang_institusi_standar6}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar6-user_upd','{{%s7_detail_borang_institusi_standar6}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        
        $this->addForeignKey('fk-borang_institusi_standar7-borang_institusi','{{%s7_borang_institusi_standar7}}','id_borang_institusi', '{{%s7_borang_institusi}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-detail_borang_institusi_standar7-borang_institusi_standar7','{{%s7_detail_borang_institusi_standar7}}','id_borang_institusi_standar7', '{{%s7_borang_institusi_standar7}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar7-user_crt','{{%s7_borang_institusi_standar7}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-borang_institusi_standar7-user_upd','{{%s7_borang_institusi_standar7}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar7-user_crt','{{%s7_detail_borang_institusi_standar7}}','created_by', '{{%user}}','id','CASCADE','CASCADE');
        $this->addForeignKey('fk-d_borang_institusi_standar7-user_upd','{{%s7_detail_borang_institusi_standar7}}','updated_by', '{{%user}}','id','CASCADE','CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->dropForeignKey('fk-d_borang_institusi_standar7-user_upd','{{%s7_detail_borang_institusi_standar7}}');
        $this->dropForeignKey('fk-d_borang_institusi_standar7-user_crt','{{%s7_detail_borang_institusi_standar7}}');
        $this->dropForeignKey('fk-borang_institusi_standar7-user_upd','{{%s7_borang_institusi_standar7}}');
        $this->dropForeignKey('fk-borang_institusi_standar7-user_crt','{{%s7_borang_institusi_standar7}}');
        $this->dropForeignKey('fk-detail_borang_institusi_standar7-borang_institusi_standar7','{{%s7_detail_borang_institusi_standar7}}');
        $this->dropForeignKey('fk-borang_institusi_standar7-borang_institusi','{{%s7_borang_institusi_standar7}}');
        
        $this->dropForeignKey('fk-d_borang_institusi_standar6-user_upd','{{%s7_detail_borang_institusi_standar6}}');
        $this->dropForeignKey('fk-d_borang_institusi_standar6-user_crt','{{%s7_detail_borang_institusi_standar6}}');
        $this->dropForeignKey('fk-borang_institusi_standar6-user_upd','{{%s7_borang_institusi_standar6}}');
        $this->dropForeignKey('fk-borang_institusi_standar6-user_crt','{{%s7_borang_institusi_standar6}}');
        $this->dropForeignKey('fk-detail_borang_institusi_standar6-borang_institusi_standar6','{{%s7_detail_borang_institusi_standar6}}');
        $this->dropForeignKey('fk-borang_institusi_standar6-borang_institusi','{{%s7_borang_institusi_standar6}}');
        
        $this->dropForeignKey('fk-d_borang_institusi_standar5-user_upd','{{%s7_detail_borang_institusi_standar5}}');
        $this->dropForeignKey('fk-d_borang_institusi_standar5-user_crt','{{%s7_detail_borang_institusi_standar5}}');
        $this->dropForeignKey('fk-borang_institusi_standar5-user_upd','{{%s7_borang_institusi_standar5}}');
        $this->dropForeignKey('fk-borang_institusi_standar5-user_crt','{{%s7_borang_institusi_standar5}}');
        $this->dropForeignKey('fk-detail_borang_institusi_standar5-borang_institusi_standar5','{{%s7_detail_borang_institusi_standar5}}');
        $this->dropForeignKey('fk-borang_institusi_standar5-borang_institusi','{{%s7_borang_institusi_standar5}}');
        
        $this->dropForeignKey('fk-d_borang_institusi_standar4-user_upd','{{%s7_detail_borang_institusi_standar4}}');
        $this->dropForeignKey('fk-d_borang_institusi_standar4-user_crt','{{%s7_detail_borang_institusi_standar4}}');
        $this->dropForeignKey('fk-borang_institusi_standar4-user_upd','{{%s7_borang_institusi_standar4}}');
        $this->dropForeignKey('fk-borang_institusi_standar4-user_crt','{{%s7_borang_institusi_standar4}}');
        $this->dropForeignKey('fk-detail_borang_institusi_standar4-borang_institusi_standar4','{{%s7_detail_borang_institusi_standar4}}');
        $this->dropForeignKey('fk-borang_institusi_standar4-borang_institusi','{{%s7_borang_institusi_standar4}}');
        
        $this->dropForeignKey('fk-d_borang_institusi_standar3-user_upd','{{%s7_detail_borang_institusi_standar3}}');
        $this->dropForeignKey('fk-d_borang_institusi_standar3-user_crt','{{%s7_detail_borang_institusi_standar3}}');
        $this->dropForeignKey('fk-borang_institusi_standar3-user_upd','{{%s7_borang_institusi_standar3}}');
        $this->dropForeignKey('fk-borang_institusi_standar3-user_crt','{{%s7_borang_institusi_standar3}}');
        $this->dropForeignKey('fk-detail_borang_institusi_standar3-borang_institusi_standar3','{{%s7_detail_borang_institusi_standar3}}');
        $this->dropForeignKey('fk-borang_institusi_standar3-borang_institusi','{{%s7_borang_institusi_standar3}}');
        
        $this->dropForeignKey('fk-d_borang_institusi_standar2-user_upd','{{%s7_detail_borang_institusi_standar2}}');
        $this->dropForeignKey('fk-d_borang_institusi_standar2-user_crt','{{%s7_detail_borang_institusi_standar2}}');
        $this->dropForeignKey('fk-borang_institusi_standar2-user_upd','{{%s7_borang_institusi_standar2}}');
        $this->dropForeignKey('fk-borang_institusi_standar2-user_crt','{{%s7_borang_institusi_standar2}}');
        $this->dropForeignKey('fk-detail_borang_institusi_standar2-borang_institusi_standar2','{{%s7_detail_borang_institusi_standar2}}');
        $this->dropForeignKey('fk-borang_institusi_standar2-borang_institusi','{{%s7_borang_institusi_standar2}}');

        $this->dropForeignKey('fk-d_borang_institusi_standar1-user_upd','{{%s7_detail_borang_institusi_standar1}}');
        $this->dropForeignKey('fk-d_borang_institusi_standar1-user_crt','{{%s7_detail_borang_institusi_standar1}}');
        $this->dropForeignKey('fk-borang_institusi_standar1-user_upd','{{%s7_borang_institusi_standar1}}');
        $this->dropForeignKey('fk-borang_institusi_standar1-user_crt','{{%s7_borang_institusi_standar1}}');
        $this->dropForeignKey('fk-detail_borang_institusi_standar1-borang_institusi_standar1','{{%s7_detail_borang_institusi_standar1}}');
        $this->dropForeignKey('fk-borang_institusi_standar1-borang_institusi','{{%s7_borang_institusi_standar1}}');

        $this->dropForeignKey('fk-dokumen_borang_institusi-user_upd','{{%s7_dokumen_borang_institusi}}');
        $this->dropForeignKey('fk-dokumen_borang_institusi-user_crt','{{%s7_dokumen_borang_institusi}}');
        $this->dropForeignKey('fk-dokumen_borang_institusi-borang_institusi','{{%s7_dokumen_borang_institusi}}');
        $this->dropForeignKey('fk-borang_institusi-akreditasi_institusi','{{%s7_borang_institusi}}');

        $this->dropTable('{{%s7_detail_borang_institusi_standar7}}');
        $this->dropTable('{{%s7_borang_institusi_standar7}}');
        $this->dropTable('{{%s7_detail_borang_institusi_standar6}}');
        $this->dropTable('{{%s7_borang_institusi_standar6}}');
        $this->dropTable('{{%s7_detail_borang_institusi_standar5}}');
        $this->dropTable('{{%s7_borang_institusi_standar5}}');
        $this->dropTable('{{%s7_detail_borang_institusi_standar4}}');
        $this->dropTable('{{%s7_borang_institusi_standar4}}');
        $this->dropTable('{{%s7_detail_borang_institusi_standar3}}');
        $this->dropTable('{{%s7_borang_institusi_standar3}}');
        $this->dropTable('{{%s7_detail_borang_institusi_standar2}}');
        $this->dropTable('{{%s7_borang_institusi_standar2}}');
        $this->dropTable('{{%s7_detail_borang_institusi_standar1}}');
        $this->dropTable('{{%s7_borang_institusi_standar1}}');

        $this->dropTable('{{%s7_dokumen_borang_institusi}}');
        $this->dropTable('{{%s7_borang_institusi}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190513_224936_add_borang_institusi cannot be reverted.\n";

        return false;
    }
    */
}
