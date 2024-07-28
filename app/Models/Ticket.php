<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'author_id', 'authorName', 'ticketTitle', 'description', 'attachment', 'severity', 'status', 'closedBy',
    ];

    use HasFactory;
}
