<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TRUNCATE TABLE
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'nama'      => 'Muslim',
            'username'  => 'muslim',
            'email'     => 'dmooez.dev@gmail.com',
            'role'      => 'admin',
            'password'  => Hash::make('password'),
            'status'    => 'active'
        ]);

        User::create([
            'nama'      => 'Piedrosa',
            'username'  => 'piedrosa',
            'email'     => 'dmooez.admin@gmail.com',
            'role'      => 'user',
            'password'  => Hash::make('password'),
            'status'    => 'active'
        ]);
    }
}
