<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturedClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('featured_clients', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('job_type');
            $table->string('companyname');
            $table->integer('job_duration');
            $table->string('location_id');
            $table->decimal('per_hour_rate', 10, 2);
            $table->string('services');
            $table->string('tags');
            $table->string('language');
            $table->longText('description');
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
        Schema::dropIfExists('featured_clients');
    }
}
