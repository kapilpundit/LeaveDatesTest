<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get(
//     '/user', function (Request $request) {
//         return $request->user();
//     }
// );

Route::get('/', function (Request $request) {
    return response()->json(
        [
            'message' => 'Welcome to Leave Dates.'
        ],
        200
    );
});

Route::get('/websites', 'API\WebsiteController@show');
Route::get('/users', 'API\UserController@show');
Route::post('/posts/{website}/create', 'API\PostController@create');
Route::post('/user/{user}/website/{website}', 'API\WebsiteController@subscribe');
