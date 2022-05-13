<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->boolean(),
            'email' => $this->faker->safeEmail,
            'postcode' =>$this->faker->randomNumber(7),
            'address' =>$this->faker->country,
            'building_name' =>$this->faker->word,
            'opinion' =>$this->faker->realText()
        ];
    }
}
