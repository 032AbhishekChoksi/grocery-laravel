<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScopeController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-auth-token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhZG1pbiI6eyJpZCI6IjYyYjQ3YTAyY2M1OWU1MWUyMDQ3MTE2NyJ9LCJpYXQiOjE2NTc1NTE4NjksImV4cCI6MTY1NzkxMTg2OX0.r95TKHilTGnFjpjw11aQD0g6_w7H-g7kHN6bubtxawM'
        ])->get('http://localhost:5000/api/scope');
        if ($response['status']) // if status true
        {
            // $scopes = $response['scope']; // this variable name ($scope) access in scope.blade.php
            // $data = compact('scopes');
            // return view('scope')->with($data);
            return view('scope')->with('data', json_decode($response, true));
        } else // error show
        {
            return prx("Server error");
        }
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
            ]
        );

        $model = [
            'name' => $request['name']
        ];

        // prx($model);
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'x-auth-token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhZG1pbiI6eyJpZCI6IjYyYjQ3YTAyY2M1OWU1MWUyMDQ3MTE2NyJ9LCJpYXQiOjE2NTc1NTE4NjksImV4cCI6MTY1NzkxMTg2OX0.r95TKHilTGnFjpjw11aQD0g6_w7H-g7kHN6bubtxawM'
        ])->post('http://localhost:5000/api/scope/add', $model);
        return prx($response);
    }
}