<?php

namespace App\Repositories\Eloquent;

use App\Models\Task;

class TaskRepository extends EloquentRepository
{
    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function getAllSorted()
    {
        return $this->model->orderBy('completed')->orderBy('due_date', 'ASC')->get();
    }

    public function complete($id)
    {
        $this->model = $this->findOrFail($id);

        if ($this->model->completed) {
            $this->model->update(['completed' => false]);
        } else {
            $this->model->update(['completed' => true]);
        }
    }
}
