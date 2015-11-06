<?php

namespace ToDo\Contracts;

interface TaskServiceInterface extends BaseInterface
{
	public function allToNote($noteId);
}