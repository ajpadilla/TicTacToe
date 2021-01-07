<?php

namespace App\Http\Controllers;


use App\Services\FilterCountriesService;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    private $service;

    public function __construct(FilterCountriesService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request){

        $validated = $request->validate([
            'country_name_length' => 'required',
        ]);

        $country_name_length = $request->country_name_length;

        if ($country_name_length < 3){
            return redirect()->back()->withErrors(['the length of the name is less than 3']);
        }

        $counties = $this->service->transformer($country_name_length);

        return view('countries.index', compact('counties'));
    }

    public function search(Request $request){
        return view('countries.search');
    }
}
