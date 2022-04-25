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
        Schema::create('echeanciers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("credit_id")->constrained();
            $table->date("date_ech");
            $table->double("mnt_cap");
            $table->double("mnt_int");
            $table->double("mnt_gar");
            $table->double("mnt_reech");
            $table->boolean("remb")->default(0);
            $table->double("solde_cap");
            $table->double("solde_int");
            $table->double("solde_gar");
            $table->double("solde_pen");
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
        Schema::dropIfExists('echeanciers');
    }
};
