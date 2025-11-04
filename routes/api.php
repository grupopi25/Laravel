<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/adm',function(Request $request){
    return response()->json([
        ['id'=> 1, 'nome' => 'Eduardo', 'valor' => 0],
        ['id'=> 2, 'nome' => 'Luiza'  , 'valor' => 250],
        ['id'=> 3, 'nome' => 'Paula'  , 'valor' => 100],
        
        
    ]);;
});