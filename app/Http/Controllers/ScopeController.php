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

    public function add()
    {
        $url = route('scope.store');
        $title = "Add Scope";
        $data = compact('url', 'title');
        return view('managescope')->with($data);
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
            'x-auth-token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhZG1pbiI6eyJpZCI6IjYyYjQ3YTAyY2M1OWU1MWUyMDQ3MTE2NyJ9LCJpYXQiOjE2NTc2MTU5MjMsImV4cCI6MTY1Nzk3NTkyM30.ILDX6BlXhZ1QEU2ysQdiGn4s6ZcQJk0yljElD2LAXW0'
        ])->post('http://localhost:5000/api/scope/add', $model);
        return prx($response);
    }

    public function edit($id)
    {
        // prx($id);
        // $url = route('scope.store');
        $title = "Edit Scope";
        $response = Http::withHeaders([
            'x-auth-token' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhZG1pbiI6eyJpZCI6IjYyYjQ3YTAyY2M1OWU1MWUyMDQ3MTE2NyJ9LCJpYXQiOjE2NTc2MTU5MjMsImV4cCI6MTY1Nzk3NTkyM30.ILDX6BlXhZ1QEU2ysQdiGn4s6ZcQJk0yljElD2LAXW0'
        ])->get('http://localhost:5000/api/scope/edit/' . $id);

        return view('managescope')->with('editdata', json_decode($response, true));
    }

    public function update($id)
    {
        return prx($id);
    }
}