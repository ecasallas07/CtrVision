<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //  Los nombres de las bases de datos, tablas deberían ir en plural y los nombres de los campos en singular

    public function up(): void
    {
        Schema::create('control_tasks', function (Blueprint $table) {
            $table->id();
            $table->date('day')->nullable()->comment('day of the week');
            $table->string('activity')->nullable()->comment('activities of day');
            $table->time('time_activity')->comment('times of activity for the day');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('control_task');
    }
};
