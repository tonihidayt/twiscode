<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table		= 'Promo';
	protected $primaryKey	= 'promo_id';
	protected $fillable		= [
		'products_id','detail_promo','created_at','updated_at'];

	public function getActionButtonAttribute()
    {
        $editUrl = route('backend.promo.edit', $this->id);
        $delUrl  = route('backend.promo.delete', $this->id);
        //edButton from \App\Helpers.php
        return edButton($editUrl, $delUrl);
    }
}
