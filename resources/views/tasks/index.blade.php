@extends('app')

@section('content')
<div id="taskList">
    <div class="add-task">
        <button class="submit-task" data-toggle="modal" data-target="#exampleModal"></button>
    </div>
    <ul class="task-list">
        @foreach ($tasks as $task)
        <li class="task-list-item">
            <label class="task-list-item-label">
                <input class="mark-as-done" type="checkbox" {{ $task->completed ? 'checked':''}} data-id="{{
                $task->id}}">
                <span>{{ $task->title}}</span>
            </label>
            <span class="delete-btn delete-task" title="Delete Task" data-id={{ $task->id }}></span>
        </li>
        @endforeach
    </ul>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                    action="{{ route('tasks.store') }}">
                    <div class="modal-body">
                        @csrf
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="title">Title</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" name="title" required>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="due_date">Due Date</span>
                            </div>
                            <input type="date" class="form-control" aria-label="Small"
                                aria-describedby="inputGroup-sizing-sm" name="due_date" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="button-47" data-dismiss="modal" type="button">Close</button>
                        <button class="button-1" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection