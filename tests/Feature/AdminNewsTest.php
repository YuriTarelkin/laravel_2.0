<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminNewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_status_success(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }

	public function test_create_status_success(): void
	{
		$response = $this->get(route('admin.news.create'));

		$response->assertStatus(200);
	}

	public function test_store_news_success(): void
	{
		$data = [
			'title' => 'Some title',
			'author' => 'Admin',
			'description' => 'Some text'
		];
		$response = $this->post(route('admin.news.store'), $data);

		$response->assertJson($data)
			     ->assertCreated();
	}

}
