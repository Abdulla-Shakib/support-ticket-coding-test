<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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


// Route::middleware(['admin'])->group(function () {
//     Route::get('/admin/tickets', [AdminTicketController::class, 'index']); // Admin-specific routes
//     Route::post('/admin/tickets/respond/{ticket}', [AdminTicketController::class, 'respond']);
//     Route::post('/admin/tickets/close/{ticket}', [AdminTicketController::class, 'close']);
// });

// Route::middleware(['customer'])->group(function () {
Route::resource('customer-tickets', CustomerTicketController::class);
// });



require __DIR__ . '/auth.php';
