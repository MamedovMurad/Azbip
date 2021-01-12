<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'=>'Eynur',
            'email'=>'eynur.necefzade@gmail.com',
            'password'=>bcrypt(1234),
            ]

        );
    }
}
