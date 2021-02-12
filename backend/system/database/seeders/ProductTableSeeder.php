<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            'name' => 'Memorial Card'
        ]);
        DB::table('product')->insert([
            'name' => 'Memories Style Memorial Card'
        ]);
        DB::table('product')->insert([
            'name' => 'Bookmark'
        ]);
        DB::table('product')->insert([
            'name' => 'Memorial style Bookmark'
        ]);
        DB::table('product')->insert([
            'name' => 'Acknowledgement Card'
        ]);
        DB::table('product')->insert([
            'name' => 'Keyring'
        ]);
        DB::table('product')->insert([
            'name' => 'Wallet'
        ]);
    }
}
