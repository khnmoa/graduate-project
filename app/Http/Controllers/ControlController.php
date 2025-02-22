<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControlController extends Controller
{
    

    public function index()
    {
        return response()->json([
            'message' => 'control API is working!',
            'status' => true
        ]);
    }
}
