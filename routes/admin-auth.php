<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\admin\AdminRegisterController;
    use App\Http\Controllers\admin\AdminAuthenticationSessionController;

    Route::middleware('guest')->group(function(){

        Route::get('/admin/register', [AdminRegisterController::class,'create'])->name('admin.register');

        Route::post('/admin/register', [AdminRegisterController::class, 'store']);

        Route::get('/admin/login', [AdminAuthenticationSessionController::class, 'create'])->name('admin.login');

        Route::post('/admin/login', [AdminAuthenticationSessionController::class, 'store']);

    });
    Route::post('/admin/logout', [AdminAuthenticationSessionController::class, 'destroy'])
            ->name('admin.logout');
