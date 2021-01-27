<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company = $this->faker->company;
        $suffix = $this->faker->companySuffix;

        return [
            'name' => "{$company} {$suffix}",
            'alias' =>  str_replace(' ', '', trim($company)),
            'description' => $this->faker->realText(150),
            'email' => $this->faker->companyEmail,
            'token' => $this->faker->sha256,
            'active' => $this->faker->boolean(50)
        ];
    }
}
