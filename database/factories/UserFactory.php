<?php

declare(strict_types=1);

namespace M12\Models\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use M12\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name'  => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => \Str::random(10),
        ];
    }
}
