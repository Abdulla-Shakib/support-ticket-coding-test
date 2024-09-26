<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminTicket extends Model
{
    use HasFactory;

    protected $table = 'admin_tickets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'customer_ticket_id',
        'review',
        'status',
    ];

    public function customerTicket()
    {
        return $this->belongsTo(CustomerTicket::class, 'customer_ticket_id', 'id');
    }
}
