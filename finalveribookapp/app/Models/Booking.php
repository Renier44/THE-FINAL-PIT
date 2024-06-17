<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'email', 
        'checkin', 
        'checkout', 
        'room', 
        'adults', // Assuming 'guests' might actually be 'adults'
        'children', // Assuming you meant 'children' instead of 'requests'
    ];

    // If you want to customize the table name or primary key:
    protected $table = 'bookings'; // Specify the table name if different from "bookings"
    protected $primaryKey = 'id'; // Specify the primary key if different from "id"
}
