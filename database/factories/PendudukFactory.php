<?php

namespace Database\Factories;

use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penduduk>
 */
class PendudukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Penduduk::class;

    public function definition(): array
    {
        return [
            'nik' => fake()->unique()->numerify(str_repeat('#', 16)),
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'jk' => fake()->randomElement(['P', 'L']),
        ];
    }
}
