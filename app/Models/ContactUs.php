<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table		= 'contact_us';
	protected $primaryKey	= 'contact_id';
	protected $fillable		= [
		'phone','email', 'address'];//
}
