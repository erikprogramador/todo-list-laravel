<?php

namespace ToDo\Validators;

use Validator;
use ToDo\Contracts\ValidatorInterface;

/**
 * @author Erik Vanderlei Fernandes
 * @author erik.vanderlei.programador@outlook.com
*/
class NoteBookValidator implements ValidatorInterface
{
	
	/**
	 * Método que valida o formulario enviado
	 * @param array $data Atributo com o array de informações passadas pelo formulario
	 * @return boolean Retorna um boolean conforme o que foi retornado pelo validator
	*/
	public function formValidate($data)
	{
		$validate = array(
				'name' => 'required|max:255|string'
			);

		$validator = Validator::make($data, $validate);

		return $validator->fails();
	}
}
