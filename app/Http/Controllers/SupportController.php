<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupportRequest;
use App\Notifications\SupportNotification;
use Illuminate\Contracts\View\View;
use Notification;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SupportController extends Controller
{
    public function create() : View 
    {
        return view('dashboard.support.create');
    }

    public function store(SupportRequest $request) : RedirectResponse
    {
        $data = $request->validated();

        Notification::route('mail', 'support@invoquote.com')
            ->notify(new SupportNotification($data['type'], $data['message']));

        toastr()->success('Votre demande a été soumise avec succès.');
        return redirect()->route('dashboard.support.create');
    }
}
