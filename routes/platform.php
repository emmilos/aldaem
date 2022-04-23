<?php

declare(strict_types=1);

use App\Orchid\Layouts\TypeCreditListLayout;
use App\Orchid\Screens\Examples\ExampleCardsScreen;
use App\Orchid\Screens\Examples\ExampleChartsScreen;
use App\Orchid\Screens\Examples\ExampleFieldsAdvancedScreen;
use App\Orchid\Screens\Examples\ExampleFieldsScreen;
use App\Orchid\Screens\Examples\ExampleLayoutsScreen;
use App\Orchid\Screens\Examples\ExampleScreen;
use App\Orchid\Screens\Examples\ExampleTextEditorsScreen;
use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;
use App\Orchid\Screens\ClientEditScreen;
use App\Orchid\Screens\ClientEditPMScreen;
use App\Orchid\Screens\ClientListScreen;
use App\Orchid\Screens\CreditEditScreen;
use App\Orchid\Screens\PaysEditScreen;
use App\Orchid\Screens\PaysListScreen;
use App\Orchid\Screens\CreditListScreen;
use App\Orchid\Screens\DepotEpressScreen;
use App\Orchid\Screens\GestionClientele;
use App\Orchid\Screens\RetraitEditScreen;
use App\Orchid\Screens\OuvertureCompteScreen;
use App\Orchid\Screens\ClientCardScreen;
use App\Orchid\Screens\CreditCardScreen;
use App\Orchid\Screens\TypeCreditEditScreen;
use App\Orchid\Screens\TypeCreditListScreen;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Profile'), route('platform.profile'));
    });

// Platform > System > Users
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(function (Trail $trail, $user) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('User'), route('platform.systems.users.edit', $user));
    });

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.users')
            ->push(__('Create'), route('platform.systems.users.create'));
    });

// Platform > System > Users > User
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Users'), route('platform.systems.users'));
    });

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(function (Trail $trail, $role) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Role'), route('platform.systems.roles.edit', $role));
    });

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.systems.roles')
            ->push(__('Create'), route('platform.systems.roles.create'));
    });

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push(__('Roles'), route('platform.systems.roles'));
    });

// Example...
Route::screen('example', ExampleScreen::class)
    ->name('platform.example')
    ->breadcrumbs(function (Trail $trail) {
        return $trail
            ->parent('platform.index')
            ->push('Example screen');
    });

Route::screen('example-fields', ExampleFieldsScreen::class)->name('platform.example.fields');
Route::screen('example-layouts', ExampleLayoutsScreen::class)->name('platform.example.layouts');
Route::screen('example-charts', ExampleChartsScreen::class)->name('platform.example.charts');
Route::screen('example-editors', ExampleTextEditorsScreen::class)->name('platform.example.editors');
Route::screen('example-cards', ExampleCardsScreen::class)->name('platform.example.cards');
Route::screen('example-advanced', ExampleFieldsAdvancedScreen::class)->name('platform.example.advanced');

//Route::screen('idea', Idea::class, 'platform.screens.idea');
Route::screen('client/{client?}', ClientEditScreen::class)
    ->name('platform.client.edit');
Route::screen('clientPM/{clientPM?}', ClientEditPMScreen::class)
    ->name('platform.clientPM.edit');

Route::screen('clients', ClientListScreen::class)
    ->name('platform.client.list');

Route::screen('credit/{credit?}', CreditEditScreen::class)
    ->name('platform.credit.edit');

Route::screen('credits', CreditListScreen::class)
    ->name('platform.credit.list');

Route::screen('pays/{pays?}', PaysEditScreen::class)
    ->name('platform.pays.edit');
Route::screen('listpays', PaysListScreen::class)
    ->name('platform.pays.list');

Route::screen('clientele', GestionClientele::class)
    ->name('platform.gestion.clientele');

Route::screen('depotexpress', DepotEpressScreen::class)
    ->name('platform.depot.express');

Route::screen('retrait', RetraitEditScreen::class)
    ->name('platform.retrait.edit');

Route::screen('ouverture', OuvertureCompteScreen::class)
    ->name('platform.ouverture.compte');

Route::screen('clientshow/{client?}', ClientCardScreen::class)
    ->name('platform.client.show');
Route::screen('creditshow/{credit?}', CreditCardScreen::class)
    ->name('platform.credit.show');
Route::screen('modefinancements', TypeCreditListScreen::class)
    ->name('platform.modefinancement.list');
Route::screen('modefinancement/{typecredit?}', TypeCreditEditScreen::class)
    ->name('platform.modefinancement.edit');

