<?php

use App\Http\Controllers\EnviarSMSController;
use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/enviar', [EnviarSMSController::class, 'enviarSMS'])->name('enviar-sms.index');