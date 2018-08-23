<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Brands;
use App\Models\Category;

class Products extends Model
{
    protected $table		= 'products';
	protected $primaryKey	= 'products_id';
	protected $fillable		= [
		'category_id','name','brand_id','weight','price','details','status','image_1','image_2','image_3','created_at','updated_at'];

public function brand()
    {
        return $this->belongsTo('App\Models\Brands', 'brand_id');
    }

public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

public function getActionButtonAttribute()
    {
        
        $delUrl  = route('backend.products.delete', $this->id);
        //edButton from \App\Helpers.php
        return edButton($editUrl, $delUrl);
    }

}