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
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('matric')->unique();
            $table->string('password');
            $table->string('nacoss_transac_id')->unique();
            $table->enum('level', ['Hnd2', 'Hnd1', 'Nd2', 'Nd1']);
            $table->enum('program', ['FT', 'Dpp', 'PT']);
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
        Schema::dropIfExists('voters');
    }
};
