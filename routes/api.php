<?php

use App\Http\Controllers\membresController;
use App\Http\Controllers\UserController;
use Illuminate\Database\Console\Migrations\InstallCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::post("/utilisateur/inscription",[UserController::class,"inscription"]);
//Route::post("/utilisateur/connexion",[UserController::class,"connexion"]);

Route::get("/membres",[membresController::class,"index" ]);
Route::post("/membres",[membresController::class,"store" ]);
Route::get("/membres/{id}",[membresController::class,"show" ]);
Route::put("/membres/{id}",[membresController::class,"update" ]);
Route::delete("/membres/{id}",[membresController::class,"destroy" ]);







Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
