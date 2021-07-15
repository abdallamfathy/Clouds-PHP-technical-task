<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers;


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
Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plan/{plan}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('/subscription', [SubscriptionController::class, 'create'])->name('subscription.create');

   
});


################################# USERCONTROLLER ####################################
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/search', [UsersController::class, 'search'])->name('search');
    Route::get('/user/destroy/{id}', [UsersController::class, 'destroy'])->name('user/destroy');
    Route::get('/user/edit/{id}', [UsersController::class, 'edit'])->name('user/edit');
    Route::post('/user/update/{id}', [UsersController::class, 'update'])->name('user/update');
    Route::get('/user/activate/{id}', [UsersController::class, 'activate'])->name('user/activate');
    Route::get('/user/deactivate/{id}', [UsersController::class, 'deactivate'])->name('user/deactivate');

     //Routes for create Plan
     Route::get('create/plan', [SubscriptionController::class, 'createPlan'])->name('create.plan');
     Route::post('store/plan', [SubscriptionController::class, 'storePlan'])->name('store.plan');
    
    });
    




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
