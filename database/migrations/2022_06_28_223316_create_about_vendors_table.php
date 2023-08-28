<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_vendors', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('aboutvendor')->nullable();
            $table->string('reviews')->nullable();
            $table->string('stoplight')->nullable();
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
        Schema::dropIfExists('about_vendors');
    }
}
