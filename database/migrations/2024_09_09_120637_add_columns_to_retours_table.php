<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToRetoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retours', function (Blueprint $table) {
            $table->string('nom');
            $table->string('etat');
            $table->string('type');
            $table->string('address');        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retours', function (Blueprint $table) {
            $table->dropColumn('nom');
            $table->dropColumn('etat');
            $table->dropColumn('type');
            $table->dropColumn('address');

        });
    }
}
