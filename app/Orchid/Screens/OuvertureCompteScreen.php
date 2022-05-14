<?php

namespace App\Orchid\Screens;

use App\Models\Compte;
use Orchid\Screen\Actions\Button;
use App\Models\ProduitsEpargne;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Select;
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
                Select::make('produit.id')
                      ->fromModel(ProduitsEpargne::class, 'libel')
                      ->empty('No select')
                      ->title('Produit d\'Epargne')
                      ->horizontal(),
                Input::make('produit.   ')
                      ->title('Numéro de compte')
                      ->horizontal(),
                Input::make('produit.')
                      ->title('Intitulé du compte')
                      ->horizontal(),
                Input::make('produit.')
                      ->title('Solde réel')
                      ->horizontal(),
                Input::make('produit.')
                      ->title('Type de dépot')
                      ->horizontal(),
                Input::make('Montant à déposer')
                      ->title('Montant à déposer')
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
