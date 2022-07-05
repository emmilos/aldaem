<?php

namespace App\Orchid\Layouts;

use App\Models\Credit;
use App\Models\Client;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;

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
                    TD::make('typecredit', 'Produit de financement')
                    ->render(function (Credit $credit) {
                        return e($credit->typecredit->libel);
                }),
                    TD::make('mnt_dem', 'Montant demandé'),
                    TD::make('etat', 'Etat du dossier'),
                    TD::make('date_dem', 'Date demande'),

                    TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function (Credit $credit) {
                        return DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                Link::make(__('Edit'))
                                    ->route('platform.typemarge.edit', $credit->id)
                                    ->icon('pencil'),
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm(__('Once the account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                                    ->method('', [
                                        'id' => $credit->id,
                                    ]),
                                ]);
                            })
    

                    
                    




        ];
    }
}
