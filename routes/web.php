<?php

use App\Http\Controllers\StudentiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name("pocetna");
/*
Route::get('/studenti/unos', function () {
    return view('studenti.unos',[StudentiController::class,'pokaziFormuZaUnos']);
})->name("studenti.novi");
*/
Route::prefix('studenti')->name('studenti.')->controller(StudentiController::class)->group(function(){
    Route::get('/unos','pokaziFormuZaUnos')->name('unos');
    Route::post('/unos','create')->name('unos');
    Route::get('/popis','popisSvihStudenata')->name('popis');
    Route::get('/edit/{student}','dohvatiFormuZaAzuriranje')->name('azuriranje');
    Route::put('/{student}','update')->name('azuriraj');
    Route::delete('/{student}','brisiStudenta')->name('delete');
});