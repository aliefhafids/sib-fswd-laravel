<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Group;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'T-Shirt',
            'code' => 'A0SP'
        ]);

        Category::create([
            'name' => 'Jacket',
            'code' => 'J01S'
        ]);

        Group::create([
            'name' => 'Admin',
            'code' => 'ADM'
        ]);

        Group::create([
            'name' => 'Staff',
            'code' => 'ST'
        ]);

        Group::create([
            'name' => 'Customer',
            'code' => 'CUST'
        ]);
        
        User::create([
            'name' => 'Staff',
            'email' => 'user@gmail.com',
            'password' => bcrypt('staff'),
            'group_id' => 2,
            'level' => 'staff',
            'phone' => '08123456789',
            'address' => 'Jl. Raya No. 1'
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'group_id' => 1,
            'level' => 'admin',
            'phone' => '08123456789',
            'address' => 'Jl. Raya No. 1'
        ]);


        // User::create([
        //     'name' => 'Customer',
        //     'email' => 'cus@gmail.com',
        //     'password' => bcrypt('cus123'),
        //     'group_id' => 3,
        //     'level' => 'customer',
        //     'phone' => '08123456789',
        //     'address' => 'Jl. Raya No. 1'
        // ]);
    }
}
