<?php

namespace ToDo\Services;

use Validator;
use ToDo\Contracts\TaskServiceInterface;
use ToDo\Contracts\TaskRepositoryInterface;
use ToDo\Contracts\NoteBookServiceInterface;

/**
 * @author Erik Vanderlei Fernandes
 * @author erik.vanderlei.programador@outlook.com
*/
class TaskService implements TaskServiceInterface
{
	protected $task;
	protected $noteService;

	/**
	 * Metodo Construtor da classe
	 * @param ToDo\Cotracts\TaskRepositoryInterface $task
	*/
	public function __construct(TaskRepositoryInterface $task, NoteBookServiceInterface $noteService)
	{
		$this->task = $task;
		$this->noteService = $noteService;
	}

	/**
	 * Chama o método que retorna todos os Cadernos e retorna os cadernos recebidos
	 * @return \Illuminate\Database\Eloquent\Collection
	*/
	public function all()
	{
		return $this->task->all();
	}

	/**
	 * Valida o id e chama o método que retorna um caderno especifico e retorna um registro especifico
	 * @param int $id
	 * @return \Illuminate\Database\Eloquent\Collection 
	*/
	public function find($id)
	{
		return $this->task->find($id);
	}

	/**
	 * Valida as informações e cadastra uma nova Tarefa
	 * @param array $data
	 * @return array
	*/
	public function store($data)
	{
		if ($this->validate($data)) {
			return array(
					'msg' => 'Informações invalidas!',
					'status' => false
				);
		}

		if (!$this->task->store($data)) {
			return array(
					'msg' => 'Não foi possivel cadastrar a tarefa!',
					'status' => false
				);
		}

		return array(
				'msg' => 'Tarefa cadastrada com sucesso!',
				'status' => true
			);
	}

	/**
	 * Valida as informações e atualiza um Caderno
	 * @param array $data
	 * @param int $id
	 * @return boolean
	*/
	public function update($data, $id)
	{
		if (empty($id)) {
			return array(
					'msg' => 'Não existe um identificador da tarefa!',
					'status' => false
				);
		}

		if (!$this->find($id)) {
			return array(
					'msg' => 'Identificador não existe!',
					'status' => false
				);
		}

		if ($this->validate($data)) {
			return array(
					'msg' => 'Informações invalidas!',
					'status' => false
				);
		}

		if (!$this->task->update($data, $id)) {
			return array(
					'msg' => 'Não foi possivel atualizar a tarefa!',
					'status' => false
				);
		}

		return array(
				'msg' => 'Tarefa atualizado com sucesso!',
				'status' => true
			);
	}

	/**
	 * valida o id e exclui um Caderno
	 * @param int $id
	 * @return array
	*/
	public function delete($id)
	{
		if (empty($id)) {
			return array(
					'msg' => 'Não existe um identificador de tarefa!',
					'status' => false
				);
		}

		if (!$this->find($id)) {
			return array(
					'msg' => 'Não foi encontrado um identificador de tarefa!',
					'status' => false
				);
		}

		if (!$this->task->delete($id)) {
			return array(
					'msg' => 'Tarefa excluida com sucesso!',
					'status' => false
				);
		}

		return array(
				'msg' => 'Tarefa deletada com sucesso!',
				'status' => true
			);
	}

	/**
	 * Metodo para validação do form de Cadernos
	 * @param array $data
	 * @return boolean
	*/
	public function validate($data)
	{
		$validate = array(
				'title' => 'required|max:255|string',
				'description' => 'string',
				'note_books_id' => 'required|integer'
			);

		$validator = Validator::make($data, $validate);

		return $validator->fails();
	}

	/**
	 * Retorna apenas as notas de um caderno
	 * @param int $noteId
	 * @return \Illuminate\Database\Eloquent\Collection
	*/
	public function allToNote($noteId)
	{
		return $this->task->allToNote($noteId);
	}

	/**
	 * Define a tarefa como completa ou não
	 * @param int $id
	 * @return array $data
	*/
	public function complete($id)
	{
		if (empty($id)) {
			return array(
					'msg' => 'Não existe um identificador!',
					'status' => false
				);
		}

		if (!$this->find($id)) {
			return array(
					'msg' => '',
					'status' => false
				);
		}

		if (!$this->task->complete($id)) {
			return array(
					'msg' => 'Ocorreu um problema, por favor tente mais tarde!',
					'status' => false
				);
		}

		return array(
				'msg' => 'Tarefa alterado com sucesso!',
				'status' => true
			);
	}	
}
