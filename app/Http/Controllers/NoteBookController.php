<?php

namespace ToDo\Http\Controllers;

use Illuminate\Http\Request;
use ToDo\Http\Requests;
use ToDo\Http\Controllers\Controller;
use ToDo\Contracts\NoteBookServiceInterface;

/**
 * @author Erik Vanderlei Fernandes
 * @author erik.vanderlei.programador@outlook.com
*/
class NoteBookController extends Controller
{
    protected $noteService;

    /**
     * Method construct to class
    */
    public function __construct(NoteBookServiceInterface $noteService)
    {
        $this->noteService = $noteService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('book.home')->with(['notes' => $this->noteService->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postSalvar(Request $request)
    {
        $result = $this->noteService->store($request->all());
        return redirect()->route('note.index')->with('msg', $result['msg']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getExibir($id)
    {
        return redirect()->route('task.index', [$id]);
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
        $result = $this->noteService->update($request->all(), $id);
        return redirect()->route('note.index')->with('msg', $result['msg']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getRemover($id)
    {
        $result = $this->noteService->delete($id);
        return redirect()->route('note.index')->with('msg', $result['msg']);
    }
}
