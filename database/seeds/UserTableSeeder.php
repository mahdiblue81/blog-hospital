<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $admin=User::create([
            'name'=>'admin user',
            'email'=>'Teacher@Teacher.com',
            'password'=>hash::make('password')
        ]);



        $admin->roles()->sync($admin->id);

    }
}
