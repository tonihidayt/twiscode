<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMail extends Model
{
    protected $table		= 'contact_mail';
	protected $primaryKey	= 'contact_id';
	protected $fillable		= [
		'email', 'phone','name','message','created_at','updated_at'];


	
}
