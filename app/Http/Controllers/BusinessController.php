<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BusinessBelongsToUser;
use App\Http\Requests\BusinessRequest;
use App\Models\Business;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Storage;

class BusinessController extends Controller
{

    public function __construct()
    {
        $this->middleware(BusinessBelongsToUser::class)->only(['show', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $businesses = Auth::user()->businesses;

        return view('dashboard.business.index', [
            'businesses' => $businesses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.business.create', [
            'business' => new Business(),
            'countries' => \Countries::getList('en')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->validated('logo')) {
            $data['logo'] = $request->validated('logo')->store('businesses_logo', 'public');
        }

        $business = Business::create($data);
        Auth::user()->businesses()->save($business);

        toastr()->success('Entreprise ajoutée avec succès.');
        return redirect()->route('dashboard.business.show', $business);
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business): View
    {
        return view('dashboard.business.show', [
            'business' => $business
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business): View
    {
        return view('dashboard.business.edit', [
            'business' => $business,
            'countries' => \Countries::getList('en')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessRequest $request, Business $business): RedirectResponse
    {

        $data = $request->validated();

        if ($request->validated('logo')) {
            // Delete the older logo
            if ($business->logo && Storage::disk('public')->exists($business->logo)) {
                Storage::disk('public')->delete($business->logo);
            }

            $data['logo'] = $request->validated('logo')->store('businesses_logo', 'public');
        }

        $business->update($data);

        toastr()->success('Entreprise mise à jour avec succès.');
        return redirect()->route('dashboard.business.show', $business);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business): RedirectResponse
    {
        $business->delete();

        toastr()->success('Votre entreprise a bien été supprimée.');
        return redirect()->route('dashboard.business.index');
    }
}
