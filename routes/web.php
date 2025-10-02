<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SampleController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DemoAnalysisController; #模擬分析
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;#回傳圖片


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
    Route::get('/', [DashboardController::class, 'view'])->name('dashboard');
    Route::get('/project', [ProjectController::class, 'view'])->name('project');
    Route::get('/sample', [SampleController::class, 'view'])->name('sample');
    Route::get('/analysis', [AnalysisController::class, 'new'])->name('new_analysis');
    Route::get('/demo-analysis', [DemoAnalysisController::class, 'index'])->name('demo.analysis');
    Route::post('/demo-analysis/run', [DemoAnalysisController::class, 'run'])->name('demo.analysis.run');
    Route::get('/setting', [SettingController::class, 'personal'])->name('setting.personal');
    Route::patch('/setting', [SettingController::class, 'update'])->name('setting.update');
    Route::delete('/setting', [SettingController::class, 'destroy'])->name('setting.destroy');
    Route::get('/edit', [EditController::class, 'view'])->name('edit');
    Route::match(['get', 'post'], '/analysis/{id}', [AnalysisController::class, 'project'])->name('analysis');
    Route::get('/demo_results/{path}', function ($path) {
    $fullPath = base_path("Model/demo/demo_results/" . $path);

    if (!file_exists($fullPath)) {
        abort(404, "檔案不存在: " . $fullPath);
    }

        return Response::file($fullPath);
    })->where('path', '.*');
});

require __DIR__ . '/auth.php';
