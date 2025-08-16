<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public function show($category)
    {
        // You can pass the category name to your view if needed
        return view('F1', ['category' => $category]);
    }
}

?>