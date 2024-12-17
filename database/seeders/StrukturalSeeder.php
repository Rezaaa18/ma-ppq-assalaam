<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StrukturalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('strukturals')->insert([
            'foto' => 'struktural/ABDUL SIDIK, M.PD.png',
            'nama' => 'Abdul Sidik, M.Pd.',
            'id_jabatan' => '1',
        ]);

        DB::table('strukturals')->insert([
            'foto' => 'struktural/MOCH RISMAN N, S.PD.png',
            'nama' => 'Moch Rismanto, S.Pd.',
            'id_jabatan' => '3',
        ]);

        DB::table('strukturals')->insert([
            'foto' => 'struktural/LUFI JAUHARI M, S.PD.png',
            'nama' => 'Lutfi Jauhari M, S.Pd.',
            'id_jabatan' => '3',
        ]);

        DB::table('strukturals')->insert([
            'foto' => 'struktural/IING SOLIHIN, S.H.png',
            'nama' => 'Iing Solihin, S.H.',
            'id_jabatan' => '3',
        ]);

        DB::table('strukturals')->insert([
            'foto' => 'struktural/DIAN PITALOKA, S.PD.png',
            'nama' => 'Dian Putraka, S.Pd.',
            'id_jabatan' => '3',
        ]);

        DB::table('strukturals')->insert([
            'foto' => 'struktural/SAYIDAH NUR, S.PD.png',
            'nama' => 'Sayidah Nur, S.Pd.',
            'id_jabatan' => '3',
        ]);

        DB::table('strukturals')->insert([
            'foto' => 'struktural/EVI SULASTRI, S.PD.png',
            'nama' => 'Evi Sulastri, S.Pd.',
            'id_jabatan' => '3',
        ]);
    }
}
