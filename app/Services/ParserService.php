<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser as Contract;
use Orchestra\Parser\Xml\Facade as Parser;
use App\Models\Category;
use App\Models\News;
use App\Models\Scource;


class ParserService implements Contract
{
	protected string $url;

	/**
	 * @param string $url
	 * @return ParserService
	 */
	public function setUrl(string $url): self
	{
		$this->url = $url;
		return $this;
	}

	/**
	 * @return array
	 */
	public function saveNews(): void
	{
		$xml = Parser::load($this->url);
		$parsed_data =  $xml->parse([
			'title' => [
				'uses' => 'channel.title'
			],
			'link' => [
				'uses' => 'channel.link'
			],
			'description' => [
				'uses' => 'channel.description'
			],
			'image' => [
				'uses' => 'channel.image.url'
			],
			'news' => [
				'uses' => 'channel.item[title,link,guid,description,pubDate]'
			]
		]);
        
		$data = [
			'title' => $parsed_data['title'],
			'description' =>$parsed_data['description']
		];
		$category = Category::create($data);
	
		$parsed_data_news = $parsed_data['news'];		

		foreach ($parsed_data_news as $parsed_data_news_item)
		{
			$data = [
				'name' => $parsed_data['title'],
				'url' =>$parsed_data_news_item['link']			
			];
			
			$scource = Scource::create($data);
		

		$data = [
			'category_id' => $category->id,
			'scource_id' =>$scource->id,
			'title' => $parsed_data_news_item['title'],
			'author' =>$parsed_data['title'],
			'image' => $parsed_data['image'],
			'description' =>$parsed_data_news_item['description']
		];
		$news = News::create($data); 

		}
	}
	
} 