<?php

use App\Models\Speciality;
use App\Models\Appointment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\AppointmentController;

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

    Route::get('/specialities/browse', [SpecialityController::class, 'browse'])->name('specialities.browse');
    Route::get('/specialities/browse/{speciality}', [SpecialityController::class, 'show'])->name('specialities.show');
    Route::get('/doctor/{doctor}', [DoctorController::class, 'show'])->name('doctor.show');

    // appointments
    Route::get('/doctor/appointment/{doctor}', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/doctor/appointment/{doctor}', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::post('/doctor/appointment/urgent', [AppointmentController::class, 'urgent'])->name('appointment.urgent');

    // Favourites
    Route::get('/favourites', [FavouriteController::class, 'index'])->name('favourites');
    Route::post('/favourites/add/{doctorId}', [FavouriteController::class, 'store'])->name('favourite.store');
    Route::delete('/favourites/delete/{doctorId}', [FavouriteController::class, 'destroy'])->name('favourite.destroy');

    // Comments
    Route::post('/comment/add', [CommentController::class, 'store'])->name('comment.store');
    Route::patch('/comment/edit/{comment}', [CommentController::class, 'update'])->name('comment.update');
    Route::patch('/comment/delete/{comment}', [CommentController::class, 'delete'])->name('comment.delete');

    Route::middleware('auth', 'role:admin|doctor')->group(function () {
        Route::get('/drugs', [DrugController::class, 'index'])->name('drugs');
        Route::get('/drugs/edit/{drug}', [DrugController::class, 'edit'])->name('drug.edit');
        Route::get('/drugs/add', [DrugController::class, 'create'])->name('drug.create');
        Route::post('/drugs', [DrugController::class, 'store'])->name('drug.store');
        Route::patch('/drugs/edit/{drug}', [DrugController::class, 'update'])->name('drug.update');
        Route::delete('/drugs/delete/{drug}', [DrugController::class, 'destroy'])->name('drug.delete');
    });

    Route::middleware('auth', 'role:admin')->group(function () {
        Route::get('/specialities', [SpecialityController::class, 'index'])->name('specialities');
        Route::get('/specialities/edit/{speciality}', [SpecialityController::class, 'edit'])->name('speciality.edit');
        Route::get('/specialities/add', [SpecialityController::class, 'create'])->name('speciality.create');
        Route::post('/specialities', [SpecialityController::class, 'store'])->name('speciality.store');
        Route::patch('/specialities/edit/{speciality}', [SpecialityController::class, 'update'])->name('speciality.update');
        Route::delete('/specialities/delete/{speciality}', [SpecialityController::class, 'destroy'])->name('speciality.delete');
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
