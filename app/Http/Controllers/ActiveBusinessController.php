<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ActiveBusinessController extends Controller
{
    public function edit(int $id): RedirectResponse
    {
        $user = Auth::user();
        if ($user && $user->businesses->contains('id', $id))
        {
            return back()->cookie('active_business', $id);
        }

        return back()->cookie('active_business', 0);
    }
}
