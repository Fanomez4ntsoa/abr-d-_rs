<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Posts extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 'active';
    const PRIVACY_PUBLIC = 'public';
    const PUBLISHER_PAID_CONTENT = 'paid_content';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'post_id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'post_id', 
        'user_id', 
        'publisher', 
        'publisher_id', 
        'post_type', 
        'privacy', 
        'tagged_user_ids', 
        'feel_and_activity', 
        'location', 
        'description', 
        'user_reacts', 
        'status', 
        'created_at', 
        'updated_at',
        'album_image_id'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function media_files()
    {
        return $this->hasMany(Media_files::class, 'post_id', 'post_id');
    }

    public function scopeActive($query)
    {
        return $query
                ->where('status', self::STATUS_ACTIVE)
                ->where('report_status', '0')
                ->where('publisher', '!=', self::PUBLISHER_PAID_CONTENT);
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
            })
            ->orWhere(function ($q3) use ($userId) {
                $q3->where('privacy', self::PRIVACY_PUBLIC)
                    ->whereIn('publisher_id', function ($q4) use ($userId) {
                        $q4->select('follow_id')
                            ->from('followers')
                            ->where('user_id', $userId)
                            ->whereIn('publisher', ['post', 'profile_picture', 'page', 'group']);
                    })
                    ->orWhereExists(function ($q5) use ($userId) {
                        $q5->select(DB::raw(1))
                            ->from('group_members')
                            ->whereColumn('group_members.group_id', 'posts.publisher_id')
                            ->where('group_members.user_id', $userId)
                            ->where('posts.publisher', 'group');
                    });
            });
        })->where('privacy', '!=', 'private');
    }
    
}
