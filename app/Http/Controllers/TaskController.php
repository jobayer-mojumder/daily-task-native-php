<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Eloquent\TaskRepository;

class TaskController extends Controller
{
    public function __construct(private TaskRepository $taskRepository)
    {
    }
    public function index()
    {
        $tasks = $this->taskRepository->getAllSorted();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $this->taskRepository->create($request);
        return redirect()->route('tasks.index');
    }

    public function show(int $id)
    {
        $task = $this->taskRepository->findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function edit(int $id)
    {
        $task = $this->taskRepository->findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, int $id)
    {
        $this->taskRepository->findOrFail($id)->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function destroy(int $id)
    {
        $this->taskRepository->destroy($id);
        return response()->json(['success' => 'Deleted Successfully!']);
    }

    public function complete(int $id)
    {
        $this->taskRepository->complete($id);
        return redirect()->route('tasks.index');
    }
}
