<?php

namespace Database\Seeders\User;

use App\Enums\Role\UserRole;
use App\Enums\User\UserType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->withPersonalTeam()->create([
            'name' => 'Super Admin',
            'created_by' => null,
            'company_id' => null,
            'user_type' => UserType::Admin,
            'email' => 'kina98@gmx.ch',
            'password' => Hash::make('Navlak1982'),
        ])->assignRole(UserRole::SuperAdmin);

        User::factory(15)->create([
            'user_type' => UserType::Admin,
            'created_by' => 1,
            'company_id' => null,
        ])->assignRole(UserRole::Sales);
    }
}
