<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Record>
 */
class RecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data['name'] = fake()->name();
        $data['address'] = fake()->address();
        $data['city'] = fake()->city();
        $data['phone'] = fake()->phoneNumber();
        $data['email'] = fake()->email();
        $data['country_code'] = fake()->countryCode();
        $data['company'] = fake()->company();
        $data['number'] = fake()->randomNumber();
        $data['digit'] = fake()->randomDigit();
        $data['float'] = fake()->randomFloat();

        return [
          'data' => json_encode($data),
        ];
    }
}
