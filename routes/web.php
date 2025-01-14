<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\SignInController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\QRCodesController;

Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/generator', [QRCodeController::class, 'index'])->name('generator');
Route::post('/generate-qr', [QRCodeController::class, 'store'])->name('generate.qr');
Route::get('/decode', [QRCodeController::class, 'decode'])->name('decode');
Route::post('/decode-qr', [QRCodeController::class, 'decodeQr'])->name('decode.qr');
Route::get('/qr/{unique_id}', [QRCodeController::class, 'dynamicQr'])->name('qr.dynamic');
Route::get('/qr/edit/{unique_id}', [QRCodeController::class, 'edit'])->name('qr.edit');
Route::post('/qr/update/{unique_id}', [QRCodeController::class, 'update'])->name('qr.update');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/send-contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('blog', [BlogController::class, 'index'])->name('blog');
Route::get('blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/qr-history', [QRCodeController::class, 'history'])->name('qr.history');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('account/update', [ProfileController::class, 'update'])->name('user.account.update');
    Route::post('/user/account/change-password', [ProfileController::class, 'changePassword'])->name('user.account.change-password');
    Route::delete('qrcodes/{id}', [QRCodeController::class, 'destroy'])->name('qrcodes.destroy');
});

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('admin/blogs', [BlogsController::class, 'index'])->name('admin.blogs.index');
    Route::get('admin/blogs/create', [BlogsController::class, 'create'])->name('admin.blogs.create');
    Route::post('admin/blogs/store', [BlogsController::class, 'store'])->name('admin.blogs.store');
    Route::get('admin/blogs/edit/{slug}', [BlogsController::class, 'edit'])->name('admin.blogs.edit');
    Route::put('admin/blogs/{slug}', [BlogsController::class, 'update'])->name('admin.blogs.update');
    Route::delete('admin/blogs/{id}', [BlogsController::class, 'destroy'])->name('admin.blogs.destroy');

    Route::get('admin/contacts', [ContactsController::class, 'index'])->name('admin.contacts.index');
    Route::get('admin/contacts/view/{id}', [ContactsController::class, 'view'])->name('admin.contacts.view');
    Route::post('/contacts/{id}/toggle-status', [ContactsController::class, 'toggleStatus'])->name('contacts.toggleStatus');

    Route::get('admin/qrcodes', [QRCodesController::class, 'index'])->name('admin.qrcodes.index');
    Route::delete('admin/qrcodes/{id}', [QRCodesController::class, 'destroy'])->name('admin.qrcodes.destroy');


    Route::get('admin/manage-users', [ManageUsersController::class, 'index'])->name('admin.manageUsers.index');
    Route::patch('/users/{id}/toggle-status', [ManageUsersController::class, 'toggleStatus'])->name('users.toggleStatus');
    // Route::post('admin/logout', [SigninController::class, 'logout'])->name('admin.logout');

});
//Route::get('/admin/signin', [SignInController::class, 'create'])->name('admin.signin');
//Route::post('/admin/signin', [SignInController::class, 'store'])->name('admin.signin.store');
