<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    // In app/Models/Reservation.php
protected $fillable = [
    'user_id', 'room_id', 'first_name', 'last_name', 'email', 'phone_number', 'from', 'till', 'status'
];

}
