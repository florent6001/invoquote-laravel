<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CustomerBelongsToUserBusiness;
use App\Http\Requests\CustomerRequest;
use App\Models\Business;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{
    public function __construct() {
        $this->middleware(CustomerBelongsToUserBusiness::class)->only(['show', 'edit', 'update', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $business = Business::findOrFail(Cookie::get('active_business'));
        $customers = $business->customers()->orderBy('created_at', 'DESC')->paginate(10);
        
        return view('dashboard.customer.index', [
            'customers' => $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('dashboard.customer.create', [
            'customer' => new Customer(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['business_id'] = Cookie::get('active_business');
        $customer = Customer::create($data);

        toastr()->success('Client ajouté avec succès');
        return redirect()->route('dashboard.customer.show', $customer->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer): View
    {
        return view('dashboard.customer.show', [
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer): View
    {
        return view('dashboard.customer.edit', [
            'customer' => $customer,
            'countries' => \Countries::getList('en')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer): RedirectResponse
    {
        $customer->update($request->validated());

        toastr()->success('Le client à été mis à jour avec succès.');
        return redirect()->route('dashboard.customer.show', $customer->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        toastr()->success('Le client a bien été supprimé.');
        return redirect()->route('dashboard.customer.index');
    }
}
