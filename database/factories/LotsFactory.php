<?php

namespace Database\Factories;

use App\Models\Lots;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lots>
 */
class LotsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Lots::class;
    public function definition()
    {
        return [
            'name' => $this->faker->paragraph,
            'description' => $this->faker->sentence,
            'category_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
