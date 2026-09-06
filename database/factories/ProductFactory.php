<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $name = fake()->company() . ' ' . fake()->words(2, true);

        return [
            // Mengambil id kategori yang sudah ada di database secara acak
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            
            // Informasi umum
            'name'        => $name,
            'slug'        => Str::slug($name) . '-' . fake()->unique()->randomNumber(4), // Membuat slug unik
            'brand'       => fake()->company(),
            'price'       => fake()->randomFloat(2, 5000000, 25000000), // Harga acak antara 5 jt - 25 jt dengan 2 desimal
            'stock'       => fake()->numberBetween(5, 50),

            // Spesifikasi teknis (Disertakan data string acak/nullable)
            'processor'   => fake()->randomElement(['Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5', 'AMD Ryzen 7']),
            'ram'         => fake()->randomElement(['8GB DDR4', '16GB DDR5', '32GB DDR5']),
            'storage'     => fake()->randomElement(['512GB NVMe SSD', '1TB NVMe SSD']),
            'display'     => fake()->randomElement(['14" FHD IPS', '15.6" QHD 165Hz', '16" OLED']),
            'graphics'    => fake()->randomElement(['Intel Iris Xe', 'NVIDIA RTX 4050', 'NVIDIA RTX 4060', 'AMD Radeon']),
            'battery'     => fake()->randomElement(['3-Cell 50Wh', '4-Cell 70Wh', '99Wh Battery']),

            'description' => fake()->paragraph(),
            'image'       => 'product-default.jpg', // Diisi nama file default untuk placeholder gambar
        ];
    }
}
