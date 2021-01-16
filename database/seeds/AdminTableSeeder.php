<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate(); //2回目実行の際にシーダー情報をクリア
        DB::table('admins')->insert([
            'id' => '1',
            'name' => 'sampleadmin',
            'email' => 'sample@sample.com',
            'password' => 'sample1234'
        ]);
    }
}
