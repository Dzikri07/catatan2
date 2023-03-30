<?php

namespace Database\Seeders;

use App\Models\laporanBug;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaporanBugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        laporanBug::factory()->count(10)->create();
    }
    
}
