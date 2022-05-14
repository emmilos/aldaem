<?php

namespace App\Orchid\Screens;

use App\Models\Echeanciers;
use Orchid\Screen\Screen;

class EcheanciersListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public $echeanciers;
    public function query(): iterable
    {
        return [
         'echeanciers' => Echeanciers::paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'EcheanciersListScreen';
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
        return [];
    }
}
