<?php

namespace App\Orchid\Screens;

use App\Models\TypeMarge;
use App\Orchid\Layouts\TypeMargeListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;

class TypemargeListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'type_marge' => TypeMarge::paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Type de marge';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Créer un type de marge')
            ->icon('pencil')
            ->route('platform.typemarge.edit')
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
            TypeMargeListLayout::class,
        ];
    }
}
