<?php

use Illuminate\Database\Seeder;
use App\model\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->delete();
 
        Role::create([
            'name'   => 'member'
        ]);
 
        Role::create([
            'name'   => 'admin'
        ]);

        Role::create([
            'name'   => 'desainer'
        ]);

        Role::create([
            'name'   => 'bos'
        ]);
    }
}
