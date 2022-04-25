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
            $table->string("adresse");
            $table->string("code_postal");
            $table->string("ville");
            $table->string("pays_id");
            $table->string("pp_pays_naiss");
            $table->string("num_tel");
            $table->string("num_port");
            $table->string("email")->unique();
            $table->string("id_cpte_base");
            $table->string("id_loc1");
            $table->string("id_loc2");
            $table->string("loc3");
            $table->date("date_adh");
            $table->integer("etat");
            $table->string("sect_activites_id");
            $table->string("utilis_modif");
            $table->string("user_id");
            $table->integer("nbre_credits");
            $table->string("pp_nom");
            $table->string("pp_prenom");
            $table->date("pp_date_naissance");
            $table->string("pp_lieu_naissance");
            $table->Char("pp_sexe");
            $table->string("pp_nationalite");
            $table->string("pp_type_piece_identite");
            $table->date("pp_date_piece_identite");
            $table->string("pp_lieu_delivrance_identite");
            $table->string("pp_nm_piece_identite");
            $table->date("pp_date_exp_identite");
            $table->string("pp_etat_civil");
            $table->integer("pp_nbre_enfant");
            $table->boolean("pp_casier_judiciaire")->default(1);
            $table->double("pp_revenu");
            $table->integer("pp_id_gi");
            $table->string("pp_pm_patrimoine");
            $table->string("pp_pm_activite_prof6");
            $table->string("pp_employeur");
            $table->string("pp_fonction");
            $table->string("pm_raison_sociale");
            $table->string("pm_abreviation");
            $table->date("pm_date_expiration");
            $table->date("pm_date_notaire");
            $table->date("pm_date_depot_greffe");
            $table->string("pm_lieu_depot_greffe");
            $table->string("pm_numero_reg_nat");
            $table->string("pm_nature_juridique");
            $table->string("pm_tel2");
            $table->string("pm_tel3")->nullable();
            $table->string("pm_email2")->nullable();
            $table->string("pm_date_constitution");
            $table->string("pm_agrement_nature");
            $table->string("pm_agrement_autorite");
            $table->string("pm_agrement_numero");
            $table->string("pm_agrement_date");
            $table->string("gi_nom");
            $table->date("gi_date_agre");
            $table->integer("gi_nbre_membr");
            $table->date("gi_date_dissol");
            $table->string("pm_categorie");
            $table->string("gs_responsable");
            $table->string("pp_partenaire");
            $table->string("classe");
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
