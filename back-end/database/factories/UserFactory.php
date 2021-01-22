<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'rl_rank_id' => $this->faker->randomDigitNotNull,
        'team_id' => $this->faker->randomDigitNotNull,
        'password' => $this->faker->word,
        'email' => $this->faker->word,
        'name' => $this->faker->word,
        'username' => $this->faker->word,
        'steamid' => $this->faker->word,
        'nick' => $this->faker->word,
        'platform' => $this->faker->word,
        'rank_status' => $this->faker->word,
        'bio' => $this->faker->word,
        'picture' => $this->faker->word,
        'cover' => $this->faker->word,
        'email_verified_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
