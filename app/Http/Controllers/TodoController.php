<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Repositories\Todo\TodoRepository;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;
    public function __construct(TodoRepository  $todo)
    {
        $this->todo = $todo;
    }

    public function getAllTodos()
    {
        $todos = $this->todo->getAll();
        return view('welcome')->with('todos',$todos);
    }

    public function store(Request $request)
    {
       // dd($request->except('_token'));
        $validateData = $request->validate([
            'text' => 'required',
        ]);
        $todos = $this->todo->create($request->except('_token'));
        return redirect('my-todo');
    }

    public function destroy(Request $request)
    {
        $id= $request->get('id');
        $this->todo->delete($id);
        return  redirect('my-todo');
    }

    public function update(Request $request)
    {
        $id= $request->get('id');
        $this->todo->update($id,$request->except('_token'));
        return  redirect('my-todo');
    }

    public function edit($id)
    {
        $todo = $this->todo->getById($id);
        return view('todo.edit')->with('todo',$todo);;
    }
}
