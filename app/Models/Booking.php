<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['guest', 'phone_number', 'order_date', 'check_in', 'check_out', 'special_request', 'price', 'email', 'room_id'];

    public $timestamps = false;
}
