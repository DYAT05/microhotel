<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walkin_Reservations extends Model
{
    use HasFactory;
    public function frontdesk()
    {
        return $this->belongsTo(User::class, 'frontdesk_id');
    }

    public function room()
    {
        return $this->belongsTo(Manage_Room::class, 'room_id');
    }
}
