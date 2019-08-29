<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingDayDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_day_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('first_date');
            $table->tinyInteger('day_interval')->unsigned();
            $table->bigInteger('working_day_master_id')->unsigned();
            $table->foreign('working_day_master_id')->references('id')->on('working_day_masters');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_day_details');
    }
}
