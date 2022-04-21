<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminCategoriesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_status_success(): void
    {
        $response = $this->get(route('admin.categories.index'));

        $response->assertStatus(200);
    }

	public function test_create_status_success(): void
	{
		$response = $this->get(route('admin.categories.create'));

		$response->assertStatus(200);
	}

	public function test_store_categories_success(): void
	{
		$data = [
			'title' => 'Some title',
			'description' => 'Some text'
		];
		$response = $this->post(route('admin.categories.store'), $data);

		$response->assertJson($data)
			     ->assertCreated();
	}
}
