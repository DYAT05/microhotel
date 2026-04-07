<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Manage_Room extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public function photos()
    {
        return $this->hasMany(Manage_Room::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
