<?php

namespace App\Http\Controllers;

use App\Http\Middleware\QuotationBelongsToUserBusiness;
use App\Http\Requests\QuotationRequest;
use App\Models\Business;
use App\Models\Quotation;
use Barryvdh\DomPDF\Facade\Pdf;
use Cookie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class QuotationController extends Controller
{

    public function __construct()
    {
        $this->middleware(QuotationBelongsToUserBusiness::class)->only(['show', 'edit', 'update', 'destroy', 'pdf']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $business = Business::findOrFail(Cookie::get('active_business'));
        $quotations = $business->quotations()->orderBy('created_at', 'DESC')->paginate(10);

        return view('dashboard.quotation.index', [
            'quotations' => $quotations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $quotation = new Quotation();
        $business = Business::findOrFail(Cookie::get('active_business'));

        return view('dashboard.quotation.create', [
            'quotation' => $quotation,
            'customers' => $business->customers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuotationRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $quotation = Quotation::create([
            'customer_id' => $data['customer_id'],
            'name' => $data['name'],
            'additionals_informations' => $data['additionals_informations'],
        ]);

        foreach ($data['lines'] as $lineData) {
            $quotation->quotation_services()->create([
                'name' => $lineData['name'],
                'quantity' => $lineData['quantity'],
                'unit_price' => $lineData['unit_price'],
            ]);
        }

        toastr()->success('Devis créé avec succès');
        return redirect()->route('dashboard.quotation.show', $quotation->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Quotation $quotation): View
    {
        return view('dashboard.quotation.show', [
            'quotation' => $quotation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quotation $quotation)
    {
        return view('dashboard.quotation.edit', [
            'quotation' => $quotation,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuotationRequest $request, Quotation $quotation): RedirectResponse
    {
        $data = $request->validated();

        $quotation->update([
            'name' => $data['name'],
            'additionals_informations' => $data['additionals_informations'],
            'state' => $data['state'],
        ]);

        // Delete the existing quotation services and recreate them
        $quotation->quotation_services()->delete();
        foreach ($data['lines'] as $lineData) {
            $quotation->quotation_services()->create([
                'name' => $lineData['name'],
                'quantity' => $lineData['quantity'],
                'unit_price' => $lineData['unit_price'],
            ]);
        }

        if ($data['state'] == 1) 
        {
            $request->merge(['quotation_id' => $quotation->id]);
            return (new InvoiceController)->store($request);
        }
        else 
        {
            toastr()->success('Le devis à été mis à jour avec succès.');
        }

        return redirect()->route('dashboard.quotation.show', $quotation->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        toastr()->success('Le devis a bien été supprimé.');
        return redirect()->route('dashboard.quotation.index');
    }

    public function pdf(Quotation $quotation): Response
    {
        $data['quotation'] = $quotation;
        $pdf = Pdf::loadView('dashboard.quotation.pdf', $data);

        return $pdf->stream('quotation.pdf');
    }
}
