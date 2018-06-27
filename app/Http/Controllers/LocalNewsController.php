<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\News as NewsResource;

class LocalNewsController extends Controller
{
    public function index(Request $request)
    {
        $locator = new IpLocation;
        $location = $locator->locate($request->ip());

        $mark = new Mark(
            $location['country_name'],
            $location['region_name'],
            $location['city']
        );

        $news = News::near($mark)->take(5)->get();

        return NewsResource::collection($news);
    }
}
