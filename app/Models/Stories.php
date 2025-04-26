<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stories extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';

    protected $primaryKey = 'story_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'story_id', 
        'user_id', 
        'publisher', 
        'publisher_id', 
        'privacy', 
        'content_type', 
        'description', 
        'created_at', 
        'updated_at', 
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE)
                     ->where('created_at', '>=', now()->subDay());
    }

    public function scopeForTimeline($query, $userId)
    {
        return $query->where(function ($q) use ($userId) {
            $q->where('user_id', $userId)
              ->orWhereIn('user_id', function ($q2) use ($userId) {
                  $q2->select('accepter')
                     ->from('friendships')
                     ->where('requester', $userId)
                     ->where('is_accepted', 1)
                     ->union(
                         DB::table('friendships')
                           ->select('requester')
                           ->where('accepter', $userId)
                           ->where('is_accepted', 1)
                     );
              });
        })->where('privacy', '!=', 'private');
    }
}
