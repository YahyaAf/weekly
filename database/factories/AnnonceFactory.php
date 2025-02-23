<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Annonce;
use App\Models\User;
use App\Models\Category;

class AnnonceFactory extends Factory
{
    protected $model = Annonce::class;

    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'prix' => $this->faker->randomFloat(2, 10, 1000), 
            'image' => 'annonces/default.jpg', 
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(), 
            'categorie_id' => Category::inRandomOrder()->first()->id ?? Category::factory(), 
            'status' => $this->faker->randomElement(['actif', 'brouillon', 'archivé']),
        ];
    }
}
