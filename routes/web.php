<?php


use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\OAuthRedirectController;
use App\Http\Controllers\SettingsController;
use App\Models\User;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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
    return view('welcome');
})->name('welcome');
Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'create'])->name('login'); // Route pour afficher le formulaire de connexion
    Route::post('/', [LoginController::class, 'store']); // Route pour gérer le formulaire de connexion
});

Route::group(['prefix'=> 'register'],function(){
    Route::get('/', [RegisterController::class, 'create'])->name('register'); // Route pour afficher le formulaire de connexion
    Route::post('/', [RegisterController::class,'store']); // Route pour gérer le formulaire de connexion
});

Route::get('/logout', [Logoutcontroller::class, 'destroy'])
    ->middleware('auth')->name('logout');


Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');



Route::prefix('/auth')->group(function () {
    Route::get('/redirect/{provider}', [OAuthRedirectController::class, 'redirectToProvider']);
    Route::get('/callback/{provider}', [OAuthRedirectController::class, 'handleProviderCallback'])->name('callback');

});

Route::prefix('/article')->group(function (){
    Route::get('/', [ArticleController::class, 'index'])->name('article.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/store', [ArticleController::class,'store'])->name('article.store');
    Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('/update/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::delete('/destroy/{id}', [ArticleController::class, 'destroy'])->name('article.destroy');
});

Route::prefix('/media')->group(function (){
    Route::get('/', [MediaController::class, 'index'])->name('media.index');
    Route::get('/create', [MediaController::class, 'create'])->name('media.create');
    Route::post('/store', [MediaController::class,'store'])->name('media.store');
    Route::get('/edit/{id}', [MediaController::class, 'edit'])->name('media.edit');
    Route::put('/update/{id}', [MediaController::class, 'update'])->name('media.update');
    Route::delete('/destroy/{id}', [MediaController::class, 'destroy'])->name('media.destroy');
});

Route::prefix('/events')->group(function (){
    Route::get('/', [EventController::class, 'index'])->name('events.index');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/store', [EventController::class,'store'])->name('events.store');
    Route::get('/edit/{id}', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/update/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/destroy/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});

Route::get('/setting',[SettingsController::class, 'store'])->name('setting');

Route::get('/test', function () {
    return view('test');
});
