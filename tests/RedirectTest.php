<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use AventureCloud\HttpsRedirect\HttpsRedirectServiceProvider;
use AventureCloud\HttpsRedirect\Middleware\HttpsCheck;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Support\Facades\Route;

class RedirectTest extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [HttpsRedirectServiceProvider::class];
    }

    protected function setUp()
    {
        parent::setUp();

        config()->set('https_redirect.environments', '*');

        Route::middleware(HttpsCheck::class)->get('_test', function () {
            return response()->json([
                'secure' => request()->secure()
            ]);
        });

        $test = $this;

        TestResponse::macro('followRedirects', function ($testCase = null) use ($test) {
            $response = $this;
            $testCase = $testCase ?: $test;

            while ($response->isRedirect()) {
                $response = $testCase->get($response->headers->get('Location'));
            }

            return $response;
        });
    }

    /**
     * @test
     */
    public function test_redirect_to_https()
    {
        $this->get('_test')
            ->assertRedirect()
            ->followRedirects()
            ->assertJson(['secure' => true]);
    }
}