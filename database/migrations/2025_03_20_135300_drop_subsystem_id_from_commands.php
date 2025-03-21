<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('commands', function (Blueprint $table) {
            $table->dropForeign(['subsystem_id']);
            $table->dropColumn('subsystem_id');
        });
    }

    public function down()
    {
        Schema::table('commands', function (Blueprint $table) {
            $table->unsignedBigInteger('subsystem_id');
            $table->foreign('subsystem_id')->references('id')->on('subsystems');
        });
    }
};

    