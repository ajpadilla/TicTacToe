<?php

use App\Repositories\CountryRepository;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var CountryRepository $countryRepository */
        $countryRepository = app(CountryRepository::class);

        /** @var array $countries */
        $countries = [
            ['name' => 'India', 'population' => 1409902],
            ['name' => 'China', 'population' => 1403426],
            ['name' => 'Estados Unidos', 'population' => 331800],
            ['name' => 'Indonesia', 'population' => 271629],
            ['name' => 'Pakistán', 'population' =>  224654],
            ['name' => 'Nigeria', 'population' => 219743],
            ['name' => 'Brasil', 'population' => 211420],
            ['name' => 'Bangladés', 'population' => 181781],
            ['name' => 'Rusia', 'population' => 146712],
            ['name' => 'México', 'population' => 127792],
            ['name' => 'Japón', 'population' => 126045],
            ['name' => 'Filipinas', 'population' =>  108772],
            ['name' => 'Egipto', 'population' => 101000],
            ['name' => 'Etiopía', 'population' => 100882],
            ['name' => 'Vietnam', 'population' =>  97591],
            ['name' => 'República del Congo', 'population' =>  89561],
            ['name' => 'Irán', 'population' => 83914],
            ['name' => 'Turquía', 'population' => 83752],
            ['name' => 'Alemania', 'population' => 83421],
            ['name' => 'Tailandia', 'population' =>  68232],
        ];

        foreach ($countries as $country){
            $countryRepository->firstOrCreate($country);
        }
    }
}
