<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $teljes_nevek = [
            "Kovács Alexandra",
            "Nagy Gergő",
            "Tóth Zsófia",
            "Varga Balázs",
            "Szabó Emese"
        ];
        $faker = Faker::create();

        return [
            "name" => $faker->randomElement($teljes_nevek),
            "email" => $faker->email(),
            "address" => $faker->streetAddress,
            "phone_number" => $faker->phoneNumber,
            "birth_date" => $faker->dateTimeBetween('-65 years', '-18 years')->format('Y-m-d')
        ];
    }
}
