<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PcomptableController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\ImprimerController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\SimpleExcelController;
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
/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [AdminController::class,'home'] );
Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/lockscreen', [AdminController::class, 'lockscreen']);
Route::get('/signup', [AdminController::class, 'signup']);

Route::get('/periode', [PeriodeController::class, 'periodes']);
Route::get('/addperiode', [PeriodeController::class, 'addperiode']);
Route::post('/saveperiode', [PeriodeController::class, 'saveperiode']);
Route::get('/editperiode/{id}', [PeriodeController::class, 'editperiode']);
Route::post('/updateperiode', [PeriodeController::class, 'updateperiode']);
Route::get('/deleteperiode/{id}', [PeriodeController::class, 'deleteperiode']);
Route::get('/exportpdf', [PeriodeController::class, 'exportpdf']);

Route::get('/viewpdfperiode/{id}', [PdfController::class, 'view_pdf']);


Route::get('/listeclasse', [PcomptableController::class, 'listeclasse']);
Route::get('/listeclasse', [PcomptableController::class, 'pcomptables']);
Route::post('/saveclasse_pcomptable', [PcomptableController::class, 'saveclasse_pcomptable']);
Route::get('/editclasse/{id}', [PcomptableController::class, 'editclasse']);
Route::post('/updateclasse', [PcomptableController::class, 'updateclasse']);
Route::get('/deleteclasse/{id}', [PcomptableController::class, 'deleteclasse']);
Route::get('/exportclassepdf', [PcomptableController::class, 'exportclassepdf']);



Route::get('/listeviaclasse/{nom_compte}', [PcomptableController::class, 'listeviaclasse']);
Route::get('/lisetevia', [PcomptableController::class, 'listevia']);
Route::post('/listeviaclasse', [PcomptableController::class, 'saveviaclasse_pcomptables']);
Route::get('/edit_via_classe/{id}', [PComptableController::class, 'edit_via_classe']);
Route::post('/updateviaclasse_pcomptables', [PcomptableController::class, 'updateviaclasse_pcomptables']);
Route::get('/delete_via_classe/{id}', [PcomptableController::class, 'delete_via_classe']);
Route::get('/liste_by_classe/{nom_compte}', [PcomptableController::class, 'liste_by_classe']);
Route::get('/exportbyclassepdf/{nom_compte}', [PcomptableController::class, 'exportbyclassepdf']);
Route::post('/importpcomptable', [PcomptableController::class, 'importpcomptable']);
Route::post('/exportpcomptable', [PcomptableController::class, 'exportpcomptable']);

Route::get('/search', [PostController::class, 'pagesearch']);
Route::get("search",[PostController::class,'search']);

Route::get('/listevialibelle/{libelle}', [PcomptableController::class, 'listevialibelle']);
Route::get('/detail_compte_individuel', [PcomptableController::class, 'detail_compte_individuel']);

Route::get('/listeville', [VilleController::class, 'listeville']);
Route::post('/save_ville', [VilleController::class, 'save_ville']);
Route::get('/editville/{id}', [VilleController::class, 'editville']);
Route::post('/update_ville', [VilleController::class, 'update_ville']);
Route::get('/delete_ville/{id}', [VilleController::class, 'delete_ville']);
Route::get('/exportvillepdf', [VilleController::class, 'exportvillepdf']);
Route::post('/importville', [VilleController::class, 'importville']);
Route::post('/exportville', [VilleController::class, 'exportville']);

Route::get('/liste_compte_imprimer', [ImprimerController::class, 'liste_compte_imprimer']);


// Importer un fichier Excel
Route::get('/clients', [SimpleExcelController::class, 'client']);

