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
            $table->id();
            $table->string('name');
            $table->string('sex');
            $table->integer('age');
            $table->string('address');
            $table->string('nationality');
            $table->string('hospital_name');
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
        Schema::dropIfExists('corona_locals');
    }
}
