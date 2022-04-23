<?php

namespace App\Orchid\Layouts;

//use Orchid\Screen\Layout;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Listener;
use Orchid\Support\Facades\Layout;
//use Orchid\Screen\Layouts\Listener;

class margelistener extends Listener
{
    /**
     * List of field names for which values will be listened.
     *
     * @var string[]
     */
    protected $targets = [
        'credit.mnt_dem',
        'credit.taux_marge',
        'credit.montant_marge'
    ];

 /**
     * What screen method should be called
     * as a source for an asynchronous request.
     *
     * The name of the method must
     * begin with the prefix "async"
     *
     * @var string
     */
    protected $asyncMethod = 'asyncMarge';

    /**
     * @return Layout[]
     */
    protected function layouts(): iterable
    {
        return [
    Layout::rows([
        Input::make('credit.mnt_dem')
                ->title('Montant demandé')
                ->type('number'),

        Input::make('credit.taux_marge')
                ->title('Taux marge')
                ->type('number'),
        Input::make('credit.montant_marge')
            ->title('Montant marge')
            //->readonly()
           // ->canSee($this->query->has('credit.montant_marge')),
             ,
            //dd($b),
       ])

        ];
    }
}
