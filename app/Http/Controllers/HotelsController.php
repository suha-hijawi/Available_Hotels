<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HotelsController extends Controller
{
    public function getHotels(Request $request)
    {

        $path = storage_path() . '\MockData\AvailableHotels.json'; // ie: /var/www/laravel/app/storage/json/filename.json

        $content = json_decode(file_get_contents($path), true);

        $content = array_filter($content);

        if ($request->has('fromDate') && $request->fromDate) {
            $content = collect($content)
                ->where("fromDate", "LIKE", "{$request->fromDate}")
                ->all();
        }
        if ($request->has('toDate') && $request->toDate) {
            $content = collect($content)
                ->where("toDate", "LIKE", "{$request->toDate}")
                ->all();
        }
        if ($request->has('city') && $request->city) {
            $content = collect($content)
                ->where("provider_city", "LIKE", "{$request->city}")
                ->all();
        }

        if ($request->has('numberOfAdults') && $request->numberOfAdults) {
            $content = collect($content)
                ->where("numberOfAdults", $request->numberOfAdults)
                ->all();
        }

        return view('hotels', compact('content', 'request'));

    }

    public function getAvailableHotels(Request $request)
    {

        $path = storage_path() . '\MockData\AvailableHotels.json'; // ie: /var/www/laravel/app/storage/json/filename.json
        $json = json_decode(file_get_contents($path), true);

        return Response()->json([
            'status' => Response::HTTP_OK,
            'data' => $json
        ]);

    }

    public function getHotelDetails($name, Request $request)
    {

        $path = storage_path() . '\MockData\AvailableHotels.json'; // ie: /var/www/laravel/app/storage/json/filename.json

        $content = json_decode(file_get_contents($path), true);

        $content = array_filter($content);

        $name = str_replace('_', ' ', $name);
        $content = collect($content)
            ->where("title", "LIKE", "{$name}")
            ->all();

        return view('hotels', compact('content', 'request'));

    }
}
