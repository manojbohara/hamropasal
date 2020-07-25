<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEsewaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esewa', function (Blueprint $table) {
            $table->id();
            $table->integer('amt')->nullable();
            $table->integer('txAmt')->nullable();
            $table->integer('pdc')->nullable();
            $table->integer('psc')->nullable();
            $table->integer('tAmt')->nullable();
            $table->string('pid')->nullable();
            $table->boolean('pay_status')->nullable();
            $table->timestamp('transactionDate')->nullable();
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
        Schema::dropIfExists('esewa');
    }
}
