<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('index');

Auth::routes();
Route::get('/noAccess', [App\Http\Controllers\HomeController::class, 'noAccess'])->name('noAccess');

//contacts
Route::get('/contacts', [App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/edit-contact/{contact}', [App\Http\Controllers\ContactController::class, 'edit'])->name('contact.edit');
Route::get('/create-contact', [App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('/add-contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');
Route::post('/update-contact/{contact}', [App\Http\Controllers\ContactController::class, 'update'])->name('contact.update');
Route::post('/delete-contact/{contact}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contact.delete');

//shared-contacts
Route::get('/share-contact', [App\Http\Controllers\SharedContactController::class, 'create'])->name('sharedContact.create');
Route::post('/share-contact-add', [App\Http\Controllers\SharedContactController::class, 'store'])->name('sharedContact.store');
Route::get('/shared-with-me', [App\Http\Controllers\SharedContactController::class, 'sharedWithMe'])->name('sharedContact.SharedWithMe');
Route::post('/share-contact-delete/{contact}', [App\Http\Controllers\SharedContactController::class, 'destroy'])->name('sharedContact.delete');
Route::get('/i-am-sharing', [App\Http\Controllers\SharedContactController::class, 'iAmSharing'])->name('sharedContact.iAmSharing');

//public-contact
Route::prefix('my-public-contacts')->group(function () {
    Route::get('/', [App\Http\Controllers\PublicContactController::class, 'index'])->name('publicContact.index');
    Route::get('/add', [App\Http\Controllers\PublicContactController::class, 'create'])->name('publicContact.add');
    Route::post('/store', [App\Http\Controllers\PublicContactController::class, 'store'])->name('publicContact.store');
    Route::post('/delete/{contact}', [App\Http\Controllers\PublicContactController::class, 'destroy'])->name('publicContact.delete');
});

//admin
Route::prefix('admin')->group(function () {
    Route::get('/public-contacts/approve', [App\Http\Controllers\AdminController::class, 'approve'])->name('admin.approve');
    Route::get('/public-contacts/approved', [App\Http\Controllers\AdminController::class, 'approved'])->name('admin.approved');
    Route::get('/public-contacts/change-status/{contact}', [App\Http\Controllers\AdminController::class, 'changeStatus'])->name('admin.public-contact.change-status');


});

