<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoronaLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corona_locals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('corona_global_id')->unsigned();
            $table->integer('age');
            $table->string('gender');
            $table->string('nationality');
            $table->string('hospital_name');
            $table->string('status');
            $table->timestamps();

            $table->foreign('corona_global_id')
            ->references('id')
            ->on('corona_globals')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corona_locals');
    }
}
