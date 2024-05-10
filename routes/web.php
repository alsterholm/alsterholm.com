<?php

use Illuminate\Support\Facades\Route;

Route::post('/newsletter', App\Http\Actions\NewsletterSignUp::class);
Route::get('/blog/{year}/{slug}/ogimage', App\Http\Actions\GenerateBlogPostOgImage::class)->name('blog.ogimage');
