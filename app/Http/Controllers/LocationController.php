<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LocationController extends Controller
{
    public function getLocation(Request $request)
    {
        $ip = $request->ip();
        $key = env('LOCATION_API_KEY');

        try {
            $data = json_decode(file_get_contents("https://pro.ip-api.com//json/{$ip}?key=$key"));
        } catch (\Throwable $th) {
            return response(['status' => 'Location tracking failed'], 500);
        }

        if (!empty($data->country) & !empty($data->city) & !empty($data->countryCode)) {
            // return $this->recordAndForward($data);
            return $data;
        } else {
            $key = "MVz6oqMIVZmrSekBA52O";

            try {
                $data = json_decode(file_get_contents("http://extreme-ip-lookup.com/json/$ip?key=$key"));
            } catch (\Throwable $th) {
                return response(['status' => 'Location tracking failed'], 500);
            }

            if (!empty($data->country) & !empty($data->city) & !empty($data->countryCode)) {
                // return $this->recordAndForward($data);
                return $data;
            } else {
                return response(['status' => 'Location tracking failed'], 500);
            }
        }
    }
}
