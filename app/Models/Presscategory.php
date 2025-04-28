<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presscategory extends Model
{
    use HasFactory;

    protected $table = 'presscategories';

    protected $fillable = ['name'];

    public function presses()
    {
        return $this->hasMany(Press::class, 'category_id');
    }
}