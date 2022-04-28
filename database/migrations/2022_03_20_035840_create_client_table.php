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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("statut_juridique");
            $table->string("adresse")->nullable();
            $table->string("code_postal")->nullable();
            $table->string("ville")->nullable();
            $table->string("pays_id")->nullable();
            $table->string("pp_pays_naiss")->nullable();
            $table->string("num_tel")->nullable();
            $table->string("num_port")->nullable();
            $table->string("email")->unique()->nullable();
            $table->string("id_cpte_base")->nullable();
            $table->string("id_loc1")->nullable();
            $table->string("id_loc2")->nullable();
            $table->string("loc3")->nullable();
            $table->date("date_adh")->nullable();
            $table->integer("etat")->nullable();
            $table->string("sect_activites_id")->nullable();
            $table->string("utilis_modif")->nullable();
            $table->integer("user_id")->nullable();
            $table->integer("nbre_credits")->nullable();
            $table->string("pp_nom")->nullable();
            $table->string("pp_prenom")->nullable();
            $table->date("pp_date_naissance")->nullable();
            $table->string("pp_lieu_naissance")->nullable();
            $table->Char("pp_sexe")->nullable();
            $table->string("pp_nationalite")->nullable();
            $table->string("pp_type_piece_identite")->nullable();
            $table->date("pp_date_piece_identite")->nullable();
            $table->string("pp_lieu_delivrance_identite")->nullable();
            $table->string("pp_nm_piece_identite")->nullable();
            $table->date("pp_date_exp_identite")->nullable();
            $table->string("pp_etat_civil")->nullable();
            $table->integer("pp_nbre_enfant")->nullable();
            $table->boolean("pp_casier_judiciaire")->default(1)->nullable();
            $table->double("pp_revenu")->nullable();
            $table->integer("pp_id_gi")->nullable();
            $table->string("pp_pm_patrimoine")->nullable();
            $table->string("pp_pm_activite_prof")->nullable();
            $table->string("pp_employeur")->nullable();
            $table->string("pp_fonction")->nullable();
            $table->string("pm_raison_sociale")->nullable();
            $table->string("pm_abreviation")->nullable();
            $table->date("pm_date_expiration")->nullable();
            $table->date("pm_date_notaire")->nullable();
            $table->date("pm_date_depot_greffe")->nullable();
            $table->string("pm_lieu_depot_greffe")->nullable();
            $table->string("pm_numero_reg_nat")->nullable();
            $table->string("pm_nature_juridique")->nullable();
            $table->string("pm_tel2")->nullable();
            $table->string("pm_tel3")->nullable();
            $table->string("pm_email2")->nullable();
            $table->string("pm_date_constitution")->nullable();
            $table->string("pm_agrement_nature")->nullable();
            $table->string("pm_agrement_autorite")->nullable();
            $table->string("pm_agrement_numero")->nullable();
            $table->string("pm_agrement_date")->nullable();
            $table->string("gi_nom")->nullable();
            $table->date("gi_date_agre")->nullable();
            $table->integer("gi_nbre_membr")->nullable();
            $table->date("gi_date_dissol")->nullable();
            $table->string("pm_categorie")->nullable();
            $table->string("gs_responsable")->nullable();
            $table->string("pp_partenaire")->nullable();
            $table->string("classe")->nullable();
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
        Schema::dropIfExists('client');
    }
};
