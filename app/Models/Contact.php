<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';
    public $timestamps = false;
    
    protected $fillable = ['name', 'email', 'phone', 'email_subject', 'email_description', 'date', 'date_time', 'is_archived'];
}
