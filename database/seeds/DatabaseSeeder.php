<?php

use App\Department;
use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        User::create([
            'name' => 'Super Admin',
            'password' => bcrypt(123456),
            'email' => 'mahbubulalam5676@gmail.com',
            'role_id' => 1,
            'unique_id' => 11112222,
            'status' => 1,
        ]);

        Department::create([
            'name' => 'All Department'
        ]);
        Department::create([
            'name' => 'CSE'
        ]);
        Department::create([
            'name' => 'EEE'
        ]);
        Department::create([
            'name' => 'CE'
        ]);
        Department::create([
            'name' => 'Architecture'
        ]);
        Department::create([
            'name' => 'ETE'
        ]);
        Department::create([
            'name' => 'Pharmacy'
        ]);
        Department::create([
            'name' => 'English'
        ]);
        Department::create([
            'name' => 'BBA'
        ]);
        Department::create([
            'name' => 'SWE'
        ]);
        Department::create([
            'name' => 'NFE'
        ]);
    }
}
