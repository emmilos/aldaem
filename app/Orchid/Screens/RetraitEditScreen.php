<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class RetraitEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Retrait d\'espèce';
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
                Input::make('Numéro de compte')
                      ->title('Numéro de compte')
                      ->horizontal(),
                Input::make('Solde disponible')
                      ->title('Solde disponible')
                      ->horizontal(),
                Input::make('Solde réel')
                      ->title('Solde réel')
                      ->horizontal(),
                Input::make('Type de dépot')
                      ->title('Type de dépot')
                      ->horizontal(),
                Input::make('Montant à déposer')
                      ->title('Montant à déposer')
                      ->horizontal(),
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
