@extends('layouts.app')

@section('content')
    <style>
        .row-head {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 18px;
        }
        .row-head a.new {
            font-size: 0.9rem;
            color: var(--accent);
            text-decoration: none;
            border-bottom: 1px solid var(--accent);
            padding-bottom: 1px;
        }
        .task-row {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 16px;
            padding: 14px 0;
            border-bottom: 1px dashed var(--rule);
        }
        .task-main { display: flex; gap: 10px; align-items: flex-start; }
        .status-dot {
            width: 11px; height: 11px;
            border-radius: 50%;
            margin-top: 5px;
            flex-shrink: 0;
        }
        .status-dot.pending { border: 2px solid var(--pending); }
        .status-dot.completed { background: var(--completed); border: 2px solid var(--completed); }
        .task-name { font-weight: 500; }
        .task-desc { color: var(--ink-soft); font-size: 0.85rem; margin-top: 2px; }
        .task-due { font-family: 'Inter', monospace; font-size: 0.8rem; color: var(--ink-soft); margin-top: 4px; }
        .task-actions { display: flex; gap: 10px; align-items: center; white-space: nowrap; }
        .btn-ink {
            background: none; border: none; cursor: pointer;
            font-family: 'Inter', sans-serif; font-size: 0.85rem;
            color: var(--accent); padding: 0;
            border-bottom: 1px solid transparent;
        }
        .btn-ink:hover { border-bottom-color: var(--accent); }
        .btn-ink.danger { color: var(--danger); }
        .btn-ink.danger:hover { border-bottom-color: var(--danger); }
        .empty { color: var(--ink-soft); font-size: 0.9rem; padding: 20px 0; }
    </style>

    <div class="row-head">
        <span style="color: var(--ink-soft); font-size: 0.85rem;">
            {{ $tasks->count() }} {{ $tasks->count() === 1 ? 'task' : 'tasks' }}
        </span>
        <a href="{{ route('tasks.create') }}" class="new">+ add a task</a>
    </div>

    @forelse ($tasks as $task)
        <div class="task-row">
            <div class="task-main">
                <span class="status-dot {{ $task->status === 'Completed' ? 'completed' : 'pending' }}"></span>
                <div>
                    <div class="task-name">{{ $task->task_name }}</div>
                    @if ($task->description)
                        <div class="task-desc">{{ $task->description }}</div>
                    @endif
                    @if ($task->due_date)
                        <div class="task-due">due {{ $task->due_date }}</div>
                    @endif
                </div>
            </div>

            <div class="task-actions">
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn-ink">edit</a>

                <form action="{{ route('tasks.updateStatus', $task->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn-ink">
                        {{ $task->status === 'Pending' ? 'mark done' : 'reopen' }}
                    </button>
                </form>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                      onsubmit="return confirm('Delete this task?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn-ink danger">delete</button>
                </form>
            </div>
        </div>
    @empty
        <p class="empty">Nothing on the list yet — add your first task above.</p>
    @endforelse
@endsection
