<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyTalentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_talent', function (Blueprint $table) {
            $table->integer('agency_id')->unsigned();
            $table->foreign('agency_id')->references('id')->on('agencies');
            $table->integer('talent_id')->unsigned();
            $table->foreign('talent_id')->references('id')->on('talents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agency_talent');
    }
}
