@extends('layouts.app')

@section('content')
    <h3 style="font-family:'Lora',serif; font-weight:600; margin-top:0;">Edit task</h3>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label>Task name</label>
            <input type="text" name="task_name" value="{{ $task->task_name }}" required>
        </div>

        <div class="field">
            <label>Description</label>
            <textarea name="description">{{ $task->description }}</textarea>
        </div>

        <div class="field">
            <label>Status</label>
            <select name="status">
                <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="field">
            <label>Due date</label>
            <input type="date" name="due_date" value="{{ $task->due_date }}">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Update task</button>
            <a href="{{ route('tasks.index') }}" class="cancel">cancel</a>
        </div>
    </form>
@endsection
