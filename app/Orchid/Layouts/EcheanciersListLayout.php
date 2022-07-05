<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class EcheanciersListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'echeanciers';
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
           TD::make('id', __('No')),
           TD::make('date_ech', __('Date echeance')),
           TD::make('mnt_cap', __('Montant capital')),
           TD::make('mnt_int', __('Montant marge')),
           TD::make('mnt_gar', __('Montant caution')),
           TD::make('', __('Total echeance')),
        ];
    }
}
