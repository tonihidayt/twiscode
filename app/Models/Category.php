<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table		= 'category';
	protected $primaryKey	= 'category_id';
	protected $fillable		= [
		'name'];
	protected $append		= ['action_button'];



	public function getActionButtonAttribute()
    {
        $editUrl = route('backend.category.edit', $this->id);
        $delUrl  = route('backend.category.delete', $this->id);
        //edButton from \App\Helpers.php
        return edButton($editUrl, $delUrl);
    }
}
