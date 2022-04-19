<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Contracts\Parser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
		$data = $parser->setUrl('https://news.yandex.ru/music.rss')
			      ->getNews();
    
    //dd($data);
    $parser->saveData($data);
    }

}
