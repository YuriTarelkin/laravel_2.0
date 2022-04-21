<?php

declare(strict_types=1);

namespace App\Contracts;

interface Parser
{
	/**
	 * @param string $url
	 * @return void
	 */
	public function setUrl(string $url): self;

	/**
	 * @return array
	 */
	public function saveNews(): void;
} 