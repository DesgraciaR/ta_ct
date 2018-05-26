<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'nip_baru' => 'admin',
        	'nama' => 'admin',
        	'password' => bcrypt('admin'),
        	'level' => null,
        	'ppk' => null,
        ]);
    }
}
