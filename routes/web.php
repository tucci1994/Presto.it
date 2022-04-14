<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RevisorController;
use App\Http\Requests\AnnouncementRequest;

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

Route::get('/', [PublicController::class , "welcome"])->name("welcome");
Route::get('/form', [PublicController::class , "form"])->name("form");

//rotte per gli annunci
Route::get('/announcement/create', [AnnouncementController::class , "create"])->name("createAnnouncement");
Route::post('/announcement/store', [AnnouncementController::class, "store"])->name("store");

// rotta per il dettaglio
Route::get("/announcement/detail/{announcement}", [PublicController::class, "detail"])->name("detailAnnouncement");

// rotta per filtro categorie
Route::get("/category/{name}/{id}/announcements", [PublicController::class, "filter"])->name("categoryFilter");

Route::get("/announcement/{product}/{cre}/announcements", [PublicController::class, "orderCresc"])->name("orderCresc");


// rotta per revisori
Route::get("/revisor/home", [RevisorController::class, "index"])->name("home");
Route::post("/revisor/announcement/{id}/accept", [RevisorController::class, "accept"])->name("revisor.accept");
Route::post("/revisor/announcement/{id}/reject", [RevisorController::class, "reject"])->name("revisor.reject");
// rotta per ricerce in welcome
Route::get('/search' , [PublicController::class , "search"])->name('search');

Route::post('/locale/{locale}', [PublicController::class, "locale"])->name("locale");

Route::post('/announcement/images/upload', [AnnouncementController::class, 'upload'])->name('upload');

Route::delete('/announcement/images/remove', [AnnouncementController::class, 'remove'])->name('remove');

Route::get('/announcement/images', [AnnouncementController::class, 'getImages'])->name('images');

Route::get('/announcement/all' , [AnnouncementController::class, 'showAll'])->name('showAll');

// Rotta per vista richiesta utente per diventare revisore

Route::get('/contact' , [PublicController::class , "contact"])->name("contact");
Route::post('/contact/submit' , [PublicController::class , "submit"])->name("contactSubmit");
