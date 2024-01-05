<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'full_name',
        'type',
        'room_number',
        'check_in',
        'check_out',
        'phone_number',
        'email',
        'message',
        'status',
    ];
}
