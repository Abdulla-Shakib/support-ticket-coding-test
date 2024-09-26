<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTicket extends Model
{
    use HasFactory;

    protected $table = 'customer_tickets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'subject',
        'description',
    ];

    public function scopeSearchAdmin($query, $request)
    {
        return $query->where('subject', 'LIKE', '%' . $request->search . '%')
            ->orWhere('description', 'LIKE', '%' . $request->search . '%')
            ->orWhereHas('user', function ($q) use ($request) {
                $q->where('name', 'LIKE', '%' . $request->search . '%');
            });
    }

    public function scopeSearchCustomer($query, $request)
    {
        return $query->where('subject', 'LIKE', '%' . $request->search . '%')
            ->orWhere('description', 'LIKE', '%' . $request->search . '%')
        ;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function latestAdminTicket()
    {
        return $this->hasOne(AdminTicket::class, 'customer_ticket_id', 'id')->latest();
    }
}
