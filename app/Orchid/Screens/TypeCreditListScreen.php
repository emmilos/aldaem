<?php

namespace App\Orchid\Screens;

use App\Models\TypeCredit;
use App\Orchid\Layouts\TypeCreditListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class TypeCreditListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'typecredits' => TypeCredit::paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Modes de financement';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Créer uu mode financement')
                ->icon('pencil')
                ->route('platform.modefinancement.edit')
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
            TypeCreditListLayout::class,
        ];
    }
}
