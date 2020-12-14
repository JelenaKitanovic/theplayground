<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            Customer::ATTRIBUTE_FULL_NAME => $this->faker->name,
            Customer::ATTRIBUTE_EMAIL => $this->faker->unique()->safeEmail,
            Customer::ATTRIBUTE_GOAL => $this->faker->sentence,
            Customer::ATTRIBUTE_AGE => $this->faker->numberBetween(25, 35),
            Customer::ATTRIBUTE_IDEAL_PARTNER => "ideal_partner",
            Customer::ATTRIBUTE_FAVOURITE_QUOTE => $this->faker->sentence,
            Customer::ATTRIBUTE_FAVOURITE_GAME => $this->faker->sentence,
            Customer::ATTRIBUTE_AVAILABILITY => $this->faker->sentence,
            Customer::ATTRIBUTE_IS_MATCHED => $this->faker->boolean
        ];
    }
}
