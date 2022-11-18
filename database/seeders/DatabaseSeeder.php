<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\Barang::factory(10)->create();

        \App\Models\Barang::factory()->create([
            'name' => 'Purple Reign FA',
            'amount' => 455000,
            'code'  => 'FA4532'
        ]);

        \App\Models\Barang::factory()->create([
            'name' => 'Enchangting Belle',
            'amount' => 336000,
            'code'  => 'FA3518'
        ]);

        \App\Models\Diskon::factory()->create([
            'code' => 'FA111',
            'discount' => 10,
        ]);

        \App\Models\Diskon::factory()->create([
            'code' => 'FA222',
            'discount' => null,
        ]);

        \App\Models\Diskon::factory()->create([
            'code' => 'FA333',
            'discount' => 6,
        ]);

        \App\Models\Diskon::factory()->create([
            'code' => 'FA444',
            'discount' => null,
        ]);
    }
}
