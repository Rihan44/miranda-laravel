<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Room;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'room_id', 'type', 'description'];
    public $timestamps = false;

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function room(): BelongsTo 
    {
        return $this->belongsTo(Room::class);
    }

    public static function orders_type() 
    {
        $types = ['Food', 'Mini Bar', 'Movie', 'Tour', 'Private Pool'];
        return $types;
    }
}
