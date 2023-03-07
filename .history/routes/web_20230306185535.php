

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PersonaController;
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
    return view('pantallas/inicio');
});

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//MIS RUTAS
//PERSONAS
Route::resource('persona',App\Http\Controllers\PersonaController::class);
//ESPECIALISTAS
Route::resource('/especialista', App\Http\Controllers\EspecialistaController::class);

Route::resource('/horas_disponibles', App\Http\Controllers\HorasDisponiblesController::class);
// Route::get('/especialista', [EspecialidadesController::class, 'index']);

Route::post('/horas_disponibles/buscar', [App\Http\Controllers\HorasDisponiblesController::class,'buscar'])->name('horas_disponibles.buscar');
Route::post('/horas_disponibles/buscarxDia', [App\Http\Controllers\HorasDisponiblesController::class,'buscarxDia'])->name('horas_disponibles.buscarxDia');

Route::resource('/asignar_horas', App\Http\Controllers\AsignarHorasController::class);
 Route::post('/asignar_horas/ingresarHoras', [App\Http\Controllers\AsignarHorasController::class,'ingresarHoras'])->name('asignar_horas.ingresarHoras');
