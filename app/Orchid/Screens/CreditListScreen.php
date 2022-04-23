<?php

namespace App\Orchid\Screens;

use App\Models\Credit;
use App\Orchid\Layouts\CreditListLayout;
use Orchid\Screen\Screen;
//use Orchid\Screens\layouts\TD;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class CreditListScreen extends Screen
{
    /**
     * Query data.
     -*
     * @return array
     */

    //public $credit;

    public function query(): iterable
    {
        return [
            'credit' => Credit::paginate(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Liste des dossiers de financement';
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
        return [
            CreditListLayout::class,

        ];
    }


}
