<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoulderRouteController;

Route::get('/', function () {
    return view('main');
});
Route::get('/start', [BoulderRouteController::class, 'showForm']);
Route::post('/start', [BoulderRouteController::class, 'addNode']);
Route::get('/qr_gen', [BoulderRouteController::class, 'listRoutes']);
Route::get('/qr_read', [BoulderRouteController::class, 'readQRCode']);


