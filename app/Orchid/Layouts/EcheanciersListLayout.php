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
           TD::make('id', 'No'),
           TD::make('date_ech', 'Date echeance'),
           TD::make('mnt_cap', 'Montant capital'),
           TD::make('mnt_int', 'Montant marge'),
           TD::make('mnt_gar', 'Montant caution'),
           TD::make('', 'Total echeance'),
        ];
    }
}
