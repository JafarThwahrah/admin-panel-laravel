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
    return redirect('/login');

});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //companiesRoutes start
    Route::get('/dashboard', [CompanyController::class, 'index'])->name('dashboard'); //default page is companies page
    Route::post('/dashboard/companies', [CompanyController::class, 'store'])->name('company.store');
    Route::delete('/dashboard/companies/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
    Route::patch('/dashboard/companies/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::get('/dashboard/companies/view/{id}', [CompanyController::class, 'show'])->name('company.show');

    //edit company form
    Route::get('/dashboard/companies/edit/{id}', [CompanyController::class, 'edit'])->name('company.edit');
    //companiesRoutes end


    //employeesRoutes start
    Route::get('/dashboard/employees', [EmployeeController::class, 'index']); //show employees table with pagination
    Route::post('/dashboard/employees', [EmployeeController::class, 'store'])->name('employee.store');
    Route::delete('/dashboard/employees/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
    Route::patch('/dashboard/employees/{id}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::get('/dashboard/employees/view/{id}', [EmployeeController::class, 'show'])->name('employee.show');

    //edit employee form
    Route::get('/dashboard/employees/edit/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
    //employeesRoutes end

});

require __DIR__ . '/auth.php';