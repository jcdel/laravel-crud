<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoronaGlobalIdToCoronaLocals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('corona_locals', function (Blueprint $table) {
            $table->unsignedSmallInteger('corona_global_id')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('corona_locals', function (Blueprint $table) {
            //
        });
    }
}
