<?php

namespace App\Models;

use Orchid\Screen\AsSource;
use Orchid\Filters\Filterable;
use Orchid\Attachment\Attachable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Credit extends Model
{
    use AsSource, Attachable, Filterable;

    protected $table = 'credits';
    //with($value) [echeanciers];
    protected $casts = ['date_dem' => 'datetime',
                         'cre_date_debloc' => 'datetime',
                         'created_at' => 'date',
                         'updated_at' => 'date',
                        ];
    public function client(){
        return $this->BelongsTo(Client::class, 'client_id');
    }
    public function typecredit(){

        Return $this->BelongsTo(TypeCredit::class);
     }


     public function typemarge(){

        Return $this->BelongsTo(TypeMarge::class);
     }
     public function objetscredits(){

        Return $this->belongsTo(ObjetsCredits::class);
     }

     public function Echeancier (){
        Return $this->HasMany(Echeancier::class);
    }


    protected $fillable = [
        'client_id',
        'typecredit_id',
        'mode_calc_int' ,
        'mode_perc_int' ,
        'date_dem' ,
        'mnt_dem' ,
        'objetscredits_id' ,
        'detail_obj_dem' ,
        'etat' ,
        'date_etat' ,
        'motif' ,
        'id_agent_gest' ,
        'delai_grac' ,
        'differe_jours' ,
        'prelev_auto' ,
        'duree_mois' ,
        'nouv_duree_mois' ,
        'terme' ,
        'gar_num' ,
        'gar_tot' ,
        'gar_mat' ,
        'gar_num_encours' ,
        'cpt_gar_encours' ,
        'num_cre' ,
        'assurances_cre' ,
        'cpt_liaison' ,
        'cre_id_cpte' ,
        'cre_etat' ,
        'cre_date_etat' ,
        'cre_date_approb' ,
        'cre_date_debloc' ,
        'cre_nbre_reech' ,
        'cre_mnt_octr' ,
        'details_motif' ,
        'suspension_pen' ,
        'perte_capital' ,
        'cre_retard_etat_max' ,
        'cre_retard_etat_max_jour' ,
        'differe_ech' ,
        'id_dcr_grp_sol' ,
        'gs_cat' ,
        'prelev_commission' ,
        'cre_prelev_frais_doss' ,
        'cpt_prelev_frais' ,
        'prov_mnt' ,
        'prov_date' ,
        'prov_is_calcul' ,
        'cre_mnt_deb' ,
        'doss_repris' ,
        'cre_cpt_att_deb' ,
        'mnt_assurance' ,
        'mnt_commission' ,
        'mnt_frais_dossier' ,
        'detail_obj_dem_bis' ,
        'id_bailleur' ,
        'nb_jr_bloq_cre_avant_ech' ,
        'cre_mnt_bloq' ,
        'is_extended' ,
        'interet_remb_anticipe',
        'besoins_financements' ,
        'taux_marge' ,
        'montant_marge' ,
        'Benefice_estimatif' ,
        'periodicite' ,
        'typ_caution_financiere' ,
        'nbr_echeance',


    ];

}
