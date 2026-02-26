<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
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
            'center_id' => null, 

        'first_name' => null,
        'middle_name' => null,
        'last_name' => null,

        'address' => null,
        'village' => null,
        'taluko' => null,
        'district' => null,

        'phone_number' => 9999999999,

        'email' => 'admin@mail.com',

        'password' => Hash::make('123456'),

        'role' => 'admin',

        'created_by' => null,
        'updated_by' => null,
        'deleted_by' => null,
        ];
    }
}
