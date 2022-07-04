<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableAddRelationEmployeeId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conges', function (Blueprint $table) {
            $table->unsignedBigInteger('employe_id');
            $table->foreign('employe_id')
            ->references('id')
            ->on('employes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conges', function (Blueprint $table) {
            //
        });
    }
}
