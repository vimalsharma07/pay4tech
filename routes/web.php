<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\UploadController as AdminUploadController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\SitemapController;
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

Route::view('/', 'pages.home')->name('home');
Route::view('/services', 'pages.services')->name('services');
Route::view('/work', 'pages.work')->name('work');
Route::view('/about', 'pages.about')->name('about');
Route::view('/contact', 'pages.contact')->name('contact');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/valentine/{first}/{second}', function (string $first, string $second) {
    return view('projects.valentine', [
        'firstName' => ucfirst(strtolower($first)),
        'secondName' => ucfirst(strtolower($second)),
    ]);
})->where(['first' => '[a-zA-Z0-9_-]+', 'second' => '[a-zA-Z0-9_-]+'])->name('valentine');

Route::post('/contact', [EnquiryController::class, 'store'])->name('enquiry.store');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.perform');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/enquiries', [AdminEnquiryController::class, 'index'])->name('admin.enquiries.index');
        Route::get('/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
        Route::get('/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
        Route::post('/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
        Route::get('/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
        Route::post('/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');
        Route::post('/uploads/image', [AdminUploadController::class, 'image'])->name('admin.upload.image');

        Route::get('/settings', [AdminSettingController::class, 'edit'])->name('admin.settings.edit');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('admin.settings.update');
    });
