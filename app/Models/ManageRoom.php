<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ManageRoom extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    
    use HasFactory;
    protected $guard = 'admin';
    protected $table = 'manage_rooms';
    protected $fillable = [
        'room_number',
        'room_type',
        'room_description',
        'max_capacity',
        'amenities',
        'status',
        'rate',
        'photos',
    ];
}
