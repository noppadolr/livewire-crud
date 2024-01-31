<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ContinentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('continents')->insert([
            [
                'continent_name' => 'เอเชีย',
                'created_at'=>Carbon::now(),
            ],
            [
                'continent_name' => 'แอฟริกา',
                'created_at'=>Carbon::now(),

            ],
            [
                'continent_name' => 'ยุโรป',
                'created_at'=>Carbon::now(),
            ],
            [
                'continent_name' => 'อเมริกาเหนือ',
                'created_at'=>Carbon::now(),
            ],
            [
                'continent_name' => 'อเมริกาใต้',
                'created_at'=>Carbon::now(),
            ],
            [
                'continent_name' => 'แอนตาร์กติกา',
                'created_at'=>Carbon::now(),
            ],
            [
                'continent_name' => 'ออสเตรเลีย',
                'created_at'=>Carbon::now(),
            ],


        ]);
    }
}
