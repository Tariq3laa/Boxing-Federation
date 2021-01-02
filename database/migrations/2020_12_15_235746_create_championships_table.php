<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChampionshipsTable extends Migration
{
    public function up()
    {
        Schema::create('championships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('first_place')->constrained('players')->onDelete('cascade');
            $table->foreignId('second_place')->constrained('players')->onDelete('cascade');
            $table->foreignId('third_place')->constrained('players')->onDelete('cascade');
            $table->string('date');
            $table->string('title');
            $table->string('photo');
            // $table->string('status');
            $table->string('age');
            $table->string('location');
            $table->string('other_details')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('championships');
    }
}
