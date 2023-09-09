<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id ',
        'subcategory_id Index',
        'brand_id',
        'admin_id',
        'product_name',
        'product_slug',
        'product_code',
        'purchase_price',
        'discount_price',
        'stock_quantity',
        'description',
        'product_image',
        'weight',
        'size',
        'color',
        'offers',
        'status',
    ];


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Models\SubCategory');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function admin()
    {
        return $this->belongsTo('App\Models\Admin');
    }





}