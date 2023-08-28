<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guard_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_type');
            $table->integer('job_duration');
            $table->string('location');
            $table->decimal('per_hour_rate', 10, 2);
            $table->string('services');
            $table->string('tags');
            $table->string('language');
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
        Schema::dropIfExists('guard_jobs');
    }
}
