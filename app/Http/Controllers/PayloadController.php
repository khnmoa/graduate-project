<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayloadController extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return response()->json([
            'message' => 'payload API is working!',
            'status' => true
        ]);
    }
}
