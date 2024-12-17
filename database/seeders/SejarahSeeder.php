<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SejarahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sejarahs')->insert([
            'image' => 'sejarah/masjid.jpeg',
            'title' => "Sejarah MA-Pondok Pesantren Qur'an Assalaam Arjasari",
            'sejarah' => "Yayasan Assalaam pada bulan Mei 2021 menerima wakaf sebidang tanah seluas 30.020 m2 (-+3 Hektar) yang berlokasi di Kp. Babakan Siliwangi Rt.04 / Rw.07 Desa Pinggirsari Kecamatan Arjasari Kabupaten Bandung. Oleh KH. Habib Syarief Muhammad selaku Ketua Umum Yayasan dilaksanakan Peletakan Batu Pertama Pembangunan Masjid Assalaam pada Bulan Oktober 2022, Kemudian dilanjutkan kembali membangun Madrasah Aliyah - Pondok Pesantren Al-Quran Assalaam padan bulan Desember 2022, Alhamdulillah dalam kurun waktu 6 bulan pembangunan sudah bisa Diresmikan pada tanggal 06 Mei 2023 / 15 Syawal 1444 H oleh Ketua Umum Yayasan Assalaam (Habib Syarief Muhammad Al-Aydrus) dan Bupati Kabupaten Bandung (Dr. H. M. Dadang Supriatna, S.Ip, M.Si,). Setahap demi setahap selain melanjutkan pembangunan masjid mulai penerimaan siswa barunya MA-Ponpes Qur’an Assalaam di tahun ajaran 2023-2024. Pimpinan unit Pesantren Al-Qur'an Assalaam sekaligus kepala MA Assalaam dipercayakan kepada Ust. Abdul Sidik, M.Pd. Alhamdulillah dengan dorongan do’a dari semuanya MA Ponpes Qur’an Assalaam Tahun Pertama meraih siswa 2 rombel.",
        ]);
    }
}
