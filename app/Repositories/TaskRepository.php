<?php

namespace ToDo\Repositories;

use ToDo\Contracts\TaskRepositoryInterface;
use ToDo\Models\Task;

/**
 * @author Erik Vanderlei Fernandes
 * @author erik.vanderlei.programador@outlook.com
*/
class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
	protected $entity;

	/**
	 * Metodo Construtor da classe
	 * @param ToDo\Models\Task $entity
	*/
	public function __construct(Task $entity)
	{
		$this->entity = $entity;
	}

	/**
	 * Retorna apenas as tarefas de um caderno especifico
	 * @param int $noteId
	 * @return \Illuminate\Database\Eloquent\Collection
	*/
	public function allToNote($noteId)
	{
		return $this->all()->where('note_books_id', $noteId);
	}

	/**
	 * Altera o status de uma tarefa para completo ou não completo
	 * @param int $id
	 * @return boolean
	*/
	public function complete($id)
	{
		$taskComplete = $this->find($id);

		$taskComplete[0]->complete = !$taskComplete[0]->complete;

		if ($taskComplete[0]->save()) {
			return true;
		}

		return false;
	}
}
