<?php

declare(strict_types=1);

use Dompdf\Dompdf;
use Barryvdh\DomPDF\PDF;
use App\Models\ProduitsEpargne;
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
use App\Orchid\Screens\ObjetcrediEditScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;
use App\Orchid\Screens\ClientEditScreen;
use App\Orchid\Screens\ClientEditPMScreen;
use App\Orchid\Screens\ClientListScreen;
use App\Orchid\Screens\CreditEditScreen;
use App\Orchid\Screens\CreditApprobationScreen;
use App\Orchid\Screens\PaysEditScreen;
use App\Orchid\Screens\PaysListScreen;
use App\Orchid\Screens\CreditListScreen;
use App\Orchid\Screens\DepotEpressScreen;
use App\Orchid\Screens\GestionClientele;
use App\Orchid\Screens\RetraitEditScreen;
use App\Orchid\Screens\OuvertureCompteScreen;
use App\Orchid\Screens\ClientCardScreen;
use App\Orchid\Screens\CreditCardScreen;
use App\Orchid\Screens\ObjetcrediListScreen;
use App\Orchid\Screens\ProduitEpargneEditScreen;
use App\Orchid\Screens\ProduitEpargneListScreen;
use App\Orchid\Screens\RemboursementEditScreen;
use App\Orchid\Screens\SectActiviteListScreen;
use App\Orchid\Screens\SectActiviteScreen;
use App\Orchid\Screens\TypeCreditEditScreen;
use App\Orchid\Screens\TypeCreditListScreen;
use App\Orchid\Screens\TypemargeEditScreen;
use App\Orchid\Screens\TypemargeListScreen;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf as PdfDompdf;

//use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;

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
Route::screen('creditapprobation/{credit?}', CreditApprobationScreen::class)
    ->name('platform.credit.approbation');
Route::screen('credits', CreditListScreen::class)
    ->name('platform.credit.list');

Route::screen('pays/{pays?}', PaysEditScreen::class)
    ->name('platform.pays.edit');
Route::screen('listpays', PaysListScreen::class)
    ->name('platform.pays.list');

Route::screen('typemarge/{typemarge?}', TypemargeEditScreen::class)
    ->name('platform.typemarge.edit');
Route::screen('typemarges', TypemargeListScreen::class)
    ->name('platform.typemarge.list');

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

Route::screen('objcredit/{objcredit?}', ObjetcrediEditScreen::class)
    ->name('platform.objcredit.edit');

Route::screen('remboursement/{credit?}', RemboursementEditScreen::class)
    ->name('platform.remboursement.edit');

Route::screen('sectactivite/{sectactivite?}', SectActiviteScreen::class)
    ->name('platform.sectactivite.edit');
Route::screen('sectactivites', SectActiviteListScreen::class)
    ->name('platform.sectactivite.list');

Route::screen('prodepargne/{produitepargne?}',ProduitEpargneEditScreen::class)
    ->name('platform.produitepargne.edit');
Route::screen('prodepargnes', ProduitEpargneListScreen::class)
    ->name('platform.produitepargne.list');

Route::screen('objcredits', ObjetcrediListScreen::class)
    ->name('platform.objcredit.list');

Route::get('PDF/pays', function(){


    $dompdf=new Dompdf();
    $dompdf->loadhtml(view('PDF.pays'));
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('PDF.pays', ['Attachement'=>false]);
})->name('PDF/pays');



Route::get('PDF/localisation', function(){


    $dompdf=new Dompdf();
    $dompdf->loadhtml(view('PDF.localisation'));
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('PDF.localisation', ['Attachement'=>false]);
})->name('PDF/localisation');

Route::get('PDF/sectacti', function(){


    $dompdf=new Dompdf();
    $dompdf->loadhtml(view('PDF.sectacti'));
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('PDF.sectacti', ['Attachement'=>false]);
})->name('PDF/sectacti');

Route::get('PDF/typemarge', function(){


    $dompdf=new Dompdf();
    $dompdf->loadhtml(view('PDF.typemarge'));
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('PDF.typemarge', ['Attachement'=>false]);
})->name('PDF/typemarge');

Route::get('PDF/objetcredit', function(){


    $dompdf=new Dompdf();
    $dompdf->loadhtml(view('PDF.objetcredit'));
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('PDF.objetcredit', ['Attachement'=>false]);
})->name('PDF/objetcredit');

Route::get('PDF/typecredit', function(){


    $dompdf=new Dompdf();
    $dompdf->loadhtml(view('PDF.typecredit'));
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('PDF.typecredit', ['Attachement'=>false]);
})->name('PDF/typecredit');


//Route::post('PDF/pays','PaysOrchidController@pdf')->name('pdf');
//Route::get('PDF/pays','PaysOrchidController@pdf')->name('pdf1');
