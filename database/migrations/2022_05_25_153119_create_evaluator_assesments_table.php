<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluatorAssesmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluator_assesments', function (Blueprint $table) {
            $table->id();
            $table->string("title")->nullable();
            $table->longText("content")->nullable();
            $table->string("audio")->nullable();
            $table->longText("audiotime")->nullable();
            $table->string("image")->nullable();
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
        Schema::dropIfExists('evaluator_assesments');
    }
}
