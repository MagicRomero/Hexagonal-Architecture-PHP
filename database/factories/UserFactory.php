<?php

namespace Database\Factories;

use App\Models\{Client, Role, User};
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_reference' => Client::factory(),
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'email_verified_at' => now(),
            'role_name' => $this->faker->randomElement(Role::availableRoles()),
            'password' => 'password',
            'remember_token' => Str::random(10),
            'lang' => $this->faker->randomElement(config('languages')['available']),
            'status' => $this->faker->randomElement(['ACTIVE', 'PENDING', 'BLOCKED'])
        ];
    }
}
