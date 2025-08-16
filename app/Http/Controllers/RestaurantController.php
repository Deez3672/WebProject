<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        // Example with hardcoded data - replace with your actual data source
        $restaurants = [
            [
                'name' => 'Restaurant 1',
                'cuisine' => 'Italian',
                'map_url' => '#',
                'image' => 'restaurant1.jpg',
                'delivery_time' => '30-45 min',
                'delivery_fee' => '$2.99',
                'rating' => '4.5'
            ],
            // Add more restaurants as needed
        ];

        return view('restaurants', ['restaurants' => $restaurants]);
    }
}
