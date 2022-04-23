<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\DateTimer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClientPPEditLayout extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return [
                Input::make('pp_nom')
                       ->title('Nom'),
                Input::make('Prenom', 'pp_prenom'),
                DateTimer::make('Date de Naissance', 'pp_date_naissance'),
                Input::make('Lieu de Naissance', 'pp_lieu_naissance'),
                //BelongsTo::make('Pays', 'pays', 'App\Nova\Pays'),
                Input::make('Pays de Naissance', 'pp_pays_naiss'),
                Input::make('Sexe', 'pp_sexe'),
                Input::make('Nationalité', 'pp_nationalite'),
                Input::make('Type de Piece Identite', 'pp_type_piece_identite'),
                DateTimer::make('Date de Piece Identite', 'pp_date_piece_identite'),
                Input::make('Lieu de delivrance identite', 'pp_lieu_delivrance_identite'),
                Input::make('Num Piece IDENTITE', 'pp_num_piece_identite'),
                DateTimer::make('Date expiration Piece Identite', 'pp_date_exp_identite'),
                Input::make('Etat Civil', 'pp_etat_civil'),
                Input::make('Nombre Enfants', 'pp_nbre_enfant')->Type('number'),
                Input::make('Casier Judiciaire', 'pp_casier_judiciaire'),
                Input::make('Revenue', 'pp_revenu'),
                Input::make('Patrimoine', 'pp_pm_patrimoine'),
                Input::make('Profession', 'pp_pm_activite_prof'),
                Input::make('Employeur', 'pp_employeur'),
                Input::make('Fonction', 'pp_fonction'),
                Input::make('Partenaire', 'pp_partenaire ')
        ];
    }
}
