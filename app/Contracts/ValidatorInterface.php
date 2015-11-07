<?php

namespace ToDo\Contracts;

interface ValidatorInterface
{
	public function formValidate($data);
}