<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MassageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Massage::factory(30)->create();

    }
}
