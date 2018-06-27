<?php

namespace App\Http\Controllers;

use App\Locator;
use Illuminate\Http\Request;
use App\Http\Resources\News as NewsResource;

class LocalNewsController extends Controller
{
    public function index(Request $request, Locator $locator)
    {
        $mark = $locator->fromIp($request->ip());

        $news = News::near($mark)->take(5)->get();

        return NewsResource::collection($news);
    }
}
