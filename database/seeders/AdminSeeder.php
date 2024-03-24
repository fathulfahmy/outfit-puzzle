<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@outfitpuzzle.com',
            'password' => Hash::make('admin123')
        ]);
        $user->assignRole($admin);
    }
}
