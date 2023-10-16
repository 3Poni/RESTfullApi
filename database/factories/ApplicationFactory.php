<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    protected $model = Application::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = "{$this->faker->firstName()} {$this->faker->lastName()}";
        $dealer = $this->faker->company();
        $sum = $this->faker->numberBetween(450000, 20000000);
        $term = $this->faker->numberBetween(3, 120);
        $rate = $this->faker->numberBetween(3, 25);
        $text = $this->faker->text(30);
        $status = $this->faker->randomElement(['новая', 'одобрена', 'в процессе', 'отклонена']);
        $bank = $this->faker->numberBetween(1, 3);

        return [
            'dealer_name' => $dealer,
            'dealer_manager' => $name,
            'credit_sum' => $sum,
            'credit_term' => $term,
            'credit_rate' => $rate,
            'credit_description' => $text,
            'credit_status' => $status,
            'bank_id' => $bank,
        ];
    }
}
