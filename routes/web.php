<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



// Object Oriented Programming
Route::prefix('object-oriented-programming')->group(function () {
    Route::get('/', function () { return view('oop.index'); });
    Route::get('/introduction', function () { return view('oop.introduction'); });
    Route::get('/classes-and-objects', function () { return view('oop.classes-and-objects'); });
    Route::get('/constructors', function () { return view('oop.constructors'); });
    Route::get('/inheritance', function () { return view('oop.inheritance'); });
    Route::get('/visibility', function () { return view('oop.visibility'); });
    Route::get('/encapsulation', function () { return view('oop.encapsulation'); });
    Route::get('/static', function () { return view('oop.static'); });
    Route::get('/abstract', function () { return view('oop.abstract'); });
    Route::get('/interface', function () { return view('oop.interface'); });
    Route::get('/traits', function () { return view('oop.traits'); });
    Route::get('/final', function () { return view('oop.final'); });
    Route::get('/exceptions', function () { return view('oop.exceptions'); });
});


// PHP
Route::prefix('php')->group(function () {
    Route::get('/', function () { return view('php.index'); });
    Route::get('/type-hinting', function () { return view('php.type-hinting'); });
});