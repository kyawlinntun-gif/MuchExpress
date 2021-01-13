<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $with = [
        'category'
    ];

    protected $fillable= [
        'name', 'description', 'price', 'resto_id', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
