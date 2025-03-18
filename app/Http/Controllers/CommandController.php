<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommandController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *     // Get all commands
    //  */
    // public function index()
    // {
    //     return response()->json(Command::all());

    // }



     /**
     *  Subsystem عرض كل الأوامر الخاصة بـ 
     */
    public function getCommandsBySubsystem($subsystem)
    {
        // جلب الأوامر الخاصة فقط بالـ subsystem المحدد
        $commands = Command::where('subsystem', $subsystem)->get();

        // إرجاع البيانات كـ JSON
        return response()->json($commands);
    }




    /**
     * Store a newly created resource in storage.
     *      // Store a new command
     */
    public function store(Request $request)
    {
         // التحقق من صحة البيانات المدخلة
         $request->validate([
            'code' => 'required|integer|unique:commands,code',
            'name' => 'required|string',
            'description' => 'required|string',
            'subsystem' => 'required|string'
        ]);

        // إنشاء الأمر في قاعدة البيانات
        $command = Command::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'subsystem' => $request->subsystem
        ]);

        return response()->json([
            'message' => 'Command added successfully',
            'command' => $command
        ], 201);

    }

    /**
     * Display the specified resource.
     *        // Show a specific command
     */
    // public function show(string $id)
    // {
    //     return response()->json(Command::findOrFail($id));

    // }

    /**
     * Update the specified resource in storage.
     *     // Update a command
     */
    // public function update(Request $request, string $id)
    // {
    //     $command = Command::findOrFail($id);
    //     $validated = $request->validate([
    //         'code' => 'string|unique:commands,code,' . $id,
    //         'name' => 'string',
    //         'description' => 'string',
    //         'time_type' => 'string',
    //         'time' => 'nullable|date',
    //     ]);

    //     $command->update($validated);
    //     return response()->json($command);

    // }

    /**
     * Remove the specified resource from storage.
     * // Delete a command
     */
    public function destroy(string $id)
    {
           // البحث عن الأمر
           $command = Command::find($id);

           if (!$command) {
               return response()->json(['message' => 'Command not found'], 404);
           }
   
           // حذف الأمر
           $command->delete();
   
           return response()->json(['message' => 'Command deleted successfully']);
   }
   
}
    




