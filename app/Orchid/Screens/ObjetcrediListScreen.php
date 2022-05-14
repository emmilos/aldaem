<?php

namespace App\Orchid\Screens;

use App\Models\ObjetCredit;
use App\Orchid\Layouts\ObjetCreditListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class ObjetcrediListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'objetcredits' => ObjetCredit::paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Objet de crédit';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Créer un objet de credit')
                ->icon('pencil')
                ->route('platform.objcredit.edit')
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
            ObjetCreditListLayout::class
        ];
    }
}
