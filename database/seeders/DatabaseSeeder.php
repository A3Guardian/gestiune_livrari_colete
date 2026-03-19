<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // 1. Întâi chemăm CitySeeder ca să umplem tabelul cities
    $this->call([
        CitySeeder::class,
    ]);

    // 2. ABIA ACUM creăm utilizatorul, pentru că ID-ul 1 există deja
    User::factory()->create([
        'name' => 'Cristina Cristea',
        'email' => 'cristina@gmail.com',
        'password' => Hash::make('parola_ta_aici'),
        'role' => 'admin',
        'city_id' => 5,
        'address' => 'Strada Libertății, Nr. 20, Bl. A, Ap. 5',
    ]);
}
}
