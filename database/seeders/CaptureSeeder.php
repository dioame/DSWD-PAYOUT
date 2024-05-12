<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Capture;

class CaptureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Capture::truncate();
        for ($i = 1; $i <= 100000; $i++) {
            Capture::create([
                'payroll_no' => $i,
                'path' => 'pictures/5000_1707284573.jpg',
                'captured_by' => '16-11570',
                'captured_at' => date('Y-m-d H:i:s')
            ]);
        }
        
    }
}
