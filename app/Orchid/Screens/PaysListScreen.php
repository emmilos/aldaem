<?php

namespace App\Orchid\Screens;

use App\Models\Pays;
use App\Orchid\Layouts\PaysListLayout;
use Orchid\Screen\Screen;
use Orchid\Screen\Actions\Link;

class PaysListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'pays' => Pays::paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'PaysListScreen';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Créer un pays')
                ->icon('pencil')
                ->route('platform.pays.edit')
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
            PaysListLayout::class
        ];
    }
}
