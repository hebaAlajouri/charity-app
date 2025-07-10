<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SponsorshipController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrphanController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\AdminSponsorshipController;
use App\Http\Controllers\Admin\AdminReportController;
use App\Http\Controllers\Admin\AdminJobController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\OrphanApplicationController;
use App\Http\Controllers\ViewOrphanController;
use App\Http\Controllers\Admin\AdminOrphanApplicationController;





Route::get('/', [HomeController::class, 'showLandingPage'])

    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/projects/{project}/donate', [DonationController::class, 'confirmDonation'])->name('donations.confirm');
Route::post('/projects/{project}/donate', [DonationController::class, 'storeDonorInfo'])->name('donations.storeDonorInfo');

Route::get('/projects/{project}/donate/{donation}/payment', [DonationController::class, 'payment'])->name('donations.payment');
Route::post('/projects/{project}/donate/{donation}/payment', [DonationController::class, 'processPayment'])->name('donations.processPayment');


Route::get('/donations/{donation}/thank-you', [DonationController::class, 'thankYou'])->name('donations.thankYou');


Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'storeMessage'])->name('contact.store');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');


 
Route::get('/sponsorship', [SponsorshipController::class, 'index'])->name('sponsorship.index');
Route::post('/sponsorship', [SponsorshipController::class, 'store'])->name('sponsorship.store');
// Public news page
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


// Admin routes (grouped)

Route::get('careers', [JobController::class, 'index'])->name('careers.index');
Route::get('careers/{job}', [JobController::class, 'show'])->name('careers.show');
Route::get('/careers/{job}/apply', [JobController::class, 'apply'])->name('careers.apply');

Route::prefix('admin')->name('admin.')->middleware([
    'auth',
    \App\Http\Middleware\CheckAdmin::class,
])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('orphans', OrphanController::class);
     Route::resource('projects', AdminProjectController::class);
     Route::resource('messages',AdminMessageController::class)->only(['index', 'show', 'destroy']);
      Route::resource('jobs',AdminJobController::class);
      Route::resource('sponsorships', AdminSponsorshipController::class);
       Route::resource('news', AdminNewsController::class);
 Route::resource('orphan_applications', AdminOrphanApplicationController::class);
});


Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/{id}', [ReportController::class, 'show'])->name('reports.show');









Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {
    Route::resource('reports',AdminReportController::class);
});
// routes/web.php


// routes/web.php



Route::middleware('auth')->group(function () {
    // If you want to restrict donation to logged in users only
});

Route::get('/orphan-application', [OrphanApplicationController::class, 'create'])->name('orphan.create');
Route::post('/orphan-application', [OrphanApplicationController::class, 'store'])->name('orphan.store');
Route::get('/orphans/{id}', [ViewOrphanController::class, 'show'])->name('orphans.show');
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('orphan_applications', AdminOrphanApplicationController::class);
});
Route::middleware([
    'auth',
    \App\Http\Middleware\CheckAdmin::class,
])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
});
require __DIR__.'/auth.php';
