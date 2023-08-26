<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Notifications\ContactNotification;
use Illuminate\View\View;
use Notification;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PageController extends Controller
{
    public function index(): View
    {
        return view('pages.homepage');
    }

    public function support(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $name = $data['name'];
        $email = $data['email'];
        $message = $data['message'];

        Notification::route('mail', 'support@invoquote.com')
            ->notify(new ContactNotification($name, $email, $message));

        toastr()->success('Votre demande de support a bien été envoyée à nos services');
        return back();
    }

    public function mentionsLegales(): View
    {
        return view('pages.mentions-legales');
    }

    public function politiqueConfidentialite(): View
    {
        return view('pages.politique-confidentialite');
    }

    public function conditionsGeneralesUtilisation(): View
    {
        return view('pages.conditions-generales-utilisation');
    }
}
