<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        return [
            'nama' => $this->faker->foodName(),
            'kategori' => mt_rand(1,2),
            'harga' => mt_rand(5000,20000),
            'status' => mt_rand(0,1)
        ];
    }
}
