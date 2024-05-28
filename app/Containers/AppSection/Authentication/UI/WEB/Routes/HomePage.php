<?php

use App\Ship\Components\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)
    ->name('home-page')->middleware('auth');