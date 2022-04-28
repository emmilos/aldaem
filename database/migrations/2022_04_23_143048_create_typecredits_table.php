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
        Schema::create('typecredits', function (Blueprint $table) {
            $table->id();
            $table->string("libel")->unique();
	        $table->double("tx_marge_min");
	        $table->double("tx_marge_max");
	        $table->double("mnt_min");
	        $table->double("mnt_max");
	        $table->integer("duree_min_mois");
	        $table->integer("duree_max_mois");
	        $table->integer("periodicite");
	        $table->double("mnt_frais_min");
	        $table->double("mnt_frais_max");
	        $table->double("mnt_commission");
	        $table->double("prc_assurance");
	        $table->double("prc_gar_num");
            $table->double("prc_gar_mat");
            $table->double("prc_gar_tot");
            $table->double("prc_gar_encours");
            $table->double("mnt_penalite_jour");
            $table->double("prc_penalite_retard");
            $table->integer("delai_grace_jour");
            $table->integer("differe_jours_max");
            $table->integer("nbre_reechelon_auth");
            $table->double("prc_commission");
            $table->integer("type_duree_credit");
            $table->boolean("approbation_obli")->default(0);
            $table->integer("typ_pen_pourc_dcr");
            $table->integer("cpte_cpta_prod_cr_int");
            $table->integer("cpte_cpta_prod_cr_gar");
            $table->integer("cpte_cpta_prod_cr_pen");
            $table->char("devise",3);
            $table->integer("differe_ech_max");
            $table->integer("freq_paiement_cap");
            $table->integer("max_jours_compt_penalite");
            $table->String("gs_cat");
            $table->boolean("prelev_frais_doss");
            $table->boolean("percep_frais_com_ass");
            $table->integer("differe_epargne_nantie");
            $table->integer("report_arrondi");
            $table->integer("calcul_interet_differe");
            $table->integer("ordre_remb");
            $table->integer("remb_cpt_gar");
            $table->double("mnt_assurance");
            $table->boolean("is_produit_decouvert")->default(0);
            $table->integer("prc_frais");
            $table->integer("cpte_cpta_att_deb");
            $table->boolean("is_produit_actif")->default(1);
            $table->integer("duree_nettoyage");
            $table->integer("cpte_cpta_prod_cr_frais");
            $table->integer("nb_jr_bloq_cre_avant_ech_max");
            $table->boolean("is_flexible");
            $table->integer("mode_perc_int");
            $table->integer("typ_caution_financiere");
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
        Schema::dropIfExists('typecredits');
    }
};
