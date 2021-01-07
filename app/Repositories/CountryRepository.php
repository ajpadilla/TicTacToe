<?php


namespace App\Repositories;


use App\Country;
use Illuminate\Support\Facades\DB;

class CountryRepository extends AbstractRepository
{
    function __construct(Country $model)
    {
        $this->model = $model;
    }

    public function search($country_name_length = 3){
       $query = $this->model
            ->select('countries.*')
            ->distinct()
            ->addSelect(DB::raw('LENGTH(replace(countries.name, \' \', \'\')) AS name_size '))
            ->whereRaw('LENGTH(replace(countries.name, \' \', \'\')) >= ?', $country_name_length);
       return $query;
    }
}
