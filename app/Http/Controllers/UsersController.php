<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit()
    {
        return view('users.edit');
    }

    public function update($id, Request $request)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
