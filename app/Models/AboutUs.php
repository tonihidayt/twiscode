<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table		= 'about_us';
	protected $primaryKey	= 'about_id';
	protected $fillable		= [
		'history','history_img', 'goals', 'goals_img', 'awards', 'awards_img'];
}
