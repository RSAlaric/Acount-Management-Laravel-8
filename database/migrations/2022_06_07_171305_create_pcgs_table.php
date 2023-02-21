<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePcgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcgs', function (Blueprint $table) {
            $table->id();
            $table->string('rang_classe');
            $table->string('nom_compte');
            $table->integer('COMPTE');
            $table->string('LIBELLEE');
            $table->string('code');
            $table->string('BILAN');
            $table->string('rang_bilan');
            $table->string('code_compte_resultat');
            $table->string('rang_compte_resultat');
            $table->string('mois_p');
            $table->string('code_postale');
            $table->string('nom_ville');
            $table->string('num_id_statistique');
            $table->string('num_cp');
            $table->string('date_cp');
            $table->string('num_quittance');
            $table->string('date_quittance');
            $table->string('activite_code');
            $table->string('activite_faritany');
            $table->string('acctivite_fivondronana');
            $table->string('code_repetition');
            $table->string('nif');
            $table->string('num_rcs');
            $table->string('date_rcs');
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
        Schema::dropIfExists('pcgs');
    }
}
