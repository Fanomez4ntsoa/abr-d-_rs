<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friendships extends Model
{
    use HasFactory;

    protected $table = 'friendships';

    protected $casts = [
        'is_accepted' => 'boolean',
        'accepted_at' => 'datetime',
    ];

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'requester',
        'accepter', 
        'importance', 
        'is_accepted', 
        'accepted_at', 
        'created_at', 
        'updated_at'
    ];

    public function getFriend(){
        return $this->belongsTo(User::class,'requester');
    }

    public function getFriendAccepter(){
        return $this->belongsTo(User::class,'accepter');
    }

    public function scopeAccepted($query, $userId)
    {
        return $query->where(function ($q) use ($userId) {
            $q->where('requester', $userId)
              ->orWhere('accepter', $userId);
        })->where('is_accepted', 1);
    }
}
