<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('canvasser_id')->unsigned();
            $table->string('HU1')->nullable();
            $table->string('HU2')->nullable();
            $table->string('MSISDN')->nullable();
            $table->timestamps();
        });
        Schema::table('sales', function (Blueprint $table) {
         $table->foreign('canvasser_id')->references('id')->on('canvassers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
