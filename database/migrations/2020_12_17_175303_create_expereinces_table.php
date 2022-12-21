<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expereinces', function (Blueprint $table) {
            $table->id();

            $table->string('Specialises');
            $table->longText('Experience');
            $table->unsignedFloat('min')->nullable();
            $table->unsignedFloat('max')->nullable();
            $table->unsignedFloat('rate')->nullable();
            $table->dateTime('times')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expereinces');
    }
};
