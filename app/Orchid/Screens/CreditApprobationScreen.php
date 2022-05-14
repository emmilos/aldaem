<?php
declare(strict_types=1);
namespace App\Orchid\Screens;

use Orchid\Support\Facades\Layout;
use App\Models\Credit;
use App\Models\Client;
use App\Models\TypeCredit;
use App\Models\ObjetCredit;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;

class CreditApprobationScreen extends Screen
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
        return 'Approbation dossier de crédit';
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
            Layout::rows([
          Relation::make(__('credit.client_id.'))
                         ->fromModel(Client::class, 'pm_raison_sociale'. 'pp_nom')
                        ->empty('No select')
                         ->displayAppend('full')
                         ->title('Client')
                         ->readonly()
                         ->horizontal(),
                Select::make(__('credit.typecredit_id'))
                          ->fromModel(TypeCredit::class, 'libel')
                          ->empty('No select')
                          ->title('Mode de Financement')
                          ->horizontal()
                          ->readonly(),
                DateTimer::make('credit.date_dem')
                          ->title('Date de la demande')
                          ->horizontal()
                          ->readonly(),
                DateTimer::make('credit.cre_date_debloc')
                           ->title('Date de déblocage')
                           ->horizontal(),
                Select::make('credit.periodicite')->options([
                    0 => "En une seule fois",
                    1 => 'Mensuelle',
                    3 => 'trimestrielle',
                    6 => 'Semestrielle',
                   12 => 'Annuelle'
                ])->title(__('Périodicité'))
                ->empty(__('No select'))
                ->horizontal()
                ->readonly(),
                Select::make('credit.objetscredits_id')
                          ->fromModel(ObjetCredit::class, 'libel')
                          ->empty('No select')
                          ->title('Objet de crédits')
                          ->horizontal()
                          ->diseable(true),

                Input::make('credit.detail_obj_dem')->title('Detail de la demande')->horizontal(),
                Input::make('credit.duree_mois')->title('Durée en mois')->horizontal(),
                Input::make('credit.delai_grac')->title('Délai de grace')->horizontal()->readonly(),
                Input::make('credit.credit.etat')
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

                //Input::make('credit.mnt_dem')->title('Frais de dossier')->horizontal(),
                //Input::make('credit.montant_marge')->title('Marge appliquée')->horizontal(),
                Input::make('credit.gar_num')->title('Montant Caution')->horizontal(),
                Input::make('credit.mnt_assurance')->title('Montant assurance')->horizontal(),
                Input::make('credit.mnt_commission')->title('Montant commission')->horizontal(),
                Input::make('credit.mnt_frais_dossier')->title('Frais de dossier')->horizontal(),
                ])
        ];
    }
}
