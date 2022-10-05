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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->date('age');
            $table->string('mobile')->nullable();
            $table->string('whatsapp');
            $table->string('address');
            $table->string('married_status')->default('none');
            $table->string('occupation');
            $table->string('religion')->nullable();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1 => Active, 0 => Blocked');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
