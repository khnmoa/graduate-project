<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('user_commands', function (Blueprint $table) {
        $table->string('session_name')->nullable();
        $table->dateTime('start_date')->nullable();
        $table->dateTime('end_date')->nullable();
        
    });
}

public function down()
{
    Schema::table('user_commands', function (Blueprint $table) {
        $table->dropColumn('session_name');
        $table->dropColumn('start_date');
        $table->dropColumn('end_date');
    });
}

};
