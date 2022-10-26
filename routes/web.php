<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::post('/invitados', [Controller::class, 'listaInvitados']);
Route::get('/invitacion', [Controller::class, 'invitacion']);
Route::get('/mesa-de-regalos', [Controller::class, 'mesaRegalos']);
Route::post('/enviar-respuesta', [Controller::class, 'enviarEmail']);
Route::post('/confirmar-articulo', [Controller::class, 'confirmarArticulo']);
