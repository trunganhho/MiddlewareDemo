<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
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

Route::get('/check', function(){})->middleware('IsAdmin');
Route::get('/mail', function(){
    $data = [
        'title' => 'Hi student I hope you like the course',
        'content' => 'This Laravel course was created a lot of love and dedication for you'
    ];

    Mail::send('emails.test', $data, function ($message) {
        $message->to('gegam48539@unigeol.com', 'Trung Anh')->subject('Hello student how r ya?');
        
    });
});