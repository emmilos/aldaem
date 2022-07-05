<?php

namespace App\Orchid\Screens;

use App\Models\Client;
use App\Models\Credit;
use App\Models\Echeanciers;
use App\Models\TypeCredit;
use App\Orchid\Layouts\EcheanciersListLayout;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\TD;

class CreditCardScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public  $echeanciers;
    public function query(Credit $credit): iterable
    {
        //$credit = Credit::with('Client')->latest()->paginate();
        return [
            'credit' => $credit,
            'echeanciers' => Echeanciers::where('credit_id','=', $credit->id)->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'CreditCardScreen';
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
            Layout::legend('credit', [
            //Group::make([
            Sight::make('client_id', 'No Client'),

            Sight::make('client', 'client')
                ->render(function (Credit $credit) {
                    return e($credit->client->pm_raison_sociale). '' .e($credit->client->pp_nom). ' '. e($credit->client->pp_prenom);
                }),
            //]),
            Sight::make('typecredits', 'Mode de financement')
                ->render(function (Credit $credit) {
                    return $credit->typecredit->libel;
                }),
        ]),

     EcheanciersListLayout::class,


    ];

    }
}
