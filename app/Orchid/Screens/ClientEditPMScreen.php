<?php

namespace App\Orchid\Screens;

use id;
//use Orchid\Screen\Layout;
use App\Models\Client;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\DateTimer;
use App\Orchid\Layouts\ClientPMEditLayout;
use Orchid\Screen\Fields\Matrix;

class ClientEditPMScreen extends Screen
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
        return $this->client->exists ? 'Mise à jour Client' : 'Création dun client';
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
            Layout::rows([
                Select::make('client.statut_juridique')->options([
                     0 => 'Personne physique',
                     1 => 'Personne morale',
                     2 => 'Groupe solidaire'
                ])->title('Statut Juridique'),

                Input::make('client.pm_raison_sociale')->title('Raison sociale'),
                Input::make('client.pm_abreviation')->title('Abreviation'),
                DateTimer::make('client.pm_date_expiration')->title('Date expiration'),
                DateTimer::make('client.pm_date_notaire')->title('Date notaire'),
                DateTimer::make('client.pm_date_depot_greffe')->title('Date de depot du greffe'),
                Input::make('client.pm_lieu_depot_greffe')->title('Lieu de depot du greffe'),
                Input::make('client.pm_numero_reg_nat')->title('Nationalité'),
                Input::make('client.pm_nature_juridique')->title('Nature juridique'),
                Input::make('client.pm_tel2')->title('Telephone 2'),
                Input::make('client.pm_tel3')->title('Telephone 3'),
                Input::make('client.pm_email2')->title('Email'),
                DateTimer::make('client.pm_date_constitution')->title('Date constitution'),
                Input::make('client.pm_agrement_nature')->title('Nature Agrement'),
                Input::make('client.pm_agrement_autorite')->title('Autorite Agrement'),
                Input::make('client.pm_agrement_numero')->title('Numero Agrement'),
                DateTimer::make('client.pm_agrement_date')->title('Date Agrement'),
                Input::make('client.pm_categorie')->title('Categorie'),
                ]),
                Layout::rows([
                    Matrix::make('echeanciers')
                           ->title('Echeanciers previsionnels')
                           ->columns(['id', 'date_ech'])
                           ->fields([
                                    'id' => Input::make(),
                                    'date_ech' => DateTimer::make(),
                           ])
                ])
            //ClientPMEditLayout::class
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
