<?php

namespace App\Orchid\Screens;

use App\Models\ProduitsEpargne;
use App\Orchid\Layouts\ProduitepargneListLayout;
use Orchid\Screen\Actions\Link;
//use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class ProduitEpargneListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public $produitepargne;

    public function query(): iterable
    {
        return [
            'produits_epargnes' => ProduitsEpargne::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Liste des Produits d\'Epargne';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Créer un nouveau')
                ->icon('pencil')
                ->route('platform.produitepargne.edit')
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
            ProduitepargneListLayout::class,
        ];
    }
}
