<?php

namespace App\Orchid\Screens;

use App\Models\Compte;
use App\Models\Client;
use Orchid\Screen\Actions\Button;
use App\Models\ProduitsEpargne;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class OuvertureCompteScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public $compte;

    public function query(Compte $compte): iterable
    {
        return [
            'compte' => $compte
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Ouverture de Compte';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Relation::make('comptes.client_id')
                         ->fromModel(Client::class, 'id')
                         ->empty('No select')
                         ->displayAppend('full')
                         ->title('Client')
                         ->horizontal(),
                Select::make('comptes.produits_epargnes_id')
                      ->fromModel(ProduitsEpargne::class, 'libel')
                      ->empty('No select')
                      ->title('Produit d\'Epargne')
                      ->horizontal(),
                Input::make('comptes.   ')
                      ->title('Numéro de compte')
                      ->horizontal(),
                Input::make('comptes.')
                      ->title('Intitulé du compte')
                      ->horizontal(),
                Input::make('comptes.')
                      ->title('Frais d\'ouverture de compte')
                      ->horizontal(),
                Input::make('comptes.')
                      ->title('Frais de depôt sur le compte')
                      ->horizontal(),
                Input::make('comptes.')
                      ->title('Montant minimum sur le compte')
                      ->horizontal(),
                Input::make('comptes.')
                      ->title('Versement minimum')
                      ->horizontal(),
                Input::make('comptes.')
                      ->title('Montant maximum sur le compte')
                      ->horizontal(),                
            ]),
        Layout::rows([
          Group::make([
              Button::make(__('Valider'))
                ->method('remove')
                ->icon('save')
                ->type(Color::PRIMARY())
                ->confirm(__('Are you sure you want to delete the user?'))
                ->parameters([
                    //'id' => $user->id,
                ]),
              Button::make(__('Annuler'))
                ->method('remove')
                ->icon('close')
                ->type(Color::DANGER())
                ->confirm(__('Are you sure you want to delete the user?'))
                ->parameters([
                    //'id' => $user->id,
                ]),
          ])->autoWidth()
              ])

        ];
    }
}
