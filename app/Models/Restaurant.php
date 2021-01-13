<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name', 'location', 'owner_id', 'tables'
    ];

    protected $appends = [
        'slug'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function getSlugAttribute()
    {
        return url('/restos/menus/' . $this->id);
    }
}
