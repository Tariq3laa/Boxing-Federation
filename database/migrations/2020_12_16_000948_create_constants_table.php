<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstantsTable extends Migration
{
    public function up()
    {
        Schema::create('constants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('content');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('constants');
    }
}
