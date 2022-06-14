<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birthdate');
            $table->string('email');
            $table->string('phoneNumber');
            $table->integer('totalVisits')->nullable();
            $table->integer('totalPointRedemptions')->nullable();
            $table->integer('totalSmsRedemptions')->nullable();
            $table->integer('collectedPoints')->nullable();
            $table->integer('availablePoints')->nullable();
            $table->integer('totalSpending')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
