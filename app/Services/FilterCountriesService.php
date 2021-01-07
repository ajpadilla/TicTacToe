<?php


namespace App\Services;


use App\Country;
use App\Repositories\CountryRepository;

class FilterCountriesService
{
    /** @var CountryRepository */
    private $countryRepository;

    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function transformer($country_name_length){

        /** @var Country $counties */
        $counties = $this->countryRepository->search($country_name_length)->get();

        $total_population = $counties->sum('population');

        return $counties->transform(function (Country $country, $key) use ($total_population) {
            $percent_population = number_format((($country->population * 100) / $total_population), 2);
            $country->total_population = $total_population;
            $country->percent_population = $percent_population;
            return $country;
        });
    }

}
