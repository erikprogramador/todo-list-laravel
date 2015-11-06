<?php

namespace ToDo\Services;

use Validator;
use ToDo\Contracts\NoteBookServiceInterface;
use ToDo\Contracts\NoteBookRepositoryInterface;

/**
 * @author Erik Vanderlei Fernandes
 * @author erik.vanderlei.programador@outlook.com
*/
class NoteBookService implements NoteBookServiceInterface
{

	protected $note;

	/**
	 * Method construct to class
	 * @param ToDo\Contracts\NoteBookRepositoryInterface $note
	*/
	public function __construct(NoteBookRepositoryInterface $note)
	{
		$this->note = $note;
	}

	/**
	 * Chama o método que retorna todos os Cadernos e retorna os cadernos recebidos
	 * @return \Illuminate\Database\Eloquent\Collection
	*/
	public function all()
	{
		return $this->note->all();
	}

	/**
	 * Valida o id e chama o método que retorna um caderno especifico e retorna um registro especifico
	 * @param int $id
	 * @return \Illuminate\Database\Eloquent\Collection 
	*/
	public function find($id)
	{
		if (empty($id)) {
			return array(
					'msg' => 'Não existe um Identificador, Por favor informe um identificador!',
					'status' => false
				);
		}

		return $this->note->find($id);
	}

	/**
	 * Valida as informações e cadastra um novo Caderno
	 * @param array $data
	 * @return array
	*/
	public function store($data)
	{
		if($this->validate($data)) {
			return array(
					'msg' => 'O nome do caderno é obrigatório, deve ter no maximo 255 caracteres e ser uma string!',
					'status' => false
				);
		}

		if (!$this->note->store($data)) {
			return array(
					'msg' => 'Ocorreu um problema ao cadastrar tente mais tarde!',
					'status' => false
				);
		}

		return array(
					'msg' => 'Caderno cadastrado com sucesso!',
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
					'msg' => 'Não existe um Identificador, Por favor informe um para atualizar!',
					'status' => false
				);
		}

		if (!$this->note->find($id)) {
			return array(
					'msg' => 'Identificador não encontrado!',
					'status' => false
				);	
		}

		if($this->validate($data)) {
			return array(
					'msg' => 'O nome do caderno é obrigatório, deve ter no maximo 255 caracteres e ser uma string!',
					'status' => false
				);
		}

		if (!$this->note->update($data, $id)) {
			return array(
					'msg' => 'Ocorreu um problema ao atualizar tente mais tarde!',
					'status' => false
				);
		}

		return array(
					'msg' => 'Caderno atualizado com sucesso!',
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
					'msg' => 'Não existe um Identificador, Por favor informe um para remover!',
					'status' => false
				);
		}

		if (!$this->note->find($id)) {
			return array(
					'msg' => 'Identificador não encontrado!',
					'status' => false
				);	
		}

		if (!$this->note->delete($id)) {
			return array(
					'msg' => 'Ocorreu um problema ao excluir tente mais tarde!',
					'status' => false
				);
		}

		return array(
					'msg' => 'Caderno removido com sucesso!',
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
				'name' => 'required|max:255|string'
			);

		$validator = Validator::make($data, $validate);

		return $validator->fails();
	}

}