<?php

namespace ToDo\Contracts;

/**
 * @author Erik Vanderlei Fernandes
 * @author erik.vanderlei.programador@outlook.com
*/
interface BaseInterface
{
	public function all();
	public function find($id);
	public function store($data);
	public function update($data, $id);
	public function delete($id);
}