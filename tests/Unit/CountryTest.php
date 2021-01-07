<?php

namespace Tests\Unit;

use App\Country;
use App\Services\FilterCountriesService;
use Tests\TestCase;

class CountryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function verifying_start_path()
    {
        $response = $this->call('GET', '/', [], [], [], []);

        $response->assertSuccessful();
    }

    /** @test */
    public function search_existing_countries()
    {
        /** @var FilterCountriesService $filterCountriesService */
        $filterCountriesService = app(FilterCountriesService::class);
        $country_name_length = 10;
        $countries = $filterCountriesService->transformer($country_name_length);
        $this->assertNotNull($countries);
    }


    /** @test */
    public function search_no_existing_countries()
    {
        /** @var FilterCountriesService $filterCountriesService */
        $filterCountriesService = app(FilterCountriesService::class);

        $country_name_length = 30;

        /** @var Country $countries */
        $countries = $filterCountriesService->transformer($country_name_length);
        $this->assertEquals(0, $countries->count());
    }
}
