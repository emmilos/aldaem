<?php

namespace App\Orchid\Screens;

use App\Models\Pays;
use Orchid\Screen\Screen;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\DateTimer;




class PaysEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public $pays;

    public function query(Pays $pays): iterable
    {
        return [
            'pays' => $pays
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->pays->exists ? 'Mise à jour Pays' : 'Création d\'un pays';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

        Button::make('Créer client')
            ->icon('pencil')
            ->method('createOrUpdate')
            ->canSee(!$this->pays->exists),

        Button::make('Mis à jour')
            ->icon('note')
            ->method('createOrUpdate')
            ->canSee($this->pays->exists),

        Button::make('Supprimer')
            ->icon('trash')
            ->method('remove')
            ->canSee($this->pays->exists)


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
            Input::make('pays.code_pays')
            ->type('text')
            ->horizontal()
            ->title('Code Pays'),

            Input::make('pays.libel_pays')
                   ->type('text')
                   ->horizontal()
                   ->title('Nom du pays'),

            Input::make('pays.libel_nationalite')
            ->type('text')
            ->horizontal()
            ->title('Nationalité'),

        ])
        ];
    }

    public function createOrUpdate(Pays $pays, Request $request)
    {
        $pays->fill($request->get('pays'))->save();

        //Alert::info('Vous avez créée un nouveau client avec succès !');

        return redirect()->route('platform.pays.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Pays $pays)
    {
        $pays->delete();

        //Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.pays.list');
    }
}
