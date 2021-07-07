<?php

namespace Database\Factories;

use App\Models\Agency;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AgencyFactory extends Factory
{

    protected $model = Agency::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->numberBetween(1000,9999999),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->name(),
            'manager' => $this->faker->name(),
            'status' => $this->faker->numberBetween(0,1),
            'agent_code' => $this->faker->numberBetween(1101,1505),
        ];
    }
}
