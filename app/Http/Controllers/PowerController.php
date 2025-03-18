<?php

namespace App\Http\Controllers;

use App\Models\Power;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Power::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'users_name' => 'required|string',
            'Battery_voltage' => 'required|numeric',
            'Battery_level' => 'required|numeric',
            'Time_at' => 'required|date',
        ]);

        $power = Power::create($validated);

        // Log the creation
        Log::info('New Power record created', ['power' => $power]);

        return response()->json([
            'status' => true,
            'message' => 'Power record created successfully.',
            'power' => $power
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $power = Power::find($id);

        if (!$power) {
            return response()->json([
                'status' => false,
                'message' => 'Power record not found.'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'power' => $power
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $power = Power::find($id);

        if (!$power) {
            return response()->json([
                'status' => false,
                'message' => 'Power record not found.'
            ], 404);
        }

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'users_name' => 'required|string',
            'Battery_voltage' => 'required|numeric',
            'Battery_level' => 'required|numeric',
            'Time_at' => 'required|date',
        ]);

        $power->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Power record updated successfully.',
            'power' => $power
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $power = Power::find($id);

        if (!$power) {
            return response()->json([
                'status' => false,
                'message' => 'Power record not found.'
            ], 404);
        }

        $power->delete();

        return response()->json([
            'status' => true,
            'message' => 'Power record deleted successfully.'
        ], 200);
    }
}
