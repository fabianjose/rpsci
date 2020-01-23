<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('services')->insert([
        "name" => 'Internet',
        "fields" =>  '1: {name: name, type: string}'
      ]);
    }
}
