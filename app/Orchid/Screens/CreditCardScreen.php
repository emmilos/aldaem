<?php

namespace App\Orchid\Screens;

use App\Models\Client;
use App\Models\Credit;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Support\Facades\Layout;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\DateTimer;
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
    public function query(Credit $credit): iterable
    {
        //$credit = Credit::with('Client')->latest()->paginate();
        return [
            'credit' => $credit,
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
            Sight::make('id', 'No Credit'),
            Sight::make('pp_raison_sociale', 'client')->render(function (Credit $credit) {
                    return $credit->client()->get();
                }),
            Sight::make('', 'client')
            ->render(function (Credit $credit) {
                return $credit->client->pp_raison_sociale;

            }),
            Sight::make('client_id'),


        ]),

    ];
    }
}
