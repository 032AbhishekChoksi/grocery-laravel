<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function getAllCategories()
    {
        // echo "hello";
        $response = Http::acceptJson()->get('http://localhost:4000/api/category?page=1&pageSize=10');
        $response = $response->json();
        return prx($response['data']);
    }

    public function addCategory()
    {
        $response = Http::post('http://localhost:4000/api/category', [
            'categoryName' => 'Ice Cream',
            'categoryImage' => '\/uploads\/categories\/1656942678693-ice_cream.png',
        ]);
        return prx($response['data']);
    }
}