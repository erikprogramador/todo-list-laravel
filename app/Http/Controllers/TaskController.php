<?php

namespace ToDo\Http\Controllers;

use Illuminate\Http\Request;
use ToDo\Http\Requests;
use ToDo\Http\Controllers\Controller;
use ToDo\Contracts\TaskServiceInterface;

class TaskController extends Controller
{
    protected $taskService;

    /**
     * Method construct to class
    */
    public function __construct(TaskServiceInterface $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     *
    */
    public function getIndex()
    {
        return redirect()->route('note.index')->with('msg', 'Não existe um identificador');
    }

    /**
     * Display a listing of the resource.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getListar($id)
    {
        return view('task.home')->with([
                'tasks' => $this->taskService->allToNote($id),
                'noteId' => $id
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postSalvar(Request $request)
    {
        $result = $this->taskService->store($request->all());
        return back()->with('msg', $result['msg']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getExibir($id)
    {
        $result = $this->taskService->find($id);
        return back()->with('show', $result[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postAtualizar(Request $request, $id)
    {
        $result = $this->taskService->update($request->all(), $id);
        return back()->with('msg', $result['msg']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getRemover($id)
    {
        $result = $this->taskService->delete($id);
        return back()->with('msg', $result['msg']);
    }

    /**
     *
    */
    public function getComplete($id)
    {
        $result = $this->taskService->complete($id);
        return back()->with('msg', $result['msg']);
    }
}
