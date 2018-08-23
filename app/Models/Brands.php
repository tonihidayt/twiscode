<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    protected $table		= 'brands';
    protected $primaryKey	= 'brand_id';
	protected $fillable		= [
		'name'];


	public function getActionButtonAttribute()
    {
        $editUrl = route('backend.brands.edit', $this->id);
        $delUrl  = route('backend.brands.delete', $this->id);
        //edButton from \App\Helpers.php
        return edButton($editUrl, $delUrl);
    }
	
    }

