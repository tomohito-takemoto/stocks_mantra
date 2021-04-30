<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportedLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reported_log', function (Blueprint $table) {
            $table->bigIncrements('stock_id');
            $table->string('symbol');
            $table->string('year');
            $table->string('period');
            $table->string('estimate');
            $table->string('reported');
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
        Schema::dropIfExists('reported_log');
    }
}
