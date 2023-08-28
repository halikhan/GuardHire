<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientRatingByGuardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_rating_by_guards', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->nullable();
            $table->integer('guard_id')->nullable();
            $table->string("rate")->nullable();
            $table->string("message")->nullable();
            $table->integer("status")->default(1);
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
        Schema::dropIfExists('client_rating_by_guards');
    }
}
