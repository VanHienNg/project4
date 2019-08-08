<?php

use Illuminate\Database\Seeder;
use App\Staff;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::truncate();

        for($i = 0; $i < 20; $i++) {
            Staff::create([
                'name' => "Airi".$i,
                'position' => "Staff".$i,
                'office' => "Japan".$i,
                'age' => 36+$i,
                'start_date' => "2009-10-12",
                'salary' => 1200000+$i,
            ]);
        }
    }
}
