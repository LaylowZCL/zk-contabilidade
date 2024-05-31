<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyDetails>
 */
class CompanyDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->sentence(3, true),
            'website' => 'http://www.abc.com',
            'email'  => $this->faker->email(),
            'mobile_number' => $this->faker->e164PhoneNumber(),
            'postalcode' => $this->faker->randomNumber(6, true),
            'address' => $this->faker->address(),
            'logo' => 'abc.png',
            'invoice_slug' => $this->faker->text(5),
            'status' => 1,
        ];
    }
}
