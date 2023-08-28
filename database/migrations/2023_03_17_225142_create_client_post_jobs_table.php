<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientPostJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_post_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_type');
            $table->integer('job_duration');
            $table->string('location');
            $table->decimal('per_hour_rate', 8, 2);
            $table->date('starting_date');
            $table->date('ending_date');
            $table->text('description');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('client_post_jobs');
    }
}
