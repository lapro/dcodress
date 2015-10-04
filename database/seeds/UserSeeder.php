<?php

use Illuminate\Database\Seeder;
use App\Model\User;
use App\Model\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
 
        $adminRole = Role::whereName('bos')->first();
        $userRole = Role::whereName('member')->first();
 
        $user = User::create(array(
            'name'    => 'John',
            'email'         => 'j.doe@codingo.me',
            'password'      => Hash::make('password')
        ));
        $user->assignRole($adminRole);
 
        $user = User::create(array(
            'name'    => 'Jane',
            'email'         => 'jane.doe@codingo.me',
            'password'      => Hash::make('janesPassword')
        ));
        $user->assignRole($userRole);
    }
}
