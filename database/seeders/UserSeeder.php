<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name' => 'satrya',
            'position' => 'Laboran',
            'email' => 'ssatrya717@gmail.com',
            'password' => Hash::make('satryaaja'),
        ]);

        User::create([
            'full_name' => 'June',
            'position' => 'Laboran',
            'email' => 'deborajunyar@gmail.com',
            'password' => Hash::make('terserah'),
        ]);

        User::create([
            'full_name' => 'Budi Santosa',
            'position' => 'Laboran',
            'email' => 'sansBudi@gmail.com',
            'password' => Hash::make('RplHebat01'),
        ]);
    }


}
