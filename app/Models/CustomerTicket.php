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
}
