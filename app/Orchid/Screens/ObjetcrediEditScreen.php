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

    //public $objetcredits;
    public function query(ObjetCredit $objetcredits): iterable
    {
        return [
            'objetcredits' => $objetcredits
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->objetcredits->exists ? 'Mise à jour Objets de Credits' : 'Création d\'un objet de credit';;
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
            ->canSee(!$this->objetcredits->exists),

        Button::make('Mis à jour')
            ->icon('note')
            ->method('createOrUpdate')
            ->canSee($this->objetcredits->exists),

        Button::make('Supprimer')
            ->icon('trash')
            ->method('remove')
            ->canSee($this->objetcredits->exists)

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
                Input::make('objetcredits.libel')
                ->type('Text')
                ->title(__('Libellé objet de crédit'))
                ->horizontal()
            ])
        ];
    }
    public function createOrUpdate(ObjetCredit $objetcredits, Request $request)
    {
        $objetcredits->fill($request->get('objetcredits'))->save();

        //Alert::info('Vous avez créée un nouveau client avec succès !');

        return redirect()->route('platform.objcredit.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(ObjetCredit $objetcredits)
    {
        $objetcredits->delete();

        //Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.pays.list');
    }
}
