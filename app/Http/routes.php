<?php

/**
 * NoteBook
*/
$configNote = [
	'getIndex' => 'note.index',
	'postSalvar' => 'note.store',
	'getExibir' => 'note.show',
	'postAtualizar' => 'note.update',
	'getRemover' => 'note.delete'
];

Route::controller('note', 'NoteBookController', $configNote);

/**
 *	Task
*/
$configTask = [
	'getIndex' => 'task.note',
	'getListar' => 'task.index',
	'postSalvar' => 'task.store',
	'getExibir' => 'task.show',
	'postAtualizar' => 'task.update',
	'getRemover' => 'task.delete',
	'getComplete' => 'task.complete'
];

Route::controller('task', 'TaskController', $configTask);

Route::get('/', function () {
    return redirect()->route('note.index');
});
