<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\SectActivites;
use App\Orchid\Layouts\SectActiviteListLayout;
use Orchid\Screen\Actions\Link;

class SectActiviteListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'sect_activite' => SectActivites::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'SectActiviteListScreen';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Créer un secteur d\'activités')
                ->icon('pencil')
                ->route('platform.sectactivite.edit')
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
           SectActiviteListLayout::class
        ];
    }
}
