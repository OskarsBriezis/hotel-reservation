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
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'from',
        'till',
        'room_id',
    ];
}