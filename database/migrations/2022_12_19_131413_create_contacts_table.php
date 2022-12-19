<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('civilite');
            $table->string('prenom',30);
            $table->string('nom',30);
            $table->string('email',150);
            $table->date('date_naissance')->nullable();
            $table->string('telephone',50)->nullable();
            $table->string('adresse',150)->nullable();
            $table->string('code_postal',10)->nullable();
            $table->string('ville',50)->nullable();
            $table->integer('pays_id')->nullable();
            $table->string('societe',50)->nullable();
            $table->integer('destinataire_id');
            $table->mediumText('message');
            $table->tinyInteger("newsletter")->default(0);
            $table->string('ip_visiteur');
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
        Schema::dropIfExists('contacts');
    }
};
