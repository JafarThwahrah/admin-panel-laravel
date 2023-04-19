<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

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
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //companiesRoutes
    Route::get('/dashboard', [CompanyController::class, 'index'])->name('dashboard'); //default page is companies page
    Route::post('/dashboard/companies', [CompanyController::class, 'store'])->name('company.store');
    Route::delete('/dashboard/companies/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::patch('/dashboard/companies/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::get('/dashboard/companies/view/{id}', [CompanyController::class, 'show'])->name('company.show');

    //edit company form
    Route::get('/dashboard/companies/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');


    //employeesRoutes
    Route::get('/dashboard/employees', [EmployeeController::class, 'index']);
    Route::post('/dashboard/employees', [EmployeeController::class, 'store']);
});

require __DIR__ . '/auth.php';