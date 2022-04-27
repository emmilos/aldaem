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
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cpte')->nullable();
            $table->integer('id_titulaire')->nullable();
            $table->dateTime('date_ouvert')->nullable();
            $table->integer('etat_cpte')->nullable();
            $table->integer('nbr_jours_bloque')->nullable();
            $table->double('solde')->nullable();
            $table->double('interet_annuel')->nullable();
            $table->double('solde_calcul_interets')->nullable();
            $table->dateTime('date_solde_calcul_interets')->nullable();
            $table->dateTime('date_calcul_interets')->nullable();
            $table->double('tx_interet_cpte')->nullable();
            $table->integer('terme_cpte')->nullable();
            $table->string('freq_calcul_int_cpte')->nullable();
            $table->integer('mode_calcul_int_cpte')->nullable();
            //cpte_virement_clot  ,
            $table->integer('mode_paiement_cpte')->nullable();
            $table->dateTime('date_clot')->nullable();
            //solde_clot ,
            //raison_clot  ,
            //mnt_bloq ,
            $table->integer('num_cpte')->nullable();
            $table->string('num_complet_cpte')->nullable();
            $table->integer('id_prod')->nullable();
            //raison_blocage,
            $table->dateTime('date_blocage')->nullable();
            //utilis_bloquant,
            //dat_prolongation,
            //dat_date_fin  ,
            //dat_num_certif ,
            $table->integer('dat_nb_prolong')->nullable();
            //dat_decision_client,
            $table->dateTime('dat_date_decision_client')->nullable();
            $table->('intitule_compte')->nullable();
            //decouvert_max ,
            //cpt_vers_int  ,
            //export_netbank,
            //id_dern_extrait_imprime,
            //decouvert_date_util  ,
            //num_last_cheque  ,
            //etat_chequier  ,
            //date_demande_chequier  ,
            //chequier_num_cheques  ,
            $table->double('mnt_min_cpte')->nullable();
            //solde_part_soc_restant ,
            $table->integer('id_ag')->nullable();
            //interet_a_capitaliser ,
            //dat_nb_reconduction  ,
            $table->integer('num_cpte_comptable')->nullable();
            $table->dateTime('date_creation')->nullable();
            $table->dateTime('date_modif ')->nullable();
            $table->string('mnt_bloq_cre')->nullable();        
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
        Schema::dropIfExists('comptes');
    }
};
