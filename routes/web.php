<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\OpportunitiesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TasksController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\lang;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/language/{lang}',function(String $lang){
    if(in_array($lang,['ar','en'])){
        App::setLocale($lang);
        Session::put('locale',$lang);
    }
    return back();
})->name('lang');
Route::middleware('guest')->group(function(){
    Route::controller(AuthController::class)->group(function(){
        Route::get('login','sinIn')->name('login');
        Route::post('login','login');
    });
});

Route::middleware(['auth',lang::class])->group(function(){
    Route::get('/', [DashboardController::class,'index']);
    Route::post('/logout',[AuthController::class,'logout']);

    Route::controller(AuthController::class)->middleware(AdminMiddleware::class)->group(function(){
        Route::get('/users','index');
        Route::get('/users/add','sinUp');
        Route::post('/users','register');
        Route::get('/users/print','print');
        Route::get('/users/{id}','edit');
        Route::post('/users/{id}','update');
        Route::delete('/users/{id}','destroy');
    });
    Route::controller(CustomersController::class)->group(function(){
        Route::get('customers','index');
        Route::post('customers','store');
        Route::get('customers/add','create');
        Route::get('customers/print','print');
        Route::get('customers/{id}','edit');
        Route::post('customers/{id}','update');
        Route::delete('customers/{id}','destroy');
    });
    Route::controller(ContactsController::class)->group(function(){
        Route::get('contacts','index');
        Route::post('contacts','store');
        Route::get('contacts/add','create');
        Route::get('contacts/print','print');
        Route::get('contacts/{id}','edit');
        Route::post('contacts/{id}','update');
        Route::delete('contacts/{id}','destroy');
    });
    Route::controller(LeadsController::class)->group(function(){
        Route::get('leads','index');
        Route::post('leads','store');
        Route::get('leads/add','create');
        Route::get('leads/print','print');
        Route::get('leads/{id}','edit');
        Route::post('leads/{id}','update');
        Route::delete('leads/{id}','destroy');
    });
    Route::controller(ProductsController::class)->group(function(){
        Route::get('products','index');
        Route::post('products','store');
        Route::get('products/add','create');
        Route::get('products/print','print');
        Route::get('products/{id}','edit');
        Route::post('products/{id}','update');
        Route::delete('products/{id}','destroy');
    });
    Route::controller(OpportunitiesController::class)->group(function(){
        Route::get('opportunities','index');
        Route::post('opportunities','store');
        Route::get('opportunities/add','create');
        Route::get('opportunities/print','print');
        Route::get('opportunities/{id}','edit');
        Route::post('opportunities/{id}','update');
        Route::delete('opportunities/{id}','destroy');
    });
    Route::controller(SalesController::class)->group(function(){
        Route::get('sales','index');
        Route::get('sales/print','print');

    });
    Route::controller(TasksController::class)->group(function(){
        Route::get('tasks','index');
        Route::post('tasks','store');
        Route::get('tasks/add','create');
        Route::get('tasks/print','print');
        Route::get('tasks/{id}','edit');
        Route::post('tasks/{id}','update');
        Route::delete('tasks/{id}','destroy');
    });

    Route::controller(ActivitiesController::class)->group(function(){
        Route::get('activities','index');
        Route::post('activities','store');
        Route::get('activities/add','create');
        Route::get('activities/print','print');
        Route::get('activities/{id}','edit');
        Route::post('activities/{id}','update');
        Route::delete('activities/{id}','delete');
    });
});



