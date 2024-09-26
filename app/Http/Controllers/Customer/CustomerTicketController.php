<?php

namespace App\Http\Controllers\Customer;

use App\Models\AdminTicket;
use Illuminate\Http\Request;
use App\Models\CustomerTicket;
use App\Http\Controllers\Controller;
use App\Services\TicketCountService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // For transaction management

class CustomerTicketController extends Controller
{
    protected $countTickets;

    public function __construct(TicketCountService $countTickets)
    {
        $this->countTickets = $countTickets;
    }

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
        DB::beginTransaction();

        try {
            $requestedData = $request->validate([
                'subject' => 'required',
                'description' => 'required',
            ]);;

            $requestedData['user_id'] = Auth::id();

            $requestedData = $customerTicket->fill($requestedData)->save();

            AdminTicket::create([
                'customer_ticket_id' => $customerTicket->id,
                'review' => null,
                'status' => 'pending',
            ]);

            DB::commit();

            Toastr::success('Inserted successfully');
            return redirect()->route('customer-tickets.index');
        } catch (\Throwable $e) {
            DB::rollBack();

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

    public function dashboard()
    {
        $customerTickets = CustomerTicket::where('user_id', auth()->id())->with('latestAdminTicket')->get();
        $counts =  $this->countTickets->countStatuses($customerTickets);

        return view('backend.customer.dashboard', compact('counts'));
    }
}
