<?php

namespace App\Http\Controllers;
use App\Http\Controllers\RegistersController;
use App\Http\Controllers\LoginsController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\BookingController;
use App\Models\post;



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

Route::get('/', function () {
    return view('auth.login');
});

//pages home
Route::get('/home', function () {
    return view('pages.home');
});


//pages controller
Route::middleware(['auth'])->group(function(){
    Route::get('/home', [PagesController::class, 'home']);
    Route::get('/Tentang_Kami', [PagesController::class, 'tentang_kami']);
    Route::get('/Daftar_Kamar', [PagesController::class, 'kamar']);
    Route::get('/Gallery', [PagesController::class, 'gallery']);
    Route::get('/Hubungi_Kami', [PagesController::class, 'hubungi_kami']);
    Route::get('/invoice', [BookingController::class, 'invoice']);    
});



Route::resource('/deskripsi', deskripsiController::class);
// Route::get('/deskripsi', [PagesController::class, 'deskripsi']);

// Route::get('/deskripsi', function () {
//     return view('pages.deskripsi');
// });



//Login multi-user
// Route::middleware(['guest'])->group(function(){
    Route::get('/Logins', [LoginsController::class, 'index'])->name('login');
    Route::post('/Logins', [LoginsController::class, 'auth'])->name('Logins');
// });

//not logout
// route::get('/home',function(){
//     return redirect("/admin");
// });
// route::get('/home',[AdminController::class, 'sudahLogin']);

Route::middleware(['auth'])->group(function(){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/administrator', [AdminController::class, 'administrator'])->middleware('userAkses:admin');
    Route::get('/admin/customer', [AdminController::class, 'customer'])->middleware('userAkses:customer');
    Route::get('/logout', [LogoutController::class, 'logout']);
});



//Register
Route::get('/Registers', [RegistersController::class, 'index'])->name('Registers');
Route::post('/Registers', [RegistersController::class, 'store'])->name('Registers');


//Dashboard view
Route::get('/Dashboard', function () {
    return view('dashboard.index');
});

Route::resource('/dashboard/post', DashboardPostController::class);
Route::resource('/dashboard/booking', DashboardBookingController::class);

// booking
// Route::get('/booking', function () {
//     return view('booking.index',[
//         'post' => post::all()
//     ]);
// });


Route::resource('/booking', BookingController::class);
Route::resource('/booking/post', BookingController::class);

Route::get('/booking/daftar', [PagesController::class, 'daftar'])->name('daftar');

// Route::get('/dashboard/customerBooking/{{$booking->email}}', [PagesController::class, 'customerBooking'])->name('customerBooking');
// booking
// Route::resource('/booking', BookingController::class, 'index');