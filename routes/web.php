<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\Back\{
    AdminController, MenuController, FonctionController, EntretienController,
    LocationController, CaisseController
};
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])->group(function () {
           //Manage Fonction menu
            Route::get('/societe-list', [FonctionController::class, 'societe'])->name('societe.index');
            Route::get('/chauffeur-list', [FonctionController::class, 'chauffeur'])->name('chauffeur.index');
            Route::get('/gerant-list', [FonctionController::class, 'gerant'])->name('gerant.index');
            Route::get('/fournisseur-list', [FonctionController::class, 'fournisseur'])->name('fournisseur.index');
            Route::get('/client-list-all', [FonctionController::class, 'clientAdmin'])->name('client.admin');

            //menu user
            Route::get('/add-user', [AdminController::class, 'listuser'])->name('user.list');

    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Manage Params menu
    Route::get('/board-locative', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/pays-list', [MenuController::class, 'pays'])->name('pays.index');
    Route::get('/ville-list', [MenuController::class, 'ville'])->name('ville.index');
    Route::get('/quariter-list', [MenuController::class, 'quartier'])->name('quartier.index');
    Route::get('/categorie-permis-list', [MenuController::class, 'cat_permis'])->name('cat_permis.index');
    Route::get('/manager-auto', [MenuController::class, 'gestion'])->name('gestion.index');
    Route::get('/cotable', [MenuController::class, 'cotable'])->name('cotable.index');

    Route::get('/client-list', [FonctionController::class, 'client'])->name('client.index');

    //START Route PDF
    Route::get('/generate-pdf-client', [PdfController::class, 'generatePDFclient'])->name('client.pdf');
    Route::get('/generate-pdf-type-vehicule', [PdfController::class, 'generatePDFtv'])->name('tv.pdf');
    Route::get('/generate-pdf-type-entretien', [PdfController::class, 'generatePDFte'])->name('te.pdf');
    Route::get('/generate-pdf-boite-vehicule', [PdfController::class, 'generatePDFbv'])->name('bv.pdf');
    Route::get('/generate-pdf-vehicule', [PdfController::class, 'generatePDFvehicule'])->name('vehicule.pdf');
    Route::get('/generate-pdf-doc-vehicule', [PdfController::class, 'generatePDFdv'])->name('dv.pdf');
    // END ROUTE PDF


    //Manage vehicule menu
    Route::get('/type-vehicule', [MenuController::class, 'tv'])->name('tv.index');
    Route::get('/type-energie', [MenuController::class, 'te'])->name('te.index');
    Route::get('/boite-vitesse', [MenuController::class, 'bv'])->name('bv.index');
    Route::get('/vehicule', [MenuController::class, 'vehicule'])->name('vehicule.index');
    Route::get('/doc-vehicule', [MenuController::class, 'docVehicule'])->name('vehicule.doc');

    //Manage Pièce menu
    Route::get('/piece-menu', [EntretienController::class, 'transitpiece'])->name('trp.index');
    Route::get('/type-piece-list', [EntretienController::class, 'typepiece'])->name('tp.index');
    Route::get('/piece-list', [EntretienController::class, 'piece'])->name('piece.index');

    //Manage Pièce Fourniture
    Route::get('/fourniture-menu', [EntretienController::class, 'transitfourniture'])->name('trf.index');
    Route::get('/type-fourniture-list', [EntretienController::class, 'typefourniture'])->name('tf.index');
    Route::get('/fourniture-list', [EntretienController::class, 'fourniture'])->name('fourniture.index');

    //Manage Pièce service
    Route::get('/service-menu', [EntretienController::class, 'transitservice'])->name('trs.index');
    Route::get('/type-service-list', [EntretienController::class, 'typeservice'])->name('ts.index');
    Route::get('/service-list', [EntretienController::class, 'service'])->name('service.index');

    //Manage Pièce Entretien
    Route::get('/entretien-menu', [EntretienController::class, 'transitentretien'])->name('tren.index');
    Route::get('/type-entretien-list', [EntretienController::class, 'typeentretien'])->name('ten.index');
    Route::get('/entretien-list', [EntretienController::class, 'entretien'])->name('entretien.index');

    //Manage Location
    Route::get('/tarification-list', [LocationController::class, 'tarification'])->name('tarification.index');
    Route::get('/validation-list', [LocationController::class, 'validation'])->name('validation.index');
    Route::get('/reservation-list', [LocationController::class, 'reservation'])->name('reservation.index');
    Route::get('/location-list', [LocationController::class, 'location'])->name('location.index');

    //Manage Caisse
    Route::get('/caisse-list', [CaisseController::class, 'caisse'])->name('caisse.index');
    Route::get('/type-mouvement-list', [CaisseController::class, 'tm'])->name('tm.index');
});
