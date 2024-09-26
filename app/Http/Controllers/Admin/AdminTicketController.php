<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminTicket;
use Illuminate\Http\Request;
use App\Models\CustomerTicket;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AdminTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customer_tickets = CustomerTicket::search($request)->latest()->paginate(10);
        return view('backend.admin.ticket.index', compact('customer_tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminTicket $adminTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $customer_ticket = CustomerTicket::findorFail($id);
        return view('backend.admin.ticket.edit', compact('customer_ticket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {

            $requestedData = $request->validate([
                'review' => 'nullable',
                'status' => 'required',
            ]);;

            $requestedData['customer_ticket_id'] = $id;

            AdminTicket::create($requestedData);

            Toastr::success('Successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            \alert('error', 'Something went wrong');
            return \redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminTicket $adminTicket)
    {
        //
    }
}
