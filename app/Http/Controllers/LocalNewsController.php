<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Resources\News as NewsResource;
use function GuzzleHttp\json_decode;

class LocalNewsController extends Controller
{
    public function index(Request $request)
    {
        $ipLocator = new Client(['base_uri' => 'http://iplocation.com']);
        $response = $ipLocator->post('/', ['form_params' => ['ip' => $request->ip()]]);
        $location = json_decode((string)$response->getBody(), true);

        $mark = new Mark(
            $location['country_name'],
            $location['region_name'],
            $location['city']
        );

        $news = News::near($mark)->take(5)->get();

        return NewsResource::collection($news);
    }
}
