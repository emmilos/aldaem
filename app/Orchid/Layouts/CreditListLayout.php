<?php

namespace App\Orchid\Layouts;

use App\Models\Credit;
use App\Models\Client;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class CreditListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'credit';
    protected function striped() : bool {
        return true;
       }

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [


                    TD::make('id'),
                    TD::make('client', 'client')
                    ->render(function (Credit $credit) {
                        return e($credit->client->pm_raison_sociale). '' .e($credit->client->pp_nom). ' '. e($credit->client->pp_prenom);
                    }),
                    TD::make('typecredit', 'Mode de financement')
                ->render(function (Credit $credit) {
                    return e($credit->typecredit->libel);
                }),
                    TD::make()




        ];
    }
}
