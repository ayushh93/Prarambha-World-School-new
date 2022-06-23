<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use DB as DBS;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array(
                'name'=>'Admin',
                'email'=>'web@prarambhaschool.com',
                'password'=>Hash::make('pr@r@mbh@sch00!'),
                'role'=>'admin',
            )
        );
        DBS::table('admins')->insert($users);
    }
}
