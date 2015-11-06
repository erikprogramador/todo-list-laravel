<?php

namespace ToDo\Models;

use Illuminate\Database\Eloquent\Model;

class NoteBook extends Model
{
	/**
	 * Objeto fillable permite o acesso as informações usando mass assignment
	*/
	protected $fillable = [
		'name'
	];

	/**
	 * Metodo de ligação de models para uso de foreign keys
	*/
	public function tasks()
	{
		return $this->hasMany('ToDo\Models\Tasks');
	}

}
