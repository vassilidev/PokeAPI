<?php

use App\Http\Controllers\Api\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/pokemon', [PokemonController::class, 'index'])
    ->name('pokemon.index');

Route::get('/pokemon/{pokemon}', [PokemonController::class, 'details'])
    ->where('pokemon', '[A-Za-z-0-9]+')
    ->name('pokemon.details');
