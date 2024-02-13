<?php

use App\Models\Speciality;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecialityController;

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

Route::middleware('auth', 'check_doctor_patient')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->name('dashboard');

    Route::middleware('auth', 'role:admin|doctor')->group(function () {
        Route::get('/drugs', function () {
            return view('dashboard.drug.index');
        })->name('drugs');
    });

    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('/specialities', [SpecialityController::class, 'index'])->name('specialities');
        Route::get('/speciality/edit/{speciality}', [SpecialityController::class, 'edit'])->name('speciality.edit');
        Route::patch('/speciality/edit/{speciality}', [SpecialityController::class, 'update'])->name('speciality.update');
        Route::delete('/speciality/delete/{speciality}', [SpecialityController::class, 'destroy'])->name('speciality.delete');
    });

    Route::middleware('auth', 'role:doctor')->group(function () {
        Route::get('/records', function () {
            return view('dashboard.record.index');
        })->name('records');
        Route::get('/appointments', function () {
            return view('dashboard.appointment.index');
        })->name('appointments');
    });
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/patient', [ProfileController::class, 'updatePatient'])->name('patient.update');
    Route::patch('/profile/doctor', [ProfileController::class, 'updateDoctor'])->name('doctor.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
