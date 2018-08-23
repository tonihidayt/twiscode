<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admins extends Authenticatable
{
    protected $table		= 'admins';
	protected $primaryKey	= 'admin_id';
	protected $fillable		= [
		'username','password','email','status','name','remember_token','created_at','updated_at'];


    protected $hidden = [
        'password', 'remember_token',
    ];


	public function getActionButtonAttribute()
    {
        $editUrl = route('backend.admins.edit', $this->id);
        $delUrl  = route('backend.admins.delete', $this->id);
        //edButton from \App\Helpers.php
        return edButton($editUrl, $delUrl);
    }
}
