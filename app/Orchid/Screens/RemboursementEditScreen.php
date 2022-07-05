<?php

namespace App\Orchid\Screens;

use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Credit;
use App\Models\Echeanciers;
use App\Models\TypeCredit;
use App\Orchid\Layouts\EcheanciersListLayout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Label;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Layouts\Selection;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;

class RemboursementEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public $echeanciers;
    public function query(Credit $credit): iterable
    {
        return [
                 'credit' => $credit,
                 'echeanciers' => Echeanciers::where('credit_id','=', $credit->id, 'and')->where('remb', 0)->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Remboursement de crédit';
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
                //Select::make(),
                Relation::make('credit.client_id')
                         ->fromModel(Client::class, 'id')
                         ->empty('No select')
                         ->displayAppend('full')
                         ->title('Client')
                         ->horizontal(),
                Relation::make('credit.id')
                          ->fromModel(Credit::class, 'id')
                          ->empty('No select')
                          ->displayAppend('full')
                          ->title('Choisir le dossier de credit')
                          ->horizontal(),

            ]),
                //Input::make('client_id'),
                EcheanciersListLayout::class,

        Layout::rows([
            Label::make('Remboursement')
            ->title('Remborsement'),
            Input::make('credit.mnt_dem')
            ->title('Montant du crédit')
            ->horizontal(),
            
            Input::make('credit.cre_id_cpte')
            ->title('N° compte lié')
            ->horizontal(),
            Input::make('credit.cre_id_cpte')
            ->title('Solde compte lié')
            ->horizontal(),
            Input::make('montant')
            ->title('Montant remboursement')
            ->required('true')
            ->horizontal(),
            //$montant = Input::get('montant'),
            Group::make([
                Button::make(__('Valider'))
                  ->method('remboursercredit')
                  ->icon('save')
                  ->type(Color::PRIMARY())
                  //->confirm(__('Are you sure you want to delete the user?'))
                  ->parameters([
                     //$montant = 'montant',
                  ]),
                Button::make(__('Annuler'))
                  ->method('remove')
                  ->icon('close')
                  ->type(Color::DANGER())
                  ->confirm(__('Are you sure you want to delete the user?'))
                  ->parameters([
                      //'id' => $user->id,
                  ])
            ])
            ])
        ];
    }

    
    public function remboursercredit(Credit $credit, Request $request)
    {
        //$pays->fill($request->get('pays'))->save();
        //$montant = $request->input('user.roles', []);
        $parametre1 = $credit->id;
        $parametre2 = $request->input('montant', []);; 
        //Input::get('montant') ; 
        //Alert::info('Vous avez créée un nouveau client avec succès !');
        DB::statement("call remboursementCredit(?,?)", [
            $parametre1,
            $parametre2, 
        ]);
        //return redirect()->route('platform.pays.list');
    }





 



}
