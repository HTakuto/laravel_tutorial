<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ContactFormController;

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

Route::get('tests/test', [TestController::class, 'index']);

// まとめて記述する方法
// Route::resources('contacts', ContactFromController::class);

// 1行ずつ記述する方法
Route::get('contacts', [ContactFormController::class, 'index'])->name('contacts.index');

// グループ化して記述する方法
Route::prefix('contacts')
->middleware(['auth'])// 認証->ログインしていないと見れない
->name('contacts.')// ルート名
->controller(ContactFormController::class)//コントローラ指定
->group(function(){
    Route::get('/', 'index')->name('index');// 名前付きルート
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
