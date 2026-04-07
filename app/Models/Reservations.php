<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    public function guest()
    {
        return $this->belongsTo(User::class, 'guest_id');
    }
    public function room()
    {
        return $this->belongsTo(Manage_Room::class, 'room_id');
    }
    public function guestInformation() {

        return $this->belongsTo(GuestInformation::class);
        
    }    
}
