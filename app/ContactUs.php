<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
	protected $table		= 'contact_us';
	protected $primaryKey	= 'phone';
	protected $fillable		= [
		'email', 'address'];
    //
}
