<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ExportController;

use App\Http\Controllers\RegisterController;
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
/*
Route::get('/', function () {
    return view('dashboard');
});
*/
Route::group(['middleware' => ['role:admin|user']], function(){
    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);

    Route::resource('brands', App\Http\Controllers\BrandController::class);
    Route::get('brands/{brandId}/delete', [App\Http\Controllers\BrandController::class, 'destroy']);

    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::get('categories/{categoryId}/delete', [App\Http\Controllers\CategoryController::class, 'destroy']);

    Route::resource('items', App\Http\Controllers\ItemController::class);

    Route::get('generate-brand-pdf', [App\Http\Controllers\PdfController::class, 'generateBrandPdf'])->name('generate-brand-pdf');
    Route::get('generate-category-pdf', [App\Http\Controllers\PdfController::class, 'generateCategoryPdf'])
                    ->name('generate-category-pdf');

    Route::get('generate-item-pdf', [App\Http\Controllers\PdfController::class, 'generateItemPdf'])->name('generate-item-pdf');



    Route::get('/export-brand-excel', [ExportController::class, 'exportBrandExcel'])->name('export.brand.excel');
    Route::get('/export-brand-csv', [ExportController::class, 'exportBrandCsv'])->name('export.brand.csv');

    Route::get('/export-item-excel', [ExportController::class, 'exportItemExcel'])->name('export.item.excel');
    Route::get('/export-item-csv', [ExportController::class, 'exportItemCsv'])->name('export.item.csv');

    Route::get('/export-category-excel', [ExportController::class, 'exportCategoryExcel'])->name('export.category.excel');
    Route::get('/export-category-csv', [ExportController::class, 'exportCategoryCsv'])->name('export.category.csv');
});


//login
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');   // Show form
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Show registration form
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');

// Handle registration form submission
Route::post('register', [RegisterController::class, 'register'])->name('register');


// Example dashboards

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'is_admin'])->name('dashboard');




Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

