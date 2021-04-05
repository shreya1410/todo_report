<?php

namespace App\Http\Controllers;

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
        return $this->todo->getAll();
    }
}
