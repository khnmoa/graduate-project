<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
          
       
        $table->string('role')->nullable(); // إضافة عمود الدور
        $table->string('image')->nullable(); // إضافة عمود الصورة
        $table->string('nationality')->nullable(); // إضافة عمود الجنسية
    });
}

    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
