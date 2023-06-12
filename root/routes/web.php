<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
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

Route::prefix('admin')->name('admin.')->group(function(){
    Route::view('', 'admin.index')->name('index');
        Route::prefix('jobs')->name('jobs.')->group(function(){
            Route::GET('', [JobController::class,'index'])->name('index'); //=route::get(/admin/job)   nameでのルート名指定により、viewとかでroute('index')で呼び出せる
            Route::POST('', [JobController::class,'store'])->name('store');
            Route::GET('create', [JobController::class,'create'])->name('create');
            Route::GET('{job}', [JobController::class,'show'])->name('show');
            //'{job}
            Route::PATCH('{job}', [JobController::class,'update'])->name('update');
            Route::DELETE('{job}', [JobController::class,'destroy'])->name('destroy');
            Route::GET('{job}/edit', [JobController::class,'edit'])->name('edit'); //=route::get(/admin/job/{job}/edit)   nameでのルート名指定により、viewとかでroute('edit',['job'=>'???'])で呼び出せるはず
            Route::POST('{job}/confirm', [JobController::class,'confirm'])->name('confirm');
        });
});
