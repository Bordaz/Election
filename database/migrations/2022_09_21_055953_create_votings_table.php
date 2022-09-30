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
        Schema::create('votings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voter_id');
            $table->unsignedBigInteger('aspirant_id');
            $table->timestamps();
            $table->foreign('voter_id')->references('id')->on('voters')->onDelete('cascade');
            $table->foreign('aspirant_id')->references('id')->on('aspirants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votings');
    }
};
