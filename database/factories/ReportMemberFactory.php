<?php

namespace Database\Factories;

use App\Models\ReportMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportMemberFactory extends Factory
{
    protected $model = ReportMember::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_course' => $this->faker->date(),
            'book' => $this->faker->word,
            'contact' => $this->faker->name(),
            'attendance' => $this->faker->numberBetween(1, 3),
            'evidence' => $this->faker->text,
            'member_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
