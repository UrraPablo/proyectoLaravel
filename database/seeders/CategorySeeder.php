<?php

namespace Database\Seeders;

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'CINE Y TV'],
            ['name' => 'DEPORTES'],
            ['name' => 'VIDEOJUEGOS'],
            ['name' => 'MÚSICA'],
            ['name' => 'TECNO'],
            ['name' => 'SHOWS'],
            ['name' => 'PODCASTS'],
            ['name' => 'LIBROS']
        ];

        DB::table('categories')->insert($categories);
    }
}