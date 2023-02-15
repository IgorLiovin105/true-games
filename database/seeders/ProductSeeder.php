<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Battlefield',
            'img' => 'battlefield.jpg',
            'description' => 'Онлайн игра в жанре шутер от первого лица',
            'model' => '2042',
            'country' => 'USA',
            'year' => 2021,
            'price' => 1999.00,
            'quantity' => rand(1, 100),
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Nintendo',
            'img' => 'nintendo.jpg',
            'description' => 'Портативная игровая приставка',
            'model' => 'Switch',
            'country' => 'China',
            'year' => 2017,
            'price' => 23999.00,
            'quantity' => rand(1, 100),
            'category_id' => 2
        ]);
        Product::create([
            'name' => 'Terraria',
            'img' => 'terraria.jpg',
            'description' => 'РПГ платформер, в котором можно стороить дома, подземелья, крафтить предметы, убивать боссов',
            'model' => 'Terraria',
            'country' => 'USA',
            'year' => 2009,
            'price' => 250.00,
            'quantity' => rand(1, 100),
            'category_id' => 1
        ]);
        Product::create([
            'name' => 'Зарядка для телефона',
            'img' => 'zaryadka.png',
            'description' => 'Онлайн игра в жанре шутер от первого лица',
            'model' => 'Apple',
            'country' => 'USA',
            'year' => 2023,
            'price' => 19999.00,
            'quantity' => rand(1, 100),
            'category_id' => 3
        ]);
    }
}
