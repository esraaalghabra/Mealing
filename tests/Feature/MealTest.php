<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Meal;
use App\Models\Serving;
use App\Models\Timing;

class MealTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    
    /**
     * test create new meal.
     *
     * @return void
     */
    public function testNewMeal()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/meals', [
            'name' => $this->faker->name,
            'serving_id' => Serving::factory()->create()->id,
            'adults' => $this->faker->boolean,
            'kids' => $this->faker->boolean,
            'timing_id' => Timing::factory()->create()->id,
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseCount('meals', 1);
    }

    /**
     * test create new meal with name null.
     *
     * @return void
     */
    public function testNewMealWithNameNull()
    {
        $response = $this->post('/meals', [
            'name' => null,
            'serving_id' => Serving::factory()->create()->id,
            'adults' => $this->faker->boolean,
            'kids' => $this->faker->boolean,
            'timing_id' => Timing::factory()->create()->id,
        ]);

        $response->assertSessionHasErrors(['name']);
    }

    /**
     * test create new meal with serving null.
     *
     * @return void
     */
    public function testNewMealWithServingNull()
    {
        $response = $this->post('/meals', [
            'name' => $this->faker->name,
            'serving_id' => null,
            'adults' => $this->faker->boolean,
            'kids' => $this->faker->boolean,
            'timing_id' => Timing::factory()->create()->id,
        ]);

        $response->assertSessionHasErrors(['serving_id']);
    }

    /**
     * test create new meal with timing null.
     *
     * @return void
     */
    public function testNewMealWithTimingNull()
    {
        $response = $this->post('/meals', [
            'name' => $this->faker->name,
            'serving_id' => Serving::factory()->create()->id,
            'adults' => $this->faker->boolean,
            'kids' => $this->faker->boolean,
            'timing_id' => null,
        ]);

        $response->assertSessionHasErrors(['timing_id']);
    }

    /**
     * test create new meal with adults null.
     *
     * @return void
     */
    public function testNewMealWithAdultsNull()
    {
        $response = $this->post('/meals', [
            'name' => $this->faker->name,
            'serving_id' => Serving::factory()->create()->id,
            'adults' => null,
            'kids' => $this->faker->boolean,
            'timing_id' => Timing::factory()->create()->id,
        ]);

        $response->assertSessionHasErrors(['adults']);
    }

    /**
     * test create new meal with kids null.
     *
     * @return void
     */
    public function testNewMealWithKidsNull()
    {
        $response = $this->post('/meals', [
            'name' => $this->faker->name,
            'serving_id' => Serving::factory()->create()->id,
            'adults' => $this->faker->boolean,
            'kids' => null,
            'timing_id' => Timing::factory()->create()->id,
        ]);

        $response->assertSessionHasErrors(['kids']);
    }
}
