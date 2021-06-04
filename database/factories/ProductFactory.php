<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'name' => $this->faker->name(),
           'quantity' => $this->faker->numberBetween(1,800),
           'price' => $this->faker->randomFloat(1,0,300),
           'image' => $this->faker->image(public_path('images'),640,640,null,false,true), // create defulte image
        ];
    }
}
