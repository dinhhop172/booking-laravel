<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('staff_id')->constrained('accounts');
            $table->integer('money');
            $table->tinyInteger('status');
            $table->date('request_day');
            $table->date('payment_day')->nullable();
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
        Schema::dropIfExists('request_payments');
    }
}
