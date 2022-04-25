<?php

namespace App\Models;

use App\Orchid\Presenters\ClientPresenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;


class Client extends Model
{

    use AsSource, Attachable, Filterable;

    use Searchable;

    protected $table = 'clients';

    public function presenter()
    {
        return new ClientPresenter($this);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }

    public function getFullAttribute(): string
    {
        return $this->attributes['pp_nom']. ' ' . $this->attributes['pp_prenom']  . ' ' . $this->attributes['pm_raison_sociale'] . ' ';
    }

    public function credits(){
        return $this->hasMany(Creditt::class);
    }
    protected $fillable = [
        'statut_juridique',
        'adresse',
        'code_postal',
        'ville',
        'pays_id',
        'pp_pays_naiss',
        'num_tel',
        'num_port',
        'email',
        'id_loc1',
        'id_loc2',
        'loc3',
        'date_adh',
        'sect_activites_id',
        'utilis_modif',
        'user_id',
        'pp_nom',
        'pp_prenom',
        'pp_date_naissance',
        'pp_lieu_naissance',
        'pp_sexe',
        'pp_nationalite',
        'pp_type_piece_identite',
        'pp_date_piece_identite',
        'pp_lieu_delivrance_identite',
        'pp_nm_piece_identite',
        'pp_date_exp_identite',
        'pp_etat_civil',
        'pp_nbre_enfant',
        'pp_casier_judiciaire',
        'pp_revenu',
        'pp_id_gi',
        'pp_pm_patrimoine',
        'pp_pm_activite_prof6',
        'pp_employeur',
        'pp_fonction',
        'pm_raison_sociale',
        'pm_abreviation',
        'pm_date_expiration',
        'pm_date_notaire',
        'pm_date_depot_greffe',
        'pm_lieu_depot_greffe',
        'pm_numero_reg_nat',
        'pm_nature_juridique',
        'pm_tel2',
        'pm_tel3',
        'pm_email2',
        'pm_date_constitution',
        'pm_agrement_nature',
        'pm_agrement_autorite',
        'pm_agrement_numero',
        'pm_agrement_date',
        'gi_nom',
        'gi_date_agre',
        'gi_nbre_membr',
        'gi_date_dissol',
        'pm_categorie',
        'gs_responsable',
        'pp_partenaire'

    ];

}
