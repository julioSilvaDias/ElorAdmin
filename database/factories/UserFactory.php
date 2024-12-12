<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Rol;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user' => fake()->userName(),
            'surname' => fake()->lastName(),
            'tel-1' => fake()->phoneNumber(),
            'tel-2' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'photo' => fake()->optional()->imageUrl(200, 200, 'people'),
            'dni' => fake()->unique()->regexify('[0-9]{8}[A-Z]'),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => fake()->optional()->dateTime(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
            'role_id' => Rol::inRandomOrder()->first()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
