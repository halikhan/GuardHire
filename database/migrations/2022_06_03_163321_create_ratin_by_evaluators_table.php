<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatinByEvaluatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratin_by_evaluators', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('book__coache_id')->nullable();
            $table->integer('evaluator_id')->nullable();
            $table->integer('card_id')->nullable();
            $table->string("rating_start")->nullable();
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
        Schema::dropIfExists('ratin_by_evaluators');
    }
}
