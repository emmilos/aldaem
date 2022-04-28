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
        Schema::create('credits', function (Blueprint $table) {
            $table->id();
            $table->integer("client_id");
            $table->integer("typecredits_id");
            $table->integer("mode_calc_int")->nullable();
            $table->integer("mode_perc_int")->nullable();
            $table->date("date_dem")->nullable();
            $table->double("mnt_dem")->nullable();
            $table->integer("objetscredits_id")->nullable();
            $table->string("detail_obj_dem")->nullable();
            $table->string("etat")->nullable();
            $table->date("date_etat")->nullable();
            $table->string("motif")->nullable();
            $table->string("id_agent_gest")->nullable();
            $table->integer("delai_grac")->nullable();
            $table->integer("differe_jours")->nullable();
            $table->boolean("prelev_auto")->default(0)->nullable();
            $table->integer("duree_mois")->nullable();
            $table->integer("nouv_duree_mois")->nullable();
            $table->string("terme")->nullable();
            $table->double("gar_num")->nullable();
            $table->double("gar_tot")->nullable();
            $table->double("gar_mat")->nullable();
            $table->double("gar_num_encours")->nullable();
            $table->integer("cpt_gar_encours")->nullable();
            $table->integer("num_cre")->nullable();
            $table->string("assurances_cre")->nullable();
            $table->integer("cpt_liaison")->nullable();
            $table->integer("cre_id_cpte")->nullable();
            $table->integer("cre_etat")->nullable();
            $table->dateTime("cre_date_etat")->nullable();
            $table->dateTime("cre_date_approb")->nullable();
            $table->dateTime("cre_date_debloc")->nullable();
            $table->integer("cre_nbre_reech")->nullable();
            $table->double("cre_mnt_octr")->nullable();
            $table->string("details_motif")->nullable();
            $table->boolean("suspension_pen")->default(0)->nullable();
            $table->string("perte_capital")->nullable();
            $table->integer("cre_retard_etat_max")->nullable();
            $table->integer("cre_retard_etat_max_jour")->nullable();
            $table->integer("differe_ech")->nullable();
            $table->integer("id_dcr_grp_sol")->nullable();
            $table->string("gs_cat")->nullable();
            $table->string("prelev_commission")->nullable();
            $table->string("cre_prelev_frais_doss")->nullable();
            $table->integer("cpt_prelev_frais")->nullable();
            $table->double("prov_mnt")->nullable();
            $table->date("prov_date")->nullable();
            $table->string("prov_is_calcul")->nullable();
            $table->double("cre_mnt_deb")->nullable();
            $table->string("doss_repris")->nullable();
            $table->string("cre_cpt_att_deb")->nullable();
            $table->double("mnt_assurance")->nullable();
            $table->double("mnt_commission")->nullable();
            $table->double("mnt_frais_doss")->nullable();
            $table->string("detail_obj_dem_bis")->nullable();
            $table->string("id_bailleur")->nullable();
            $table->string("nb_jr_bloq_cre_avant_ech")->nullable();
            $table->double("cre_mnt_bloq")->nullable();
            $table->string("is_extended")->nullable();
            $table->string("interet_remb_anticipe")->nullable();
            $table->string("besoins_financements")->nullable();
            $table->double("taux_marge")->nullable();
            $table->double("montant_marge")->nullable();
            $table->string("Benefice_estimatif")->nullable();
            $table->string("periodicite")->nullable();
            $table->string("typ_caution_financiere")->nullable();
            $table->integer("nbr_echeance")->nullable();
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
        Schema::dropIfExists('credits');
    }
};
