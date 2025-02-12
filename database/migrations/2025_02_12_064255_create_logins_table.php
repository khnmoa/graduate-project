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
        Schema::create('logins', function (Blueprint $table) {
            $table->id();
              $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable(); // لحفظ صورة المستخدم
            $table->string('role')->default('user'); // يمكن أن يكون admin أو user
            $table->string('nationality')->nullable();  
            // محتاجه تتضاف 
            //  $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
        });
    }
    
       
         
        
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logins');
    }
};
