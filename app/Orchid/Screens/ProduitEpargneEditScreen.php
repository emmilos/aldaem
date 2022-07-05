<?php

namespace App\Orchid\Screens;

use App\Models\ProduitsEpargne;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class ProduitEpargneEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public $produitsepargne;

    public function query(ProduitsEpargne $produitsepargne): iterable
    {
        return [
            'produitsepargne' => $produitsepargne,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Produit Epargne';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
        Button::make('Créer')
            ->icon('pencil')
            ->method('createOrUpdate')
            ->canSee(!$this->produitsepargne->exists),

        Button::make('Mis à jour')
            ->icon('note')
            ->method('createOrUpdate')
            ->canSee($this->produitsepargne->exists),

        Button::make('Supprimer')
            ->icon('trash')
            ->method('remove')
            ->canSee($this->produitsepargne->exists)
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
                    Input::make('paroduits_epargnes.libel')
                         ->title('Libellé du produit d\'epargne')
                         ->horizontal(),
                    Input::make('paroduits_epargnes.terme')
                         ->title('Terme')
                         ->horizontal(),
                    Input::make('paroduits_epargnes.mnt_min')
                         ->title('Montant minimum')
                         ->horizontal(),
                    Input::make('paroduits_epargnes.mnt_max')
                         ->title('Montant maximum')
                         ->horizontal(),
                    Input::make('paroduits_epargnes.frais_tenue_cpt')
                         ->type('int')
                         ->horizontal()
                         ->title('Frais de tenue du compte'),

                    Input::make('paroduits_epargnes.frais_ouverture_cpt')
                         ->type('int')
                         ->horizontal()
                         ->title('Frais de retrait'),
                    Input::make('paroduits_epargnes.frais_ouverture_cpt')
                         ->type('int')
                         ->horizontal()
                         ->title('Frais ouverture'),
                    Input::make('paroduits_epargnes.tx_interet')
                         ->type('int')
                         ->horizontal()
                         ->title('Taux d\'interêt'),
                    Input::make('paroduits_epargnes.freq_calcul_int')
                         ->type('int')
                         ->horizontal()
                         ->title('Fréquence de calcul des interêts'),
                  
            ])
        ];

    }
    public function createOrUpdate(ProduitsEpargne $produitepargne, Request $request)
    {
        $produitepargne->fill($request->get('paroduits_epargnes'))->save();

        Alert::info('Vous avez créée un nouveau produit épargne avec succès !');

        return redirect()->route('platform.produitepargne.list');
    }

}
