<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Folosim DB direct, nu mai avem nevoie de Modelul City
    \Illuminate\Support\Facades\DB::table('cities')->truncate();

    $filePath = database_path('data/orase.csv');
    
    if (!file_exists($filePath)) {
        $this->command->error("CSV-ul nu e la $filePath");
        return;
    }

    $file = fopen($filePath, 'r');
    fgetcsv($file); // Sărim peste header

    while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
        // Inserăm direct în tabelă folosind Query Builder (SQL sub capotă)
        \Illuminate\Support\Facades\DB::table('cities')->insert([
            'name'       => $data[0],
            'county'     => $data[1],
            'lat'        => (float)$data[2],
            'lon'        => (float)$data[3],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    fclose($file);
    $this->command->info("Gata! Orașele au fost importate prin SQL.");
}
}
