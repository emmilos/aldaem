<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\TypeCredit;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Group;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class TypeCreditEditScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public $typecredits;
    public function query(TypeCredit $typecredits): iterable
    {
        return [
            'typecredits' => $typecredits,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->typecredits->exists ? 'Mise à jour type crédit' : 'Création d\'un type de crédit';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Créer type de crédit')
            ->icon('pencil')
            ->method('createOrUpdate')
            ->canSee(!$this->typecredits->exists),

            Button::make('Mis à jour')
            ->icon('note')
            ->method('createOrUpdate')
            ->canSee($this->typecredits->exists),

            Button::make('Supprimer')
            ->icon('trash')
            ->method('remove')
            ->canSee($this->typecredits->exists)
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
            Input::make('typecredits.libel')
            ->type('text')
            ->horizontal()
            ->title('Libelle'),
            ]),
        Layout::rows([
          Group::make([
            Input::make('typecredits.tx_marge_min')
                   ->type('number')
                   ->horizontal()
                   ->title('Taux marge min'),

            Input::make('typecredits.tx_marge_max')
            ->type('double')
            ->horizontal()
            ->title('Taux marge max'),
          ]),
        ])->title('aa'),
        Layout::rows([
          Group::make([
            Input::make('typecredits.mnt_min')
            ->type('double')
            ->horizontal()
            ->title('Montant min'),

            Input::make('typecredits.mnt_max')
                   ->type('double')
                   ->horizontal()
                   ->title('Montant max'),
          ]),
        ]),
         Layout::rows([
          Group::make([
            Input::make('typecredits.duree_min_mois')
            ->type('numeric')
            ->horizontal()
            ->title('Durée min mois'),
            Input::make('typecredits.duree_max_mois')
            ->type('int')
            ->horizontal()
            ->title('Durée max mois'),
          ]),
        ]),
        Layout::rows([
            /*Input::make('typecredits.periodicite')
                   ->type('int')
                   ->horizontal()
                   ->title('Periodicité'),*/
           Group::make([
            Input::make('typecredits.mnt_frais_min')
            ->type('number')
            ->horizontal()
            ->title('Montant frais min'),
            Input::make('typecredits.mnt_frais_max')
            ->type('number')
            ->horizontal()
            ->title('Montant frais max'),
           ]),
            Input::make('typecredits.mnt_commission')
                   ->type('number')
                   ->horizontal()
                   ->title('Montant commission'),

            Input::make('typecredits.prc_assurance')
            ->type('number')
            ->horizontal()
            ->title('pourcentage assurance'),
            /*Input::make('typecredits.prc_gar_num')
            ->type('double')
            ->horizontal()
            ->title('prc_gar_num'),

            Input::make('typecredits.prc_gar_mat')
                   ->type('double')
                   ->horizontal()
                   ->title('prc_gar_mat'),

            Input::make('typecredits.prc_gar_tot')
            ->type('double')
            ->horizontal()
            ->title('prc_gar_tot'),
            Input::make('typecredits.prc_gar_encours')
            ->type('double')
            ->horizontal()
            ->title('prc_gar_encours'),*/

            /*Input::make('typecredits.mnt_penalite_jour')
                   ->type('double')
                   ->horizontal()
                   ->title('Montant penalité jour'),

            Input::make('typecredits.prc_penalite_retard')
            ->type('double')
            ->horizontal()
            ->title('prc_penalite_retard'),*/

            Input::make('typecredits.delai_grace_jour')
            ->type('number')
            ->horizontal()
            ->title('Delai de grace(en jour)'),

            /*Input::make('typecredits.differe_jour_max')
                   ->type('int')
                   ->horizontal()
                   ->title('differe_jour_max'),*/

            Input::make('typecredits.prc_commission')
            ->type('number')
            ->horizontal()
            ->title('pourcentage commission'),

            /*Input::make('typecredits.type_duree_credit')
                   ->type('int')
                   ->horizontal()
                   ->title('Type_duree_credit'),
                   Input::make('typecredits.approbation_obli')
                   ->type('int')
                   ->horizontal()
                   ->title('approbation_obli'),*/

                 /*  Input::make('typecredits.typ_pen_pourc_dcr')
                          ->type('int')
                          ->horizontal()
                          ->title('typ_pen_pourc_dcr'),

                   Input::make('typecredits.cpte_cpta_prod_cr_int')
                   ->type('int')
                   ->horizontal()
                   ->title('cpte_cpta_prod_cr_int'),
                   Input::make('typecredits.cpte_cpta_prod_cr_gar')
                   ->type('int')
                   ->horizontal()
                   ->title('cpte_cpta_prod_cr_gar'),

                   Input::make('typecredits.cpte_cpta_prod_cr_pen')
                          ->type('int')
                          ->horizontal()
                          ->title('cpte_cpta_prod_cr_pen'),

                   Input::make('typecredits.devise')
                   ->type('text')
                   ->horizontal()
                   ->title('Devise'),
                   Input::make('typecredits.differe_ech_max')
                   ->type('int')
                   ->horizontal()
                   ->title('differe_ech_max'),*

                   Input::make('typecredits.freq_paiement_cap')
                          ->type('int')
                          ->horizontal()
                          ->title('freq_paiement_cap'),

                   Input::make('typecredits.max_jour_compt_penalite')
                   ->type('int')
                   ->horizontal()
                   ->title('max_jour_compt_penalite'),
                   Input::make('typecredits.gs_cat')
                   ->type('text')
                   ->horizontal()
                   ->title('gs_cat'),

                   Input::make('typecredits.prelev_frais_doss')
                          ->type('int')
                          ->horizontal()
                          ->title('prelev_frais_doss'),

                   Input::make('typecredits.percep_frais_com_ass')
                   ->type('int')
                   ->horizontal()
                   ->title('percep_frais_com_ass'),
                   Input::make('typecredits.differe_epargne_nantie')
                   ->type('int')
                   ->horizontal()
                   ->title('Differe_epargne_nantie'),

                   Input::make('typecredits.report_arrondi')
                          ->type('int')
                          ->horizontal()
                          ->title('Report_arrondi'),

                   Input::make('typecredits.calcul_interet_differe')
                   ->type('int')
                   ->horizontal()
                   ->title('Calcul_interet_differe'),
                   Input::make('typecredits.ordre_remb')
                   ->type('int')
                   ->horizontal()
                   ->title('Ordre_remb'),*

                   Input::make('typecredits.remb_cpt_gar')
                          ->type('int')
                          ->horizontal()
                          ->title('remb_cpt_gar'),*/

                   Input::make('typecredits.mnt_assurance')
                   ->type('double')
                   ->horizontal()
                   ->title('Montant assurance'),

                   /*Input::make('typecredits.prc_frais')
                          ->type('int')
                          ->horizontal()
                          ->title('prc_frais'),

                   Input::make('typecredits.cpte_cpta_att_deb')
                   ->type('int')
                   ->horizontal()
                   ->title('cpte_cpta_att_deb'),*/

                   CheckBox::make('typecredits.is_produit_actif')
                   ->value('1')
                   ->horizontal()
                   ->title('Le produit est actif ?'),
                   /* Input::make('typecredits.mode_perc_int')
                                        ->type('int')
                                        ->horizontal()
                                        ->title('Mode_perc_int'),

                    Input::make('typecredits.typ_caution_financiere')
                                        ->type('int')
                                        ->horizontal()
                                        ->title('Typ_caution_financiere'),*/

            ])

        ];
    }

    public function createOrUpdate(TypeCredit $typecredit, Request $request)
    {
        $typecredit->fill($request->get('typecredits'))->save();

        Alert::info('Vous avez créée un nouveau mode de financement avec succès !');

        return redirect()->route('platform.modefinancement.list');
    }

    /**
     * @param Post $post
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function remove(TypeCredit $typecredits)
    {
        $typecredits->delete();

        Alert::info('Vous avez supprimer un mode de financement avec succès.');

        return redirect()->route('platform.modefinancement.list');
    }
}
