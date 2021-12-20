<?php

namespace Database\Factories;

use App\Models\Package;
use App\Models\Customer;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Purchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => $this->faker->randomElement(Customer::pluck('id')->toArray()),
            'package_id' => $this->faker->randomElement(Package::pluck('id')->toArray()),
        ];
    }
}
