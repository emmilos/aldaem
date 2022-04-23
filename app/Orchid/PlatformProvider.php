<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;
use Orchid\Support\Color;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * @param Dashboard $dashboard
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // ...
    }

    /**
     * @return Menu[]
     */
    public function registerMainMenu(): array
    {
        return [
            Menu::make('Menu Clientèle')
                ->icon('arrow-down')
                ->title('Menu principal')
                ->list([
                    Menu::make('Gestion Client')->icon('bag'),
                    Menu::make('Menu Epargne')->icon('heart'),
                    Menu::make('Ouverture d\'un compte')->icon('list')->route('platform.ouverture.compte'),
                    Menu::make('Retrait express')->icon('money')->route('platform.retrait.edit'),
                    Menu::make('Depot express')->icon('money')->route('platform.depot.express'),
                ]),
            Menu::make('Menu Crédit')
                ->icon('bag')
                ->list([
                     Menu::make('Mise en place dossier de crédit')
                     ->icon('money')
                     ->route('platform.credit.edit'),
                     Menu::make('Approbation dossier de crédit')
                     ->icon('heart'),
                     Menu::make('Annulation dossier de crédit')
                     ->icon('Cancel'),

                ]),

            Menu::make('Création client')
                ->icon('user')
                ->list([
                     Menu::make('Personne physique')
                     ->icon('user')
                     ->route('platform.client.edit'),
                     Menu::make('Groupe Solidaire / Groupement')
                     ->icon('list'),
                     Menu::make('Personne Morale')
                     ->icon('home'),

   ]),

            Menu::make('Guichet')
                ->icon('grid')
                ->route('platform.example.cards')
                ->divider(),


            Menu::make(__('Users'))
                ->icon('user')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access rights')),

            Menu::make(__('Roles'))
                ->icon('lock')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles')
                ->divider(),

            Menu::make(__('Paramètres'))
                ->icon('settings')
                ->list([
                     Menu::make('Pays')
                     ->icon('globe')
                     ->route('platform.pays.list'),
                     Menu::make('Secteurs d\'activités')
                     ->icon('list'),
                     Menu::make('Localisations')
                     ->icon('home'),
                     Menu::make('Objets de crédits')
                     ->icon('list'),
                     Menu::make('Types de marges')
                     ->icon('money'),
                     Menu::make('Mode de Financements')
                     ->icon('money'),
                ]),
        ];
    }

    /**
     * @return Menu[]
     */
    public function registerProfileMenu(): array
    {
        return [
            Menu::make('Profile')
                ->route('platform.profile')
                ->icon('user'),
        ];
    }

    /**
     * @return ItemPermission[]
     */
    public function registerPermissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
