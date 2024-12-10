<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Capture;
use Illuminate\Support\Str;

class CaptureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        sleep(3);
          // Generate an array of unique numbers between 1 and 999
          $uniquePayrollNumbers = range(1, 999);
          shuffle($uniquePayrollNumbers); // Shuffle to randomize
  
          foreach ($uniquePayrollNumbers as $payrollNo) {
              Capture::create([
                  'payroll_no' => $payrollNo,
                  'path' => 'path/to/file_' . Str::random(5) . '.jpg',
                  'captured_by' => 'User' . rand(1, 50),
                  'captured_at' => now(),
              ]);
  
              sleep(1); // Pause for 0.5 seconds
              echo "good";
          }
        
    }



    // public function run(): void
    // {
    //     sleep(2); // Delay before starting

    //     // Clear the table
    //     Capture::truncate();

    //     // Array of file paths
    //     $imagePaths = [
    //         'pictures/dswd-payout-lianga-c4-day-1/5737_1716250693.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6387_1716250818.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6681_1716250848.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/5739_1716250855.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6081_1716250880.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6403_1716250884.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6605_1716250907.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6621_1716250929.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6571_1716250934.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/5977_1716250956.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/5700_1716250967.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/5768_1716250972.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/5694_1716251071.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6420_1716251105.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6744_1716251126.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/5695_1716251153.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6487_1716251174.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/5697_1716251203.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6295_1716251234.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6509_1716251354.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6254_1716251395.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/5693_1716251415.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/5969_1716251448.jpg',
    //         'pictures/dswd-payout-lianga-c4-day-1/6395_1716251469.jpg',
    //     ];

    //     // Shuffle the paths to randomize their order
    //     shuffle($imagePaths);

    //     // Generate an array of unique payroll numbers
    //     $uniquePayrollNumbers = range(1, 999);
    //     shuffle($uniquePayrollNumbers);

    //     $count = min(count($uniquePayrollNumbers), count($imagePaths));

    //     for ($i = 0; $i < $count; $i++) {
    //         Capture::create([
    //             'payroll_no' => $uniquePayrollNumbers[$i],
    //             'path' => $imagePaths[$i],
    //             'captured_by' => 'User' . rand(1, 50),
    //             'captured_at' => now(),
    //         ]);

    //         sleep(1); // Pause for 1 second
    //     }
    // }
}
