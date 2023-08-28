<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engagements', function (Blueprint $table) {
            $table->id();
            $table->string("user_id")->nullable();
            $table->string("section_name");
            $table->string("title")->nullable();
            $table->string("titl2")->nullable();
            $table->string("bride")->nullable();
            $table->string("groom")->nullable();
            $table->longText("content")->nullable();
            $table->longText("location")->nullable();
            $table->longText("date")->nullable();
            $table->string("image")->nullable();
            $table->string("image2")->nullable();
            $table->string("status")->default(1);
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
        Schema::dropIfExists('engagements');
    }
}
