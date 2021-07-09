<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();
            /* '','','','','','','',
        '','','','','','',''*/
            $table->string('nom');
            $table->string('prenom');
            $table->string('telephone');
            $table->string('sexe');
            $table->string('datenaiss');
            $table->date('dateentre');
            $table->date('findecontrat');
            $table->string('sm');
            $table->string('nbenfant');
            $table->string('statut');
            $table->integer('etude');
            $table->double('salaire');
            $table->text('lien');
            $table->unsignedBigInteger('projet_id');
            $table->foreign('projet_id')
            ->references('id')
            ->on('projets');
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
        Schema::dropIfExists('employes');
    }
}
