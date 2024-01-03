<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RayonController;
use App\Http\Controllers\PerpusController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LaravoltController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\CategoryBookController;
use App\Http\Controllers\ForgetPasswordControler;
use App\Http\Controllers\Admin\Blog\CategoryController as admincategorycontroller;
use App\Http\Controllers\HBNController; // delete
use App\Http\Controllers\AgendaController; // delete
use App\Http\Controllers\GaleriController; // delete
use App\Http\Controllers\ContactController; // delete
use App\Http\Controllers\Blog\TagController; // delete
use App\Http\Controllers\Blog\PostController; // delete
use App\Http\Controllers\Blog\CategoryController; // delete
use App\Http\Controllers\Admin\Blog\TagController as admintagcontroller; // delete
use App\Http\Controllers\Admin\Blog\PostController as adminpostcontroller; // delete

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


Route::get('/emails', function () {
  return view('mails.reset');
});

// =====================================================
// Route Frondend  =====================================
// ----------------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/profile/{slug}', [ProfileController::class, 'profile'])->name('profileuser');
Route::get('/qrcode/varifikasi/kta/{id}/anjay/mabar/ckuahsksdfsihew/S3NAT-4NJ1NG-63lut-73ng/51-3nd1', [QrCodeController::class, 'index']);
Route::get('/perpus', [PerpusController::class, 'index'])->name('index');
Route::get('/perpus/details/{id}', [PerpusController::class, 'details'])->name('details');
Route::get('/kta/user/download/pdf/{id}/my-kta/', [PDFController::class, 'kaderPDF']);


// =====================================================
// Route Auth  =========================================
// -----------------------------------------------------
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::get('/validasi', [LoginController::class, 'validasi'])->name('validasi');
Route::post('/validasii', [LoginController::class, 'validasii'])->name('validasii');
Route::get('/register/{user}', [LoginController::class, 'register'])->name('register');
Route::put('/register/store/{id}', [LoginController::class, 'store'])->name('store');
Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



// =====================================================
// Forget Password  ====================================
// -----------------------------------------------------

// Menampilkan form lupa kata sandi
Route::get('/forgot-password', [ForgetPasswordControler::class, 'showForgotPasswordForm'])
  ->middleware('guest')
  ->name('password.request');

// Mengirim tautan reset kata sandi
Route::post('/forgot-password', [ForgetPasswordControler::class, 'sendResetLinkEmail'])
  ->middleware('guest')
  ->name('password.email');

// Menampilkan form reset kata sandi
Route::get('/reset-password/{token}', [ForgetPasswordControler::class, 'showResetPasswordForm'])
  ->middleware('guest')
  ->name('password.reset');

// Melakukan reset kata sandi
Route::post('/reset-password', [ForgetPasswordControler::class, 'resetPassword'])
  ->middleware('guest')
  ->name('password.update');






// =====================================================
// Route Auth Pengunjung Kader Admin, Superadmin =======
// -----------------------------------------------------
Route::middleware(['auth', 'role:1, 2, 3, 4'])->group(function () {
  Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');
  Route::get('/profile', [ProfileController::class, 'index'])->middleware(['auth']);
  Route::get('/account', [ProfileController::class, 'account'])->middleware(['auth']);
  Route::put('/account/update', [ProfileController::class, 'update'])->name('profile.update')->middleware(['auth']);
  Route::post('/account/newpassword', [ProfileController::class, 'newpassword'])->name('change-password')->middleware(['auth']);
});

// =====================================================
// Route Kader, Admin, Superadmin =======================
// -----------------------------------------------------
Route::middleware(['auth', 'role:1, 2, 3'])->group(function () {
  Route::get('/uploads', [ProfileController::class, 'uploads'])->middleware(['auth']);
  Route::post('/profile/galeri/store', [ProfileController::class, 'store'])->name('store');
  Route::post('/profile/post/storepost', [ProfileController::class, 'storepost'])->name('storepost');
  Route::post('/profile/perpus/storeperpus', [ProfileController::class, 'storeperpus'])->name('storeperpus');
});

require __DIR__ . '/auth.php';

// =====================================================
// Route For Address Package ===========================
// -----------------------------------------------------
Route::get('contoh-laravolt', [LaravoltController::class, 'index'])->name('laravolt.index');
Route::get('get-kota', [LaravoltController::class, 'get_kota'])->name('get.kota');
Route::get('get-kecamatan', [LaravoltController::class, 'get_kecamatan'])->name('get.kecamatan');
Route::get('get-kelurahan', [LaravoltController::class, 'get_kelurahan'])->name('get.kelurahan');

// =====================================================
// Route Admin dan Superadmin ==========================
// -----------------------------------------------------
Route::middleware(['auth', 'role:1,2'])->group(function () {
  Route::get('/admin', [StatistikController::class, 'index'])->name('dashboard');
  Route::get('/admin/perpus', [PerpusController::class, 'admin_index'])->name('admin_index');
  Route::get('admin/perpus/create', [PerpusController::class, 'create'])->name('create');
  Route::post('/admin/perpus/store', [PerpusController::class, 'store'])->name('store');
  Route::get('/admin/perpus/{id}/edit', [PerpusController::class, 'edit'])->name('perpus.edit');
  Route::put('/admin/perpus/{id}', [PerpusController::class, 'update'])->name('perpus.update');
  Route::delete('/admin/perpus/{id}', [PerpusController::class, 'destroy'])->name('perpus.destroy');


  Route::get('/admin/post/category', [admincategorycontroller::class, 'index'])->name('categories.index');
  Route::get('/admin/post/category/create', [admincategorycontroller::class, 'create'])->name('categories.create');
  Route::post('/admin/post/category/store', [admincategorycontroller::class, 'store'])->name('categories.store');
  Route::get('/admin/post/category/{id}/edit', [admincategorycontroller::class, 'edit'])->name('categories.edit');
  Route::put('/admin/post/category/{id}', [admincategorycontroller::class, 'update'])->name('categories.update');
  Route::delete('/admin/post/category/{id}', [admincategorycontroller::class, 'destroy'])->name('categories.destroy');

  Route::get('/admin/user', [UserController::class, 'index'])->name('user.index');
  Route::get('/admin/user/create', [UserController::class, 'create'])->name('create.user');
  Route::get('/admin/user/{id}/details', [ProfileController::class, 'details'])->name('details');

  Route::get('/admin/user/download-pdf/{id}', [PDFController::class, 'kaderPDF']);
  Route::get('/admin/user/rayon/pdf/{slug}', [PDFController::class, 'rayonPDF'])->name('rayonPDF');

  Route::post('/admin/user/store', [UserController::class, 'store'])->name('store.user');
  Route::get('/admin/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
  Route::put('/admin/user/{id}', [UserController::class, 'update'])->name('user.update');
  Route::delete('/admin/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
  Route::get('/admin/user/rayon/{slug}', [UserController::class, 'list'])->name('user.rayon.list');

  Route::get('/admin/administrator/', [UserController::class, 'administrator'])->name('administrator');
  Route::get('/admin/categorybooks/', [CategoryBookController::class, 'index'])->name('categorybooks');
  Route::get('/admin/categorybooks/create', [CategoryBookController::class, 'create'])->name('create');
  Route::post('/admin/categorybooks/store', [CategoryBookController::class, 'store'])->name('store');
  Route::get('/admin/categorybooks/{id}/show', [CategoryBookController::class, 'show'])->name('categorybooks.show');
  Route::get('/admin/categorybooks/{id}/edit', [CategoryBookController::class, 'edit'])->name('categorybooks.edit');
  Route::put('/admin/categorybooks/{id}', [CategoryBookController::class, 'update'])->name('categorybooks.update');
  Route::delete('/admin/categorybooks/{id}', [CategoryBookController::class, 'destroy'])->name('categorybooks.destroy');

});
// =====================================================
// Route Super Admin only ==============================
// -----------------------------------------------------
Route::middleware(['auth', 'role:1'])->group(function () {

  Route::get('/admin/kader', [KaderController::class, 'kader'])->name('kader');
  Route::get('/admin/kader/create', [KaderController::class, 'create'])->name('create');
  Route::post('/admin/kader/store', [KaderController::class, 'store'])->name('store');
  Route::get('/admin/kader/{id}/edit', [KaderController::class, 'edit'])->name('edit');
  Route::put('/admin/kader/{id}', [KaderController::class, 'update'])->name('update');
  Route::delete('/admin/kader/{id}', [KaderController::class, 'destroy'])->name('kader.destroy');
  Route::get('/admin/kader/{id}/view', [KaderController::class, 'view'])->name('view');

  Route::get('/admin/page', [HomeController::class, 'admin_page'])->name('admin_page');
  Route::get('/admin/page/{id}/edit', [HomeController::class, 'edit'])->name('edit');
  Route::put('/admin/page/{id}', [HomeController::class, 'update'])->name('update');

  Route::get('/admin/rayon/create/new', [RayonController::class, 'create'])->name('create');
  Route::post('/admin/rayon/store', [RayonController::class, 'store'])->name('store');
  Route::get('/admin/rayon/{id}/edit', [RayonController::class, 'edit'])->name('rayon.edit');
  Route::put('/admin/rayon/{id}', [RayonController::class, 'update'])->name('rayon.update');
  Route::delete('/admin/rayon/{id}', [RayonController::class, 'destroy'])->name('rayon.destroy');

  Route::get('/admin/quotes/', [QuotesController::class, 'index'])->name('index');
  Route::get('/admin/quotes/create', [QuotesController::class, 'create'])->name('create');
  Route::post('/admin/quotes/store', [QuotesController::class, 'store'])->name('store');
  Route::get('/admin/quotes/{id}/edit', [QuotesController::class, 'edit'])->name('quotes.edit');
  Route::put('/admin/quotes/{id}', [QuotesController::class, 'update'])->name('quotes.update');
  Route::delete('/admin/quotes/{id}', [QuotesController::class, 'destroy'])->name('quotes.destroy');

  Route::get('/admin/pengurus/', [PengurusController::class, 'index'])->name('index');
  Route::get('/admin/pengurus/create', [PengurusController::class, 'create'])->name('create');
  Route::post('/admin/pengurus/store', [PengurusController::class, 'store'])->name('store');
  Route::get('/admin/pengurus/{id}/edit', [PengurusController::class, 'edit'])->name('pengurus.edit');
  Route::put('/admin/pengurus/{id}', [PengurusController::class, 'update'])->name('pengurus.update');
  Route::delete('/admin/pengurus/{id}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');
});
