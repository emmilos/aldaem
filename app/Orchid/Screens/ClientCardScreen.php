<?php

namespace App\Orchid\Screens;

use App\Models\Client;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use App\Orchid\Layouts\ClientListLayout;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

//use Orchid\Screen\Layouts\Table;
//use Orchid\Screen\TD;
//use App\Models\Client;
//use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;
//use App\Orchid\Layouts\ClientListLayout;

class ClientCardScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(Client $client): iterable
    {
        return [
            'client' => $client,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Client';
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
            Layout::legend('client', [
                Sight::make('id'),
                Sight::make('pp_raison_sociale', 'client')->render(function (Client $client) {
                        return $client->pm_raison_sociale === null
                            ?  $client->pp_nom. ' ' .$client->pp_prenom
                            :  $client->pm_raison_sociale;
                    }),
                Sight::make(''),
            ]),
            
                //ClientListLayout::class,
            
            
        ];
    }
}
