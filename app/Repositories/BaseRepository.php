<?php

namespace ToDo\Repositories;

use ToDo\Contracts\BaseInterface;

/**
* 
*/
abstract class BaseRepository implements BaseInterface
{
	protected $entity;

	/**
	 * Retorna todos os dados relativo a entidade
	 * @return \Illuminate\Database\Eloquent\Collection
	*/
	public function all()
	{
		return $this->entity->all();
	}

	/**
	 * Retorna um registro especifico
	 * @param int $id
	 * @return \Illuminate\Database\Eloquent\Collection 
	*/
	public function find($id)
	{
		return $this->entity->find([$id]);
	}

	/**
	 * Cadastra um novo registro
	 * @param array $data
	 * @return boolean
	*/
	public function store($data)
	{
		$this->entity->fill($data);
		
		if ($this->entity->save()) {
			return true;
		}

		return false;
	}

	/**
	 * Atualiza um registro
	 * @param array $data
	 * @param int $id
	 * @return boolean
	*/
	public function update($data, $id)
	{
		$noteUpdate = $this->find($id);

		$noteUpdate[0]->fill($data);

		if ($noteUpdate[0]->save()) {
			return true;
		}

		return false;
	}

	/**
	 * Exclui um registro
	 * @param int $id
	 * @return boolean
	*/
	public function delete($id)
	{
		$noteDestroy = $this->find($id);
		
		if ($noteDestroy[0]->destroy($id)) {
			return true;
		}

		return false;
	}
}
