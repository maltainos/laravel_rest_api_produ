<?php

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ProductRestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function(Request $request){

    dd($request->headers->get('Authorization'));
    $response = new Response(json_encode(['message' => 'Minha Primeira API Rest com Laravel']));
    $response->header('Content-Type','application\json');
    return $response;
});

Route::prefix('/products')->group(function(){
    Route::get('/', [ProductRestController::class, 'index']);
    Route::get('/{id}', [ProductRestController::class, 'show']);
    Route::post('/', [ProductRestController::class, 'save']);
});




