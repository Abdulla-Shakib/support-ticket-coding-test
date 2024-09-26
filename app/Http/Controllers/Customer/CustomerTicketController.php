<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Models\CustomerTicket;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;

class CustomerTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tickets = CustomerTicket::where('user_id', auth()->id())
            ->searchCustomer($request)
            ->with('latestAdminTicket')
            ->latest()
            ->paginate(10);
        // return $tickets;

        return view('backend.customer.ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customer.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CustomerTicket $customerTicket)
    {
        try {
            $requestedData = $request->validate([
                'subject' => 'required',
                'description' => 'required',
            ]);;

            $requestedData['user_id'] = Auth::id();

            $requestedData = $customerTicket->fill($requestedData)->save();
            Toastr::success('Inserted successfully');
            return redirect()->route('customer-tickets.index');
        } catch (\Throwable $e) {
            dd($e->getmessage());
            // Toastr::error('Something went wrong');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $customer_ticket = CustomerTicket::with('latestAdminTicket')->findOrFail($id);
        $latestAdminTicket = $customer_ticket->latestAdminTicket;
        return view('backend.customer.ticket.show', compact('customer_ticket', 'latestAdminTicket'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerTicket $customerTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerTicket $customerTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerTicket $customerTicket)
    {
        //
    }
}
