<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'over_name' => '野比',
            'under_name' => 'のび太',
            'over_name_kana' => 'ノビ',
            'under_name_kana' => 'ノビタ',
            'mail_address' => 'nobita@nnn',
            'sex' => '1',
            'birth_day' => '1994-08-07',
            'role' => '4',
            'password' => bcrypt('password'),
        ]);
    }
}
