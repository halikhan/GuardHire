<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardCreditPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guard_credit_points', function (Blueprint $table) {
            $table->id();
            $table->integer('guard_id')->nullable();
            $table->integer('client_id')->nullable();
            $table->integer('client_job_id')->nullable();
            $table->integer('credit_points')->nullable();
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
        Schema::dropIfExists('guard_credit_points');
    }
}
