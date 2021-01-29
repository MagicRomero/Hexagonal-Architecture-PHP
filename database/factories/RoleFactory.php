<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->randomElement(Role::availableRoles());

        return [
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'abilities' => [],
            'hash' => Hash::make($name)
        ];
    }
}
