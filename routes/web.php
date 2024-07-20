<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConfiguracioneController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HistorialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\SecretariaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    // Rutas para admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Rutas para admin/configuraciones
    Route::prefix('admin/configuraciones')->name('admin.configuraciones.')->middleware('can:admin.configuraciones.index')->group(function () {
        Route::get('/', [ConfiguracioneController::class, 'index'])->name('index');
        Route::get('/create', [ConfiguracioneController::class, 'create'])->name('create');
        Route::post('/create', [ConfiguracioneController::class, 'store'])->name('store');
        Route::get('/{id}', [ConfiguracioneController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ConfiguracioneController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ConfiguracioneController::class, 'update'])->name('update');
        Route::get('/{id}/confirm-delete', [ConfiguracioneController::class, 'confirmDelete'])->name('confirmDelete');
        Route::delete('/{id}', [ConfiguracioneController::class, 'destroy'])->name('destroy');
    });

    // Rutas para admin/usuarios
    Route::prefix('admin/usuarios')->name('admin.usuarios.')->middleware('can:admin.usuarios.index')->group(function () {
        Route::get('/', [UsuarioController::class, 'index'])->name('index');
        Route::get('/create', [UsuarioController::class, 'create'])->name('create');
        Route::post('/create', [UsuarioController::class, 'store'])->name('store');
        Route::get('/{id}', [UsuarioController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UsuarioController::class, 'update'])->name('update');
        Route::get('/{id}/confirm-delete', [UsuarioController::class, 'confirmDelete'])->name('confirmDelete');
        Route::delete('/{id}', [UsuarioController::class, 'destroy'])->name('destroy');
    });


    // Rutas para admin/secretarias
    Route::prefix('admin/secretarias')->name('admin.secretarias.')->middleware('can:admin.secretarias.index')->group(function () {
        Route::get('/', [SecretariaController::class, 'index'])->name('index');
        Route::get('/create', [SecretariaController::class, 'create'])->name('create');
        Route::post('/create', [SecretariaController::class, 'store'])->name('store');
        Route::get('/{id}', [SecretariaController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SecretariaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SecretariaController::class, 'update'])->name('update');
        Route::get('/{id}/confirm-delete', [SecretariaController::class, 'confirmDelete'])->name('confirmDelete');
        Route::delete('/{id}', [SecretariaController::class, 'destroy'])->name('destroy');
    });

    // Rutas para admin/pacientes
    Route::prefix('admin/pacientes')->name('admin.pacientes.')->middleware('can:admin.pacientes.index')->group(function () {
        Route::get('/', [PacienteController::class, 'index'])->name('index');
        Route::get('/create', [PacienteController::class, 'create'])->name('create');
        Route::post('/create', [PacienteController::class, 'store'])->name('store');
        Route::get('/{id}', [PacienteController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [PacienteController::class, 'edit'])->name('edit');
        Route::put('/{id}', [PacienteController::class, 'update'])->name('update');
        Route::get('/{id}/confirm-delete', [PacienteController::class, 'confirmDelete'])->name('confirmDelete');
        Route::delete('/{id}', [PacienteController::class, 'destroy'])->name('destroy');
    });

    // Rutas para admin/consultorios
    Route::prefix('admin/consultorios')->name('admin.consultorios.')->middleware('can:admin.consultorios.index')->group(function () {
        Route::get('/', [ConsultorioController::class, 'index'])->name('index');
        Route::get('/create', [ConsultorioController::class, 'create'])->name('create');
        Route::post('/create', [ConsultorioController::class, 'store'])->name('store');
        Route::get('/{id}', [ConsultorioController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ConsultorioController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ConsultorioController::class, 'update'])->name('update');
        Route::get('/{id}/confirm-delete', [ConsultorioController::class, 'confirmDelete'])->name('confirmDelete');
        Route::delete('/{id}', [ConsultorioController::class, 'destroy'])->name('destroy');
    });

    // Rutas para admin/doctores
    Route::prefix('admin/doctores')->name('admin.doctores.')->middleware('can:admin.doctores.index')->group(function () {
        Route::get('/', [DoctorController::class, 'index'])->name('index');
        Route::get('/create', [DoctorController::class, 'create'])->name('create');
        Route::post('/create', [DoctorController::class, 'store'])->name('store');
        Route::get('/reportes', [DoctorController::class, 'reportes'])->name('reportes');
        Route::get('/pdf', [DoctorController::class, 'pdf'])->name('pdf');
        Route::get('/{id}', [DoctorController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [DoctorController::class, 'edit'])->name('edit');
        Route::put('/{id}', [DoctorController::class, 'update'])->name('update');
        Route::get('/{id}/confirm-delete', [DoctorController::class, 'confirmDelete'])->name('confirmDelete');
        Route::delete('/{id}', [DoctorController::class, 'destroy'])->name('destroy');
    });

    // Rutas para admin/horarios
    Route::prefix('admin/horarios')->name('admin.horarios.')->middleware('can:admin.horarios.index')->group(function () {
        Route::get('/', [HorarioController::class, 'index'])->name('index');
        Route::get('/create', [HorarioController::class, 'create'])->name('create');
        Route::post('/create', [HorarioController::class, 'store'])->name('store');
        Route::get('/{id}', [HorarioController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [HorarioController::class, 'edit'])->name('edit');
        Route::put('/{id}', [HorarioController::class, 'update'])->name('update');
        Route::get('/{id}/confirm-delete', [HorarioController::class, 'confirmDelete'])->name('confirmDelete');
        Route::delete('/{id}', [HorarioController::class, 'destroy'])->name('destroy');
        // Ruta ajax
        Route::get('/consultorios/{id}', [HorarioController::class, 'cargaConsultorios'])->name('cargaConsultorios');
    });
});

Route::prefix('admin/reservas')->name('admin.reservas.')->middleware('auth', 'can:admin.reservas.reportes')->group(function () {
    Route::get('/reportes', [EventController::class, 'reportes'])->name('reportes');
    Route::get('/pdf', [EventController::class, 'pdf'])->name('pdf');
    Route::get('/pdf_fechas', [EventController::class, 'pdf_fechas'])->name('pdf_fechas');
});

// Rutas para admin/historial
Route::prefix('admin/historial')->name('admin.historial.')->middleware('can:admin.historial.index')->group(function () {
    Route::get('/', [HistorialController::class, 'index'])->name('index');
    Route::get('/create', [HistorialController::class, 'create'])->name('create');
    Route::post('/create', [HistorialController::class, 'store'])->name('store');
    Route::get('/reportes', [HistorialController::class, 'reportes'])->name('reportes');
    Route::get('/pdf/{id}', [HistorialController::class, 'pdf'])->name('pdf');
    Route::get('/paciente', [HistorialController::class, 'paciente'])->name('paciente');
    Route::get('/paciente/{id}', [HistorialController::class, 'historial'])->name('historial');
    Route::get('/{id}', [HistorialController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [HistorialController::class, 'edit'])->name('edit');
    Route::put('/{id}', [HistorialController::class, 'update'])->name('update');
    Route::get('/{id}/confirm-delete', [HistorialController::class, 'confirmDelete'])->name('confirmDelete');
    Route::delete('/{id}', [HistorialController::class, 'destroy'])->name('destroy');
});

// Rutas para admin/pagos
Route::prefix('admin/pagos')->name('admin.pagos.')->middleware('can:admin.pagos.index')->group(function () {
    Route::get('/', [PagoController::class, 'index'])->name('index');
    Route::get('/create', [PagoController::class, 'create'])->name('create');
    Route::post('/create', [PagoController::class, 'store'])->name('store');
    Route::get('/pdf/{id}', [PagoController::class, 'pdf'])->name('pdf');
    Route::get('/{id}', [PagoController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PagoController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PagoController::class, 'update'])->name('update');
    Route::get('/{id}/confirm-delete', [PagoController::class, 'confirmDelete'])->name('confirmDelete');
    Route::delete('/{id}', [PagoController::class, 'destroy'])->name('destroy');
});

// Rutas para el usuario
// Ajax
Route::get('/consultorios/{id}', [WebController::class, 'cargaConsultorios'])->name('cargaConsultorios');
Route::get('/cargar_reserva_doctores/{id}', [WebController::class, 'cargar_reserva_doctores'])->name('cargar_reserva_doctores')->middleware('auth', 'can:cargar_reserva_doctores');
Route::get('/admin/reservas/{id}', [AdminController::class, 'reservas'])->name('admin.reservas')->middleware('auth', 'can:admin.reservas');
Route::post('/admin/events/create', [EventController::class, 'store'])->name('admin.events.create')->middleware('auth', 'can:admin.events.create');
Route::delete('/admin/events/destroy/{id}', [EventController::class, 'destroy'])->name('admin.events.destroy')->middleware('auth', 'can:admin.events.destroy');
