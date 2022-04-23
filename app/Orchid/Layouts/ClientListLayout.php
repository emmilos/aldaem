<?php

namespace App\Orchid\Layouts;

use Orchid\Screen\TD;
use App\Models\Client;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Fields\CheckBox;

class ClientListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'client';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [

            TD::make('id')->width('100px'),  
            TD::make('Nom du client')
                 ->render(function ($client) {
                  return e($client->gi_nom) . ' ' . e($client->pm_raison_sociale). ' ' . e($client->pp_nom). ' ' . e($client->pp_prenom);
            }),

            TD::make('Actions')->width('150px')
                 ->render(function ($client) {
                 return Group::make([
                 Link::make('')->route('platform.client.show', $client)
                 ->icon('eye'),
                 Link::make('')->route('platform.client.edit', $client)
                 ->icon('pencil'),
                 ]);

            
             }),
        ];
    }
}
