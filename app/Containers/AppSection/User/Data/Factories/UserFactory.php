<?php

namespace App\Containers\AppSection\User\Data\Factories;

use App\Containers\AppSection\Establecimiento\Models\Establecimiento;
use App\Containers\AppSection\User\Enums\Gender;
use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Factories\Factory as ParentFactory;
use Illuminate\Support\Str;

/**
 * @template TModel of User
 *
 * @extends ParentFactory<TModel>
 */
class UserFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->userName(),
            'nombre_completo' => $this->faker->name() . ' ' . $this->faker->lastName(),
            'cargo' => $this->faker->jobTitle(),
            'password' => 'password',
            'establecimiento_id' => Establecimiento::inRandomOrder()->value('id'),
        ];
    }

    public function admin(): static
    {
        return $this->afterCreating(function (User $user) {
            $user->assignRole(config('appSection-authorization.admin_role'));
        });
    }

    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function verified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => now(),
            ];
        });
    }

    public function gender(Gender $gender): static
    {
        return $this->state(function (array $attributes) use ($gender) {
            return compact('gender');
        });
    }
}
