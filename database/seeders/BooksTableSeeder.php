<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('books')->insert([
        [
            'title' => 'El gran Gatsby',
            'author' => 'F. Scott Fitzgerald',
            'description' => 'Una descripción del libro',
            'image' => 'https://cdn-iphjd.nitrocdn.com/tYEzXOsWcOXmtTTvQEPwMXzmMRALYZDP/assets/images/optimized/rev-7817916/wp-content/uploads/2023/04/Por-que-los-perros-salchichas-son-alargados.jpg',
            'category' => 'Novela',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => '1984',
            'author' => 'George Orwell',
            'description' => 'Una descripción del libro',
            'image' => 'https://cdn-iphjd.nitrocdn.com/tYEzXOsWcOXmtTTvQEPwMXzmMRALYZDP/assets/images/optimized/rev-7817916/wp-content/uploads/2023/01/perro-salchicha-mini.jpg',
            'category' => 'Ciencia ficción',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Matar a un ruiseñor',
            'author' => 'Harper Lee',
            'description' => 'Una descripción del libro',
            'image' => 'https://cdn-iphjd.nitrocdn.com/tYEzXOsWcOXmtTTvQEPwMXzmMRALYZDP/assets/images/optimized/rev-7817916/wp-content/uploads/2023/04/Por-que-los-perros-salchichas-son-alargados.jpg',
            'category' => 'Novela',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Cien años de soledad',
            'author' => 'Gabriel García Márquez',
            'description' => 'Una descripción del libro',
            'image' => 'https://cdn-iphjd.nitrocdn.com/tYEzXOsWcOXmtTTvQEPwMXzmMRALYZDP/assets/images/optimized/rev-7817916/wp-content/uploads/2023/04/Por-que-los-perros-salchichas-son-alargados.jpg',
            'category' => 'Realismo mágico',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}

}
