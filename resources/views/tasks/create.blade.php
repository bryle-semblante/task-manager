@extends('layouts.app')

@section('content')
    <h3 style="font-family:'Lora',serif; font-weight:600; margin-top:0;">New task</h3>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="field">
            <label>Task name</label>
            <input type="text" name="task_name" value="{{ old('task_name') }}" required>
            @error('task_name') <small class="err">{{ $message }}</small> @enderror
        </div>

        <div class="field">
            <label>Description</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div class="field">
            <label>Status</label>
            <select name="status">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <div class="field">
            <label>Due date</label>
            <input type="date" name="due_date" value="{{ old('due_date') }}">
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">Save task</button>
            <a href="{{ route('tasks.index') }}" class="cancel">cancel</a>
        </div>
    </form>
@endsection
