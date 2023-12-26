<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\FrontEnd\AddressCardController;
use App\Http\Controllers\FrontEnd\BlgoCategoryController;
use App\Http\Controllers\FrontEnd\CompanyIntroController;
use App\Http\Controllers\FrontEnd\HeaderController;
use App\Http\Controllers\FrontEnd\InfoCounterController;
use App\Http\Controllers\FrontEnd\SisterConcernController;
use App\Http\Controllers\FrontEnd\SliderController;
use App\Http\Controllers\FrontEnd\WelcomeMessageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

Route::get('/', function () {
    return view('frontend.index');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get('/header', [HeaderController::class, 'header'])->name('header.settings');
    Route::post('/header-settings', [HeaderController::class, 'EditHeader'])->name('header.store');
    
    Route::get('/contact-details', [AddressCardController::class, 'ContactDetails'])->name('contact.details');
    Route::post('/contact-details', [AddressCardController::class, 'ContactSave'])->name('contact.save');
    
    Route::get('/company-intro', [CompanyIntroController::class, 'CompanyIntro'])->name('company.intro');
    Route::post('/company-intro', [CompanyIntroController::class, 'IntroSave'])->name('intro.save');
    
    Route::get('/sliders', [SliderController::class, 'allSliders'])->name('sliders');
    Route::get('/slider/{id}', [SliderController::class, 'editSlider'])->name('editSlider');
    Route::post('/slider', [SliderController::class, 'sliderSave'])->name('slider.save');
    
    Route::get('/welcome', [WelcomeMessageController::class, 'editWelcome'])->name('editWelcome');
    Route::post('/welcome', [WelcomeMessageController::class, 'welcomeSave'])->name('welcomeSave');
    
    Route::get('/sister-concern-section-header', [SisterConcernController::class, 'ConcernHeader'])->name('concern.sec.header');
    Route::post('/sister-concern-section-header', [SisterConcernController::class, 'ConcernHeaderSave'])->name('save.sec.header');
    Route::get('/sister-concerns', [SisterConcernController::class, 'allConcerns'])->name('all.concerns');
    Route::get('/concern-create', [SisterConcernController::class, 'addConcern'])->name('add.concern');
    Route::post('/concern-create', [SisterConcernController::class, 'saveConcern'])->name('save.concern');
    Route::get('/concern-edit/{id}', [SisterConcernController::class, 'editConcern'])->name('edit.concern');
    Route::post('/concern-edit', [SisterConcernController::class, 'updateConcern'])->name('update.concern');
    Route::get('/concern-trash/{id}', [SisterConcernController::class, 'trashConcern'])->name('trash.concern');
    Route::get('/concerns-trashed', [SisterConcernController::class, 'trashedConcerns'])->name('trashed.concern');
    Route::get('/concern-restore/{id}', [SisterConcernController::class, 'restoreConcern'])->name('restore.concern');
        
    Route::get('/sister-concerns/{id}', [SisterConcernController::class, 'status'])->name('status');

    Route::get('/info-counters', [InfoCounterController::class, 'infoCounters'])->name('infoCounters');
    Route::get('/info-counters/{id}', [InfoCounterController::class, 'infoCounterEdit'])->name('infoCounterEdit');

    Route::get('/blogs', [BlgoCategoryController::class, 'index'])->name('categories.index');
    Route::get('/blogs/{category}', [BlgoCategoryController::class, 'show'])->name('categories.show');
    Route::post('/blogs', [BlgoCategoryController::class, 'store'])->name('categories.store');
    Route::put('/blogs/{category}', [BlgoCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/blogs/{category}', [BlgoCategoryController::class, 'destroy'])->name('categories.destroy');
    

});


