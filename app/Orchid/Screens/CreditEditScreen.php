<?php

namespace App\Orchid\Screens;

use App\Models\Credit;
use App\Models\Client;
use Orchid\Screen\Action;
use Orchid\Screen\Screen;
use App\Models\TypeCredit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Relation;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Fields\DateTimer;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Alert;
use App\Models\ObjetCredit;
use App\Models\periodicite;
use App\Orchid\Layouts\margelistener;
use App\Orchid\Layouts\CreditEditLayout;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Fields\Label;
//use Illuminate\Http\Request;

class CreditEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */

    public $credit;

    public function query(Credit $credit): iterable
    {
        return [
            'credit' => $credit
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Mise en place dossier de crédit';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [

        Button::make('Mise en place dossier de crédit')
            ->icon('pencil')
            ->method('createOrUpdate')
            ->canSee(!$this->credit->exists),

        Button::make('Mis à jour')
            ->icon('note')
            ->method('createOrUpdate')
            ->canSee($this->credit->exists),

        Button::make('Supprimer')
            ->icon('trash')
            ->method('remove')
            ->canSee($this->credit->exists),

        ];
    }


    public function asyncMarge(int $a = null, int $b = null)
    {
        return [
            'credit.mnt_dem' => $a,
            'credit.taux_marge' => $b,
            'credit.montant_marge' => ($a * $b)/100
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
                Relation::make('credit.client_id')
                         ->fromModel(Client::class, 'id')
                         ->empty('No select')
                         ->displayAppend('full')
                         ->title('Client')
                         ->horizontal(),
                Select::make('credit.typecredit_id')
                          ->fromModel(TypeCredit::class, 'libel')
                          ->empty('No select')
                          ->title('Mode de Financement')
                          ->horizontal(),
                DateTimer::make('credit.date_dem')
                          ->title('Date de la demande')
                          ->horizontal(),
                DateTimer::make('credit.cre_date_debloc')
                           ->title('Date de déblocage')
                           ->horizontal(),
                Select::make('credit.periodicite')
                           ->fromModel(periodicite::class, 'libel')
                           ->empty('No select')
                           ->title('Periodicité')
                           ->horizontal(),
/*->options([
                    0 => 'En une seule fois',
                    1 => 'Mensuelle',
                    3 => 'trimestrielle',
                    6 => 'Semestrielle',
                    12 => 'Annuelle'
                ])->title('Périodicité')
                ->empty('No select')
                ->horizontal(),*/
                Select::make('credit.objetscredits_id')
                          ->fromModel(ObjetCredit::class, 'libel')
                          ->empty('No select')
                          ->title('Objet de crédits')
                          ->horizontal(),

                Input::make('credit.detail_obj_dem')->title('Detail de la demande')->horizontal(),
                Input::make('credit.duree_mois')->title('Durée en mois')->horizontal(),
                Input::make('credit.delai_grac')->title('Délai de grace')->horizontal(),
                Input::make('credit.etat')
                      ->value('En attente de decision')
                      ->title('Etat du dossier')
                      ->readonly()
                      ->horizontal(),
                Select::make('credit.mode_perc_int')->options([
                    1 => 'Au début',
                    2 => 'Inclus dans les remboursments',
                    3 => 'A la fin',
                ])->title('Mode de perception de la marge')
                ->empty('No select')
                ->horizontal(),

                Select::make('credit.mode_calc_int')->options([
                    0 => 'Marge sur le capital',
                    1 => 'Marge sur le bénéfice',
                ])->title('Mode de calcul marge')
                  ->horizontal(),

                Select::make('credit.typ_caution_financiere')->options([
                    0 => 'Préalable',
                    1 => 'Incluse dans les remboursements',
                ])->title('Type de caution financière')
                  ->horizontal(),

                /*NovaDependencyContainer::make([
                    Input::make('Bénefice estimatif', 'Benefice_estimatif'),
                ])->dependsOn('mode_calc_int', 1),*/

                Input::make('credit.mnt_dem')->title('Frais de dossier')->horizontal(),
                Input::make('credit.montant_marge')->title('Marge appliquée')->horizontal(),
                Input::make('credit.gar_num')->title('Montant Caution')->horizontal(),
                Input::make('credit.mnt_assurance')->title('Montant assurance')->horizontal(),
                Input::make('credit.mnt_commission')->title('Montant commission')->horizontal(),
                Input::make('credit.mnt_frais_doss')->title('Frais de dossier')->horizontal(),
                ]),
                //margelistener::class,

        ];
    }

    public function createOrUpdate(Credit $credit, Request $request)
    {
        $credit->fill($request->get('credit'))->save();

        $parametre1 = $credit->id;
        DB::statement("call echeancier(?)", [
            $parametre1
        ]);
        Alert::info('Nouveau crédit mis en place avec succès !');
        return redirect()->route('platform.credit.show');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(Credit $credit)
    {
        $credit->delete();

        Alert::info('You have successfully deleted the post.');

        return redirect()->route('platform.credit.list');
    }
}
