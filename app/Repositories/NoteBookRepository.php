<?php

namespace ToDo\Repositories;

use ToDo\Contracts\NoteBookRepositoryInterface;
use ToDo\Models\NoteBook;

/**
 * @author Erik Vanderlei Fernandes
 * @author erik.vanderlei.programador@outlook.com
*/
class NoteBookRepository extends BaseRepository implements NoteBookRepositoryInterface
{

	protected $entity;

	/**
	 * Method construct to class
	 * @param ToDo\Models\NoteBook $entity
	*/
	public function __construct(NoteBook $entity)
	{
		$this->entity = $entity;
	}

}