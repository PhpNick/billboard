<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexPageTest extends TestCase
{
    /**
     * Тест загрузки главной страницы.
     *
     * @test
     */
    public function index_page_test()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
