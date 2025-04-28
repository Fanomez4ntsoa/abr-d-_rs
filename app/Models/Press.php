<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Press extends Model
{
    protected $table = 'press';
    
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'thumbnail',
        'banner',
        'status',
        'tag',
        'view',
    ];

    public function category()
    {
        return $this->belongsTo(Presscategory::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}