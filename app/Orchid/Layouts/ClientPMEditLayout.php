<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\DateTimer;
//use Orchid\Screen\Layout;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;




class ClientPMEditLayout extends Rows
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
            Layout::rows([
                Select::make('statut_juridique')->options([
                     0 => 'Personne physique',
                     1 => 'Personne morale',
                     2 => 'Groupe solidaire'
                ])->title('Statut Juridique'),
                Input::make('pm_raison_sociale')->title('Raison sociale'),
                Input::make('pm_abreviation')->title('Abreviation'),
                DateTimer::make('pm_date_expiration')->title('Date expiration'),
                DateTimer::make('pm_date_notaire')->title('Date notaire'),
                DateTimer::make('pm_date_depot_greffe')->title('Date de depot du greffe'),
                Input::make('pm_lieu_depot_greffe')->title('Lieu de depot du greffe'),
                Input::make('pm_numero_reg_nat')->title('Nationalité'),
                Input::make('pm_nature_juridique')->title('Nature juridique'),
                Input::make('pm_tel2')->title('Telephone 2'),
                Input::make('pm_tel3')->title('Telephone 3'),
                Input::make('pm_email2')->title('Email'),
                DateTimer::make('pm_date_constitution')->title('Date constitution'),
                Input::make('pm_agrement_nature')->title('Nature Agrement'),
                Input::make('pm_agrement_autorite')->title('Autorite Agrement'),
                Input::make('pm_agrement_numero')->title('Numero Agrement'),
                DateTimer::make('pm_agrement_date')->title('Date Agrement'),
                Input::make('pm_categorie')->title('Categorie'),
                ]),
        ];
    }
}
