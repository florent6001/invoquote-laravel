<?php

namespace App\Http\Controllers;

use App\Http\Middleware\InvoiceBelongsToUserBusiness;
use App\Models\Business;
use App\Models\Invoice;
use App\Models\Quotation;
use Barryvdh\DomPDF\Facade\Pdf;
use Cookie;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Request;

class InvoiceController extends Controller
{

    public function __construct()
    {
        $this->middleware(InvoiceBelongsToUserBusiness::class)->only(['show', 'edit', 'update', 'destroy', 'pdf']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $business = Business::findOrFail(Cookie::get('active_business'));
        $invoices = $business->invoices()->orderBy('created_at', 'DESC')->paginate(10);
        
        return view('dashboard.invoice.index', [
            'invoices' => $invoices
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $quotation = Quotation::findOrFail($request->quotation_id);
        
        $invoice = Invoice::create([
            'quotation_id' => $quotation->id,
            'customer_id' => $quotation->customer_id
        ]);
        
        toastr()->success('Une facture associé à ce devis à été générée avec succès.');
        return redirect()->route('dashboard.invoice.show', $invoice->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice): View
    {
        return view('dashboard.invoice.show', [
            'invoice' => $invoice
        ]);
    }


    public function pdf(Invoice $invoice): Response
    {
        $data['invoice'] = $invoice;
        $pdf = Pdf::loadView('dashboard.invoice.pdf', $data);

        return $pdf->stream('invoice.pdf');
    }
}
