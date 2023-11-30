<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\LoginController;
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
Route::resource('adminindex', AdminController::class);
Route::resource('admindoctors', DoctorController::class);
Route::resource('adminschedule', ScheduleController::class);
Route::resource('adminappointment', AppointmentController::class);
Route::resource('adminpatients', PatientController::class);


// Route::get('/about', function () {
//     return view('about');
// });


// Route::get('/contact', function () {
//     return view('contact');
// });



Route::get('/create-account', function () {
    return view('create-account');
});

Route::get('/', function () {
    return view('index');
});



// Edit doctor
Route::get('doctors/{doctor}/edit', [DoctorController::class, 'edit'])->name('edit-doctor');

// // View doctor

// // Remove doctor
Route::delete('doctors/{doctor}delete', [DoctorController::class, 'destroy'])->name('destroy-doctor');


Route::put('doctors/{doctor}/update', [DoctorController::class, 'update'])->name('update-doctor');

// View doctor details
Route::get('doctors/{doctor}/view', [DoctorController::class, 'show'])->name('view-doctor');

Route::get('/doctors/create', [DoctorController::class, 'create'])->name('add-doctor');
Route::put('/doctors/store', [DoctorController::class, 'store'])->name('store-doctor');



Route::get('/search-doctors', [DoctorController::class,'search'])->name('search-doctors');

Route::delete('schedule/{schedule}delete', [ScheduleController::class, 'destroy'])->name('destroy-session');
Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('add-session');

Route::put('/schedule/store', [ScheduleController::class, 'store'])->name('store-session');


Route::delete('appointment/{appointment}delete', [AppointmentController::class, 'destroy'])->name('destroy-appointment');

Route::get('patients/{patient}/view', [PatientController::class, 'show'])->name('view-patient');

Route::get('/search-patients', [PatientController::class, 'search'])->name('search-patients');


//doctors portal


Route::get('/admin', [AdminController::class,'index'])->name('adminindex');
Route::get('/doctor',[DoctorController::class,'doctorIndex'])->name('doctorindex');
Route::get('/doctorappointment',[DoctorController::class,'doctorAppointment'])->name('doctorappointment');
Route::get('/patient', [PatientController::class,'index'])->name('patientindex');
Route::delete('doctorappointment/{appointment}delete', [DoctorController::class, 'destroyappointment'])->name('destroy-doctorappointment');
Route::get('/doctorschedule',[DoctorController::class,'doctorSchedule'])->name('doctorschedule');
Route::delete('doctorschedule/{schedule}delete', [DoctorController::class, 'destroyschedule'])->name('destroy-doctorschedule');
Route::get('/doctorpatients',[DoctorController::class,'doctorPatients'])->name('doctorpatients');
Route::get('/doctorsettings',[DoctorController::class,'doctorSettings'])->name('doctorsettings');
Route::get('doctors/{doctor}/editdoc', [DoctorController::class, 'editdoc'])->name('edit-doc');
Route::put('doctors/{doctor}/updatedoc', [DoctorController::class, 'updatedoc'])->name('update-doc');
Route::delete('doctors/{doctor}deletedoc', [DoctorController::class, 'destroydoc'])->name('destroy-doc');


//patient portal
Route::get('/patient',[PatientController::class,'patientIndex'])->name('patientindex');
Route::get('/patientdoctors',[PatientController::class,'patientdoctors'])->name('patientdoctors');
Route::get('patientdoctors/{doctor}/view', [PatientController::class, 'showdoctor'])->name('view-patientdoctor');
Route::get('/patientschdeule',[PatientController::class,'patientschedule'])->name('patientschedule');
Route::get('/patientbooking',[PatientController::class,'patientbooking'])->name('patientbooking');
Route::delete('patientbooking/{appointment}delete', [PatientController::class, 'destroyappointment'])->name('destroy-patientbooking');
Route::post('/book-appointment', [AppointmentController::class, 'bookAppointment'])->name('bookAppointment');
Route::get('/patientsettings',[PatientController::class,'patientSettings'])->name('patientsettings');
Route::delete('patients/{patient}delete', [PatientController::class, 'destroy'])->name('destroy-patient');
Route::get('patients/{patient}/edit', [PatientController::class, 'edit'])->name('edit-patient');
Route::put('patients/{patient}/update', [PatientController::class, 'update'])->name('update-patient');



//login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');


//signup


Route::get('/signup', function () {
    return view('signup');
});

Route::put('/patients/store',[PatientController::class, 'store'])->name('store-patient');

