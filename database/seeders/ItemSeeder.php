<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        $faker = Faker::create();

        // Crear dos usuarios
        $user1 = User::create([
            'name' => 'Usuario Uno',
            'email' => 'usuario1@example.com',
            'password' => Hash::make('password'),
        ]);

        $user2 = User::create([
            'name' => 'Usuario Dos',
            'email' => 'usuario2@example.com',
            'password' => Hash::make('password'),
        ]);

        // Crear algunas categorías (si no existen)
        $categories = Category::factory(3)->create();

        // Crear 15 items
        for ($i = 0; $i < 15; $i++) {
            $itemType = $faker->randomElement(['text', 'image', 'archive']);
            $tagsArray = $faker->words(rand(1, 5));

            Item::create([
                'name' => $faker->sentence(rand(3, 7)),
                'description' => $faker->paragraph(rand(2, 5)),
                'title' => $faker->sentence(rand(1, 3)), // Agregando el atributo 'title'
                'price' => $faker->randomFloat(2, 10, 100),
                'tags' => $tagsArray,
                'item_type' => $itemType,
                'text_content' => $itemType === 'text' ? $faker->paragraphs(rand(3, 6), true) : null,
                'is_featured' => $faker->boolean(30), // 30% de probabilidad de ser destacado
                'is_active' => $faker->boolean(80),   // 80% de probabilidad de estar activo
                'created_by' => $faker->randomElement([$user1->id, $user2->id]),
                'category_id' => $categories->random()->id,
            ]);
        }
    }



    
}
