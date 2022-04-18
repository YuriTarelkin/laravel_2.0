<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_status_success(): void
    {
        $response = $this->get(route('news'));

        $response->assertStatus(200);
    }

    public function test_getInfo_status_success(): void
	{
		$response = $this->get(route('news.getInfo'));

		$response->assertStatus(200);
	}

    public function test_store_news_success(): void
	{
		$data = [
			'author' => 'Admin',
            'email' => 'Some email',
			'description' => 'Some text'
		];
		$response = $this->post(route('news.store'), $data);

		$response->assertJson($data)
			     ->assertCreated();
	}  
}
