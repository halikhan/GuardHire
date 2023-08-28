<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id")->nullable();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string("address")->nullable();
            $table->string("city")->nullable();
            $table->string("country")->nullable();
            $table->integer("zip_code")->nullable();
            $table->string("package_name")->nullable();
            $table->integer("package_amount")->nullable();
            $table->string("response")->nullable();
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
        Schema::dropIfExists('checkouts');
    }
}
