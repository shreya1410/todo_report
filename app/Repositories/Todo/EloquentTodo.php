<?php


namespace App\Repositories\Todo;


use App\Models\Todo;

class EloquentTodo implements TodoRepository
{
    private  $model;

    public function __construct(Todo $model)
    {
            $this->model= $model;
    }

    public function getAll()
    {
            return $this->model->all();
    }

    public function getById($id)
    {
            return $this->model->find($id);
    }

    public function create(array $attributes)
    {
        $this->model->create($attributes);
    }

    public function update($id, array $attributes)
    {
        $todo = $this->model->findOrFail($id);
        $todo->update($attributes);
        return $todo;
    }

    public function delete($id)
    {
        $this->model->find($id)->delete();
        return true;

    }
}
