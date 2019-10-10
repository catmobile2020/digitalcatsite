<?php

use Illuminate\Database\Seeder;

class PharmacyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Pharmacy::create([
            'name'=>'test',
            'status'=>true,
            'lat'=>123,
            'lng'=>123,
            'distance'=>100,
        ]);
    }
}
