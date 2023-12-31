<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStripePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripe_packages', function (Blueprint $table) {
            $table->id();
            $table->integer("plan_id");
            $table->string("name");
            $table->string("billing_payment")->nullable();
            $table->tinyInteger("interval_count")->default();
            $table->string("price");
            $table->string("currency");
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
        Schema::dropIfExists('stripe_packages');
    }
}
