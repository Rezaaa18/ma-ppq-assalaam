<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatans')->insert([
            'nama_jabatan' => 'Kepala Sekolah',
        ]);
        DB::table('jabatans')->insert([
            'nama_jabatan' => 'Wakil Kepala Sekolah',
        ]);
        DB::table('jabatans')->insert([
            'nama_jabatan' => 'Guru',
        ]);
        DB::table('jabatans')->insert([
            'nama_jabatan' => 'Staff',
        ]);
        DB::table('jabatans')->insert([
            'nama_jabatan' => 'Karyawan',
        ]);
    }
}
