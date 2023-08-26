<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/email/verify', function () {
    return view('auth.verify');
})->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    toastr()->success('Email vérifiée avec succès, vous avez dorénavant accès au tableau de bord.');

    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    toastr()->success('Un nouveau lien de vérification vous a été envoyé à votre addresse email.');
    $request->user()->sendEmailVerificationNotification();

    return back();
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
