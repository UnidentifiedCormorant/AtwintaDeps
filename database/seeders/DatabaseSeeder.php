<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Department;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;
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
        User::factory(50)->create();
        Department::factory(10)->create();
        Position::factory(35)->create();

        User::factory()->create([
            'name' => 'Lullen Lullenium',
            'email' => '123',
            'password' => \Hash::make('123'),
            'position_id' => Position::get()->random()->id,
        ]);

        $this->call([
            RoleSeeder::class,
            SetRolesSeeder::class,
        ]);
    }
}
