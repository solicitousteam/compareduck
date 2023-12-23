<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_metas', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->longtext('billing_address')->nullable;
            $table->longtext('billing_address2')->nullable;
            $table->string('city')->nullable;
            $table->string('state')->nullable;
            $table->string('zipcode')->nullable;
            $table->string('mobile')->nullable;
            $table->string('email')->nullable;
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
        Schema::dropIfExists('order_metas');
    }
}
