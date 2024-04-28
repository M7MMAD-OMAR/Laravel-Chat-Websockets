<?php

use App\Events\NewChatMessage;
use App\Events\NewMessage;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/test', function () {
//    $newMessage = new NewMessage('Hello, world!');
    event(new NewMessage('Hello, world!'));
//    broadcast($newMessage)->toOthers();
});

Route::get('/test2', function () {
    broadcast(new NewChatMessage(1, 'testMessage'))->toOthers();
//    event(new NewMessage('Hello, world!'));

});
