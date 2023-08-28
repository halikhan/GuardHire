<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_vendors', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('wedding_id')->nullable();
            $table->integer("vendor_id")->nullable();
            $table->string("service")->nullable();
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
        Schema::dropIfExists('book_vendors');
    }
}
