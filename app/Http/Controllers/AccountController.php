<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use App\Models\User;
use App\Notifications\DeleteAccountNotification;
use Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Notification;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AccountController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(): View
    {
        return view('dashboard.account.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AccountRequest $request): RedirectResponse
    {
        $user = Auth::user();
        $data = $request->validated();
    
        if (empty($data['password'])) {
            // Only update the other information
            unset($data['password']); // Remove password from data array
            $user->update($data);
        } else {
            // Update the password and other information
            $user->update($data);
            $user->password = bcrypt($data['password']);
            $user->save();
        }
    
        toastr()->success('Votre compte a été mis à jour avec succès.');
        return redirect()->route('dashboard.account.edit', Auth::user()->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request) : RedirectResponse
    {
        $user = Auth::user();

        if (!empty($request->input('message'))) {
            Notification::route('mail', 'support@invoquote.com')
                ->notify(new DeleteAccountNotification($request->input('message')));
        } else {
            Notification::route('mail', 'support@invoquote.com')
                ->notify(new DeleteAccountNotification('Aucun message n\'a été laissé.'));
        }

        $user->delete();
        Auth::logout();

        toastr()->success('Votre compte a été supprimé avec succès.');
        return redirect()->route('home');
    }
}
