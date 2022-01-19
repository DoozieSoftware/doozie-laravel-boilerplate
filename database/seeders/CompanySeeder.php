<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Doozie Software Solutions',
            'abbrevation' => 'dooziesoft',
            'domain' => NULL,
            'country' => 'India',
            'state' => 'Karnataka',
            'logo_path' => NULL,
            'pan_number' => 'AAEFM8654Q',
            'gst_number' => '29AAEFM8654Q1ZB',
            'certificate' => NULL,
            'phone_no' => 9876543210,
            'email' => 'dooziesoft@gmail.com',
            'website' => 'https://dooziesoft.com',
            'address' => '27, 5th Cross Rd, Avalahalli, Banashankari Stage I, Bapuji Nagar, Bengaluru, Karnataka 560026',
            'created_by' => NULL,
            'updated_by' => NULL,
            'created_at' => NULL,
            'updated_at' => NULL,
        ]);
    }
}
