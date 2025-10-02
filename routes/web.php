<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [Controller::class, 'view'])->name('dashboard');
    Route::get('/project', [ProjectController::class, 'view'])->name('project');
    Route::get('/sample', [SampleController::class, 'view'])->name('sample');
    Route::get('/analysis', [AnalysisController::class, 'new'])->name('new_analysis');
    
    Route::get('/setting', [SettingController::class, 'edit'])->name('setting.edit');
    Route::patch('/setting', [SettingController::class, 'update'])->name('setting.update');
    Route::delete('/setting', [SettingController::class, 'destroy'])->name('setting.destroy');
    
    Route::match(['get', 'post'], '/analysis/{id}', [AnalysisController::class, 'project'])->name('analysis');
});

require __DIR__ . '/auth.php';
