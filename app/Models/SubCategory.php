<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcat_name',
        'subcat_slug',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}