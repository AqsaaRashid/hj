<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('about', function () {
    return view('about');
});
Route::get('menu', function () {
    return view('menu');
});
Route::get('privacy', function () {
    return view('privacy');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('faqs', function () {
    return view('faqs');
});