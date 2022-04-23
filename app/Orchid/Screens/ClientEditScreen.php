<?php

namespace App\Orchid\Screens;

use App\Models\Client;
use App\Models\User;
use App\Orchid\Layouts\ClientPPEditLayout;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;


class ClientEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public $client;

    public function query(Client $client): iterable
    {
        return [
            'client' => $client
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->client->exists ? 'Mise à jour Client' : 'Création d\'un client';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

        Button::make('Créer client')
            ->icon('pencil')
            ->method('createOrUpdate')
            ->canSee(!$this->client->exists),

        Button::make('Mis à jour')
            ->icon('note')
            ->method('createOrUpdate')
            ->canSee($this->client->exists),

        Button::make('Supprimer')
            ->icon('trash')
            ->method('remove')
            ->canSee($this->client->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
              ClientPPEditLayout::class
        ];
    }

    public function createOrUpdate(Client $client, Request $request)
    {
        $client->fill($request->get('client'))->save();

        Alert::info('Vous avez créée un nouveau client avec succès !');

        return redirect()->route('platform.client.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Client $client)
    {
        $client->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.client.list');
    }
}
