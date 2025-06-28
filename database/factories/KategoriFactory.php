<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kategori>
 */
class KategoriFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $kategoriList = [
            'Matematika',
            'Bahasa Indonesia',
            'IPA',
            'IPS',
            'Teknologi',
            'Bahasa Inggris',
            'Seni Budaya',
            'Kesehatan',
            'Pendidikan Karakter',
            'Sejarah',
        ];
        return [
            'nama' => $this->faker->unique()->randomElement($kategoriList),
        ];
    }
}
