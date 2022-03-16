<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'auth'],function (){
    Route::group(['prefix'=>'dashboard'],function () {
        Route::get('/',[\App\Http\Controllers\homecontroller::class,'index'])->name('dashboard');
        Route::get('/users',[\App\Http\Controllers\userscontroller::class,'index']);
        Route::get('/users/create',[\App\Http\Controllers\userscontroller::class,'create']);
        Route::post('/users/save',[\App\Http\Controllers\userscontroller::class,'store']);
        Route::get('/users/delete/{id}',[\App\Http\Controllers\userscontroller::class,'destroy']);
        Route::get('/users/{user}/edit',[\App\Http\Controllers\userscontroller::class,'edit']);
        Route::post('/users/update/{id}',[\App\Http\Controllers\userscontroller::class,'update']);




        Route::get('/Cyclique',[\App\Http\Controllers\Cycliquecontroller::class,'index'])->name('Cyclique.index');
        Route::get('/Cyclique/create',[\App\Http\Controllers\Cycliquecontroller::class,'create'])->name('Cyclique.create');
        Route::post('/Cyclique/save',[\App\Http\Controllers\Cycliquecontroller::class,'store'])->name('Cyclique.store');
        Route::get('/Cyclique/delete/{id}',[\App\Http\Controllers\Cycliquecontroller::class,'destroy'])->name('Cyclique.destroy');
        Route::get('/Cyclique/{data}/edit',[\App\Http\Controllers\Cycliquecontroller::class,'edit'])->name('Cyclique.edit');
        Route::post('/Cyclique/update/{id}',[\App\Http\Controllers\Cycliquecontroller::class,'update'])->name('Cyclique.update');


        //Route::resource('/ss',\App\Http\Controllers\clubcontroller::class);

        Route::get('/club',[\App\Http\Controllers\clubcontroller::class,'index'])->name('club.index');
        Route::get('/club/create',[\App\Http\Controllers\clubcontroller::class,'create'])->name('club.create');
        Route::post('/club/save',[\App\Http\Controllers\clubcontroller::class,'store'])->name('club.store');
        Route::get('/club/delete/{id}',[\App\Http\Controllers\clubcontroller::class,'destroy'])->name('club.destroy');
        Route::get('/club/{data}/edit',[\App\Http\Controllers\clubcontroller::class,'edit'])->name('club.edit');
        Route::post('/club/update/{id}',[\App\Http\Controllers\clubcontroller::class,'update'])->name('club.update');




        Route::get('/matcht',[\App\Http\Controllers\Matchtcontroller::class,'index'])->name('matcht.index');
        Route::get('/matcht/create',[\App\Http\Controllers\Matchtcontroller::class,'create'])->name('matcht.create');
        Route::post('/matcht/save',[\App\Http\Controllers\Matchtcontroller::class,'store'])->name('matcht.store');
        Route::get('/matcht/delete/{id}',[\App\Http\Controllers\Matchtcontroller::class,'destroy'])->name('matcht.destroy');
        Route::get('/matcht/{data}/edit',[\App\Http\Controllers\Matchtcontroller::class,'edit'])->name('matcht.edit');
        Route::post('/matcht/update/{id}',[\App\Http\Controllers\Matchtcontroller::class,'update'])->name('matcht.update');
    });
});


require __DIR__.'/auth.php';
