<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ProgrationController extends Controller
{
    
    public function index()
    {
        return response()->json([
            'message' => 'Progration API is working!',
            'status' => true
        ]);
    }
}






 



   