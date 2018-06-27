<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\News as NewsResource;

class LocalNewsController extends Controller
{
    public function index(Request $request)
    {
        $locator = new IPDatabase;
        $location = $locator->findByIpAddress($request->ip());

        $mark = new Mark(
            $location['country'],
            $location['state_or_province'],
            $location['city_name']
        );

        $news = News::near($mark)->take(5)->get();

        return NewsResource::collection($news);
    }
}
