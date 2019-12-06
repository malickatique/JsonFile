<?php

use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     // RUN     php artisan db:seed --class=AddressSeeder
    public function run()
    {
        // Insert Countries
        $countryJson = File::get("database/data/countries.json");

        $countries = json_decode($countryJson, true);

        foreach ($countries as $country) 
        {
            DB::table('countries')->insert(
                [
                    'id' => $country['id'], 'country_name' => $country['name']
                ]
                
            );
        }

        // Insert States
        $stateJson = File::get("database/data/states.json");

        $states = json_decode($stateJson, true);

        foreach ($states as $state) 
        {
            DB::table('states')->insert(
                [
                    'id' => $state['id'], 'state_name' => $state['name'], 'country_id' => $state['country_id']
                ]
                
            );
        }


        // Insert Cities
        ini_set('memory_limit', '-1');  // Unlimited mem space
        $cityJson = File::get("database/data/cities.json");

        $cities = json_decode($cityJson, true);

        foreach ($cities as $city) 
        {
            DB::table('cities')->insert(
                [
                    'id' => $city['id'], 'city_name' => $city['name'], 'state_id' => $city['state_id']
                ]
                
            );
        }

    }
}
