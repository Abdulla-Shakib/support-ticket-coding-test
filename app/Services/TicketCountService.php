<?php

namespace App\Services;

class TicketCountService
{

    public function countStatuses($customerTickets)
    {
        return  [
            'pending' => $customerTickets->filter(function ($ticket) {
                return optional($ticket->latestAdminTicket)->status === 'pending';
            })->count(),

            'open' => $customerTickets->filter(function ($ticket) {
                return optional($ticket->latestAdminTicket)->status === 'open';
            })->count(),

            'in-progress' => $customerTickets->filter(function ($ticket) {
                return optional($ticket->latestAdminTicket)->status === 'in-progress';
            })->count(),

            'closed' => $customerTickets->filter(function ($ticket) {
                return optional($ticket->latestAdminTicket)->status === 'closed';
            })->count(),

            'done' => $customerTickets->filter(function ($ticket) {
                return optional($ticket->latestAdminTicket)->status === 'done';
            })->count(),
        ];
    }
}
