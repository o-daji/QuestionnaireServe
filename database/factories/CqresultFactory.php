<?php

namespace Database\Factories;

use App\Models\Cqresult;
use Illuminate\Database\Eloquent\Factories\Factory;

class CqresultFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cqresult::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'cqid' => $this->faker->sentence(),
            'construction_no' => $this->faker->randomNumber(8),
            'customer_name' => $this->faker->company(),
            'operating_schedule_sales' => $this->faker->boolean(50),
            'operating_schedule_design' => $this->faker->boolean(50),
            'operating_schedule_Construction' => $this->faker->boolean(50),
            'operating_date_st' => $this->faker->date($format='Y-m-d',$max='now'),
            'operating_date_ed' => $this->faker->date($format='Y-m-d',$max='now'),
            'adv_permission' => $this->faker->boolean(50),
            'answer1' => $this->faker->numberBetween(1,5),
            'answer2' => $this->faker->numberBetween(1,5),
            'answer3' => $this->faker->numberBetween(1,5),
            'answer4' => $this->faker->numberBetween(1,5),
            'answer5' => $this->faker->numberBetween(1,5),
            'answer6' => $this->faker->numberBetween(1,5),
            'answer7' => $this->faker->numberBetween(1,5),
            'answer_freetext' => $this->faker->sentence(),
        ];
    }
}
