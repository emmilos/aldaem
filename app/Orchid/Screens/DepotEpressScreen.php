<?php

namespace App\Orchid\Screens;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class DepotEpressScreen extends Screen
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
        return 'DepotEpressScreen';
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
              ->method('savedepot')
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

    public function savedepot(Request $request)
    {
        /*`SoldeTPE` DECIMAL(20,6),
	`numerotransaction` TEXT,
	`numcompte` TEXT,
	`montantdepose` DECIMAL(20,6),
	`datejour` TIMESTAMP,
	`numcomptepointservice` TEXT,
	`slogin` TEXT,
	`cptliaison` INT,
	`typag` INT,
	`dep` INT*/


        //$pays->fill($request->get('pays'))->save();
        //$montant = $request->input('user.roles', []);
        //$parametre1 = $credit->id;
        //$parametre2 = $request->input('montant', []);;
        //Input::get('montant') ;
        //Alert::info('Vous avez créée un nouveau client avec succès !');
        DB::statement("select depotespeces(?,?,?,?,?,?,?,?,?,?)", [0,0,0,0,Now(),0,0,0,0,0,
            //$parametre1,
           // $parametre2,
        ]);

}
}
