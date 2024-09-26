<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminTicketController;
use App\Http\Controllers\Customer\CustomerTicketController;

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

Route::get('/', function () {
    // return view('login');
    return view('backend.layouts.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminTicketController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('admin-tickets', AdminTicketController::class);
});

Route::middleware(['customer'])->group(function () {
    Route::get('/customer/dashboard', [CustomerTicketController::class, 'dashboard'])->name('customer.dashboard');
    Route::resource('customer-tickets', CustomerTicketController::class);
});



require __DIR__ . '/auth.php';
