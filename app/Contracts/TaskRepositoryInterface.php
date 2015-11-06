<?php

namespace ToDo\Contracts;

interface TaskRepositoryInterface extends BaseInterface
{
	public function allToNote($noteId);
}