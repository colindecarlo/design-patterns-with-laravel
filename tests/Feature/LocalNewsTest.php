<?php

namespace Tests\Feature;

use App\Locator;
use App\Mark;
use Illuminate\Http\Response;
use Tests\Fakes\FakeLocator;
use Tests\TestCase;

class LocalNewsTest extends TestCase
{
    public function test_it_returns_only_local_news()
    {
        $this->app->instance(
            Locator::class,
            FakeLocator::returning(new Mark('Canada', 'Ontario', 'Guelph'))
        );

        $response = $this->get('/api/local-news');

        $response->assertStatus(Response::HTTP_OK);
    }
}
