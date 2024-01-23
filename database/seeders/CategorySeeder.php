<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Faker\Factory as Faker;
 

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'type' => 'category',
                'kode' => 'DIG',
                'value' => 'Digger',
                'urut' => '1',
            ],[
                'type' => 'category',
                'kode' => 'HAU',
                'value' => 'Hauler',
                'urut' => '2',
            ],[
                'type' => 'category',
                'kode' => 'DOZ',
                'value' => 'Dozer',
                'urut' => '3',
            ],[
                'type' => 'category',
                'kode' => 'GRD',
                'value' => 'Grader',
                'urut' => '4',
            ],[
                'type' => 'category',
                'kode' => 'OPS',
                'value' => 'Pengawas',
                'urut' => '5',
            ],[
                'type' => 'category',
                'kode' => 'OTH',
                'value' => 'Other',
                'urut' => '6',
            ]
        ];
        DB::table('options')->insert($data);        
    }
}

