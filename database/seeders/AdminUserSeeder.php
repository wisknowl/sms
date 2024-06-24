<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;


class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        $cashierUser = User::create([
            'name' => 'Zunita',
            'email' => 'zunita@example.com',
            'password' => Hash::make('zunitapassword'),
        ]);
        $cashierRole = role::where('name', 'cashier')->first();
        $cashierUser->assignRole($cashierRole);
    }
}
