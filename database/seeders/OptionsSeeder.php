<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Faker\Factory as Faker;
 

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'type' => 'religion',
                'kode' => 'I',
                'value' => 'Islam',
                'urut' => '1',
            ],[
                'type' => 'religion',
                'kode' => 'K',
                'value' => 'Katolik',
                'urut' => '2',
            ],[
                'type' => 'religion',
                'kode' => 'P',
                'value' => 'Protestan',
                'urut' => '3',
            ],[
                'type' => 'religion',
                'kode' => 'H',
                'value' => 'Hindu',
                'urut' => '4',
            ],[
                'type' => 'religion',
                'kode' => 'B',
                'value' => 'Buddha',
                'urut' => '5',
            ],[
                'type' => 'religion',
                'kode' => 'Kh',
                'value' => 'Khonghucu',
                'urut' => '6',
            ],[
                'type' => 'education',
                'kode' => 'SD',
                'value' => 'Sekolah Dasar',
                'urut' => '1',
            ],[
                'type' => 'education',
                'kode' => 'SMP',
                'value' => 'Sekolah Menengah Pertama',
                'urut' => '2',
            ],[
                'type' => 'education',
                'kode' => 'SMA',
                'value' => 'Sekolah Menengah Atas',
                'urut' => '3',
            ],[
                'type' => 'education',
                'kode' => 'DIII',
                'value' => 'Diploma 3',
                'urut' => '4',
            ],[
                'type' => 'education',
                'kode' => 'DIV',
                'value' => 'Diploma 4',
                'urut' => '5',
            ],[
                'type' => 'education',
                'kode' => 'S1',
                'value' => 'Strata 1',
                'urut' => '6',
            ],[
                'type' => 'education',
                'kode' => 'S1',
                'value' => 'Strata 2',
                'urut' => '7',
            ],[
                'type' => 'education',
                'kode' => 'S3',
                'value' => 'Strata 3',
                'urut' => '8',
            ],[
                'type' => 'marriage',
                'kode' => 'TK/0',
                'value' => 'Tidak Kawin',
                'urut' => '1',
            ],[
                'type' => 'marriage',
                'kode' => 'TK/1',
                'value' => 'Tidak Kawin 1 Tanggungan',
                'urut' => '2',
            ],[
                'type' => 'marriage',
                'kode' => 'TK/2',
                'value' => 'Tidak Kawin 2 Tanggungan',
                'urut' => '3',
            ],[
                'type' => 'marriage',
                'kode' => 'TK/3',
                'value' => 'Tidak Kawin 3 Tanggungan',
                'urut' => '4',
            ],[
                'type' => 'marriage',
                'kode' => 'K/0',
                'value' => 'Kawin',
                'urut' => '5',
            ],[
                'type' => 'marriage',
                'kode' => 'K/1',
                'value' => 'Kawin 1 Tanggungan',
                'urut' => '6',
            ],[
                'type' => 'marriage',
                'kode' => 'K/2',
                'value' => 'Kawin 2 Tanggungan',
                'urut' => '7',
            ],[
                'type' => 'marriage',
                'kode' => 'K/3',
                'value' => 'Kawin 3 Tanggungan',
                'urut' => '8',
            ]
        ];
        DB::table('options')->insert($data);        
    }
}
