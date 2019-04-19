<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use LogEngine\HttpsRedirect\HttpsRedirectServiceProvider;
use LogEngine\HttpsRedirect\Middleware\HttpsCheck;
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

        $this->generateRoutes();

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

    protected function generateRoutes()
    {
        Route::middleware(HttpsCheck::class)->get('_test', function () {
            return response()->json([
                'secure' => request()->secure()
            ]);
        });
    }

    /**
     * @test
     */
    public function test_do_redirect()
    {
        $this->get('_test')
            ->assertRedirect()
            ->followRedirects()
            ->assertJson(['secure' => true]);
    }

    /**
     * @test
     */
    public function test_do_not_redirect()
    {
        config()->set('https_redirect.environments', 'production');
        $this->get('_test')
            ->assertJson(['secure' => false]);

        config()->set('https_redirect.environments', ['production']);
        $this->get('_test')
            ->assertJson(['secure' => false]);
    }
}