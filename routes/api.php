<?php

use Illuminate\Support\Facades\Route;
use MichielKempen\NovaOrderField\Http\OrderFieldRequestHandler;

Route::post('{resource}', OrderFieldRequestHandler::class);