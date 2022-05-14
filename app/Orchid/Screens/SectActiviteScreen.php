<?php

namespace App\Orchid\Screens;

use App\Models\SectActivites;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class SectActiviteScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public $sectactivites;
    public function query(SectActivites $sectactivites): iterable
    {
        return [
                    'sectactivites' => $sectactivites,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'SectActiviteScreen';
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
            ->canSee(!$this->sectactivites->exists),

        Button::make('Mis à jour')
            ->icon('note')
            ->method('createOrUpdate')
            ->canSee($this->sectactivites->exists),

        Button::make('Supprimer')
            ->icon('trash')
            ->method('remove')
            ->canSee($this->sectactivites->exists)
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
               Input::make('sectactivites.libelle')
               ->type('Text')
               ->title(__('Secteurs d\'activités'))
               ->horizontal()
           ])
        ];
    }

    public function createOrUpdate(SectActivites $sectactivites, Request $request)
    {
        $sectactivites->fill($request->get('sectactivites'))->save();

        //Alert::info('Vous avez créée un nouveau client avec succès !');

        return redirect()->route('platform.sectactivite.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    //public function createOrUpdate(SectActivites $sectactivite, Request $request)
    public function remove(SectActivites $sectactivites)
    {
        $sectactivites->delete();

        //Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.sectactivite.list');
    }
}
