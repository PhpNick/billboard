<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class CreatePageTest extends TestCase
{
    /**
     * Тест загрузки страницы создания объявления.
     *
     * @test
     */
    public function create_page_test()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/cards/create');

        $response->assertStatus(200);
    }
}
