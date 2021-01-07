<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecsTable extends Migration
{
    public function up()
    {
        Schema::create('tecs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('is_verified')->default(0);
            $table->string('avatar');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tecs');
    }
}
