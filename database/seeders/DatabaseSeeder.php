<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //crear dato para admin
        $user = new User;
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = '12345678';
        $user->role = 'admin';

        $user->save();
        //crear dato para contable
        $user = new User;
        $user->name = 'contable';
        $user->email = 'contable@gmail.com';
        $user->password = '12345678';
        $user->role = 'contable';

        $user->save();
        //crear dato para almacenista
        $user = new User;
        $user->name = 'almacenista';
        $user->email = 'almacenista@gmail.com';
        $user->password = '12345678';
        $user->role = 'almacenista';

        $user->save();
        //crear datos para invitado
        $user = new User;
        $user->name = 'invitado';
        $user->email = 'invitado@gmail.com';
        $user->password = '12345678';
        $user->role = 'invitado';

        $user->save();

    }
}