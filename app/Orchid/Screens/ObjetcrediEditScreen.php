<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\ObjetCredit;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\DateTimer;

class ObjetcrediEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    //public $objetcredit;

    public $objetcredits;

    public function query(): iterable
    {
        return [];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->objetcredits->exists ? 'Mise à jour Objets de Credits' : 'Création d\'un objet de creditg';;
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            
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
              
        ];
    }
}
