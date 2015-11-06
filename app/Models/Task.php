<?php

namespace ToDo\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

	/**
	 * Objeto fillable permite o acesso as informações usando mass assignment
	*/
	protected $fillable = [
		'title',
		'description',
		'complete',
		'note_books_id'
	];

	/**
	 * Metodo de ligação de models para uso de foreign keys
	*/
	public function noteBook()
	{
		return $this->belongsTo('ToDo\Models\NoteBook');
	}

}
