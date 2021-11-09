<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Country::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function seedCountries(Request $request)
    {
        $countries = $request->all();
        foreach ($countries as $key => $country) {
            Country::updateOrcreate([
                'country_code' => $country['country_code'] ?? $country['alpha2'],
                'alpha2' => $country['alpha2'] ?? null,
                'alpha3' => $country['alpha3'] ?? null,
                'country_calling_codes' => json_encode($country['countryCallingCodes']) ?? null,
                'currencies' => json_encode($country['currencies']) ?? null,
                'emoji' => $country['emoji'] ?? null,
                'ioc' => $country['ioc'] ?? null,
                'languages' => json_encode($country['languages']) ?? null,
                'name' => $country['name'] ?? null,
                'status' => $country['status'] ?? null,
                'zone_id' => $country['zoneId'] ?? null,
                'zone_name' => $country['zoneName'] ?? null,
            ]);
        }
        return true;
    }
}
