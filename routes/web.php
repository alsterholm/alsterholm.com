<?php

use Illuminate\Support\Facades\Route;

Route::post('/newsletter', App\Http\Actions\NewsletterSignUp::class);
