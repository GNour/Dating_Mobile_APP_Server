<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function getUserConnections()
    {
        return response()->json(auth()->user()->connections());
    }
}
