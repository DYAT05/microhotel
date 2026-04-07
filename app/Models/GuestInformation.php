<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuestInformation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'payment_status'
    ];
    public function reservation()
    {
        return $this->belongsTo(Reservations::class);
    }

    public function manage_room()
    {
        return $this->belongsTo(Manage_Room::class);
    }
}
