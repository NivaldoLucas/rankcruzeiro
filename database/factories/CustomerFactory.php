<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'store_name' => $this->faker->company,
            'store_owner' => $this->faker->name,
            'logo_url' => $this->faker->imageUrl(),
            'dobrou_mes1' => $this->faker->boolean,
            'dobrou_mes2' => $this->faker->boolean,
            'referral_1' => $this->faker->boolean,
            'referral_2' => $this->faker->boolean,
            'referral_3' => $this->faker->boolean,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
