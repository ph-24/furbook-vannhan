<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
	protected $fillable = ['name','date_of_birth','breed_id','user_id'];//khai bao field dc phep insert

	public function breed(){
		return $this->belongsTo('Furbook\breed');
	}

	/**
 * Get the route key for the model.
 *
 * @return string
 */
	public function getRouteKeyName()
	{
		return 'id';
	}
}
