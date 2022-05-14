<?php

namespace App\Orchid\Layouts;

use App\Models\TypeCredit;
use App\View\Components\TypecreditSortInformation;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Layouts\Table;
use App\View\CompochangingTypecreditShortInformation;
use Orchid\Screen\TD;

class TypeCreditListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'typecredits';

    /*protected function striped() : bool {
        return true;
    }*/

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id'),
            TD::make('libel'),
            TD::make('Taux appliqué')
                ->render(function ($taux) {
                 return '[' . e($taux->tx_marge_min) . ' - ' . e($taux->tx_marge_max). ']';
           }),
           TD::make('Montant')
           ->render(function ($montant) {
            return '[' . e($montant->mnt_min) . ' - ' . e($montant->mnt_max). ']';
           }),
           TD::make('Durée')
           ->render(function ($duree) {
            return '[' . e($duree->duree_min_mois) . ' - ' . e($duree->duree_max_mois). ']';
           }),
            TD::make('periodicite')->component(TypecreditSortInformation::class),

            TD::make('Frais dossier')
           ->render(function ($frais) {
            return '[' . e($frais->mnt_frais_min) . ' - ' . e($frais->mnt_frais_max). ']';
           }),
           // TD::make('mode_perc_int')->render(function (TypeCredit $typecredit){

             //   return [

//];
           //// }),
//TD::make('typ_caution_financiere')->component(TypecreditSortInformation::class),

        ];
    }
}
