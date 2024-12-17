<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class VisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visis')->insert([
            'title' => 'Visi',
            'slug' => 'visi',
            'isi' => "TERWUJUDNYA MADRASAH ALIYAH YANG MAMPU MENGHASILKAN GENERASI QURANI YANG CENDIKIA, SHOLEH, TERAMPIL DAN BERAKHLAK MULIA SERTA BERBUDAYA LINGKUNGAN",
        ]);
        DB::table('visis')->insert([
            'title' => 'Misi',
            'slug' => 'misi',
            'isi' => "<p>1. Melaksanakan pembelajaran Al-Qur'an menggunakan kurikulum khusus dengan target hafal 30 juz Al Quran.</p><p>2. Menerapkan strategi PAIKEMI (Pembelajaran Aktif, Inovatif, Kreatif, Menyenangkan dan Islami) untuk menciptakan lulusan yang unggul.</p><p>3. Melaksanakan pembinaan potensi untuk mencapai prestasi akademik dan non akademik.</p><p>4. Menerapkan pembiasaan kegiatan keagamaan secara rutin untuk mengembangkan karakter religius.</p><p>5. Melaksanakan pembinaan yang intensif untuk menciptakan lulusan yang disiplin dan berakhlak mulia.</p><p>6. Memanfaatkan lingkungan sebagai media pengembangan diri untuk menciptakan karakter cinta lingkungan.</p>",
        ]);
        DB::table('visis')->insert([
            'title' => 'Tujuan',
            'slug' => 'tujuan',
            'isi' => "<p>1. Memperoleh prestasi yang baik.</p><p>2. Membentuk peserta didik yang berakhlak mulia.</p><p>3. Membentuk kader penghafal Al Quran yang kompetitif.</p><p>4. Membentuk kemandirian peserta didik.</p><p>5. Membentuk pola pengajaran yang efektif dan efisien.</p><p>6. Membentuk lingkungan yang agamis.</p>",
        ]);
        DB::table('visis')->insert([
            'title' => 'Rencana Strategis',
            'slug' => 'rencana-strategis',
            'isi' => "<p>1. Tercapainya lulusan Madrasah Aliyah yang menunjukkan kemajuan, percaya diri, berakhlak mulia, dan memiliki harapan yang tinggi dalam berprestasi.</p><p>2. Tercapainya silabus yang dikembangkan oleh guru, berdasarkan situasi dan kondisi madrasah.</p><p>3. Terwujudnya kurikulum yang memenuhi standar untuk pengembangan pribadi peserta didik.</p><p>4. Terpenuhinya jumlah dan kualifikasi pendidik dan tenaga kependidikan yang memenuhi standar kompetensi.</p><p>5. Terlaksananya kegiatan penilaian secara kontinu dan berkesinambungan berdasarkan rencana yang telah dibuat.</p><p>6. Terlaksananya pengelolaan madrasah yang ditunjukkan dengan kemandirian, kemitraan, partisipasi, keterbukaan dan akuntabel.</p><p>7. Terpenuhinya fasilitas dan sarana prasarana madrasah, baik untuk peserta didik, maupun kesejahteraan pendidik dan tenaga kependidikan lainnya.</p><p>8. Terwujudnya rencana anggaran biaya pendapatan dan belanja madrasah yang dirumuskan pada peraturan pemerintah dengan melibatkan partisipasi komite, dan warga madrasah lainnya.</p>",
        ]);
        DB::table('visis')->insert([
            'title' => 'Program Unggulan',
            'slug' => 'program-unggulan',
            'isi' => "<p>1. Program tahfizh Al Quran 30 juz dengan kurikulum khusus.</p><p>2. Program pembelajaran kitab kuning.</p><p>3. Program wajib mondok bagi seluruh siswa.</p><p>4. Program pengembangan Leadership Skills.</p><p>5. Program pengembangan Public Speaking Skills.</p><p>6. Program pembinaan khusus masuk perguruan tinggi.</p><p>7. Implementasi kegiatan keagamaan dalam kehidupan sehari-hari.</p><p>8. Program pembinaan akhlakul karimah dalam kehidupan sehari-hari.</p><p>9. Program pembinaan potensi untuk mencapai prestasi akademik dan non akademik.</p><p>10. Program pendampingan intensif oleh wali kelas dan pembimbing asrama.</p><p>11. Pelayanan prima dengan ditunjang teknologi.</p><p>12. Lokasi strategis serta kondusif karena udara yang sejuk dan terhindar dari kebisingan.</p>",
        ]);
    }
}
