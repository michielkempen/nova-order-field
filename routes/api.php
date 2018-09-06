<?php

use Illuminate\Support\Facades\Route;
use Michielkempen\NovaOrderField\Http\OrderFieldRequestHandler;

Route::post('', OrderFieldRequestHandler::class);