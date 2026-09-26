<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Task Manager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --paper: #FBF9F4;
            --ink: #23262B;
            --ink-soft: #6B6A62;
            --rule: #D8D2C2;
            --margin: #B5443C;
            --accent: #1D3557;
            --pending: #B5651D;
            --completed: #3A7D44;
            --danger: #A33A3A;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            background: #EFEBE0;
            font-family: 'Inter', system-ui, sans-serif;
            color: var(--ink);
        }
        header.site {
            padding: 28px 24px 0;
            text-align: center;
        }
        header.site h1 {
            font-family: 'Lora', Georgia, serif;
            font-weight: 600;
            font-size: 1.6rem;
            margin: 0;
        }
        header.site p {
            color: var(--ink-soft);
            font-size: 0.9rem;
            margin: 4px 0 0;
        }
        .page {
            position: relative;
            max-width: 760px;
            margin: 32px auto 64px;
            padding: 32px 32px 32px 76px;
            background: var(--paper);
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
        }
        .page::before {
            content: '';
            position: absolute;
            left: 48px;
            top: 0;
            bottom: 0;
            width: 2px;
            background: var(--margin);
            opacity: 0.55;
        }
        .flash {
            background: #EAF4EC;
            border-left: 3px solid var(--completed);
            padding: 10px 14px;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        a.plain { color: inherit; text-decoration: none; }

        /* form field styling, shared by create + edit */
        .field { margin-bottom: 18px; }
        .field label {
            display: block; font-size: 0.8rem; color: var(--ink-soft);
            margin-bottom: 4px;
        }
        .field input, .field textarea, .field select {
            width: 100%; border: none; border-bottom: 1px solid var(--rule);
            background: transparent; padding: 6px 2px; font-family: 'Inter', sans-serif;
            font-size: 0.95rem; color: var(--ink);
        }
        .field input:focus, .field textarea:focus, .field select:focus {
            outline: none; border-bottom-color: var(--accent);
        }
        .field textarea { resize: vertical; min-height: 60px; }
        .field small.err { color: var(--danger); font-size: 0.78rem; }
        .form-actions { margin-top: 24px; display: flex; gap: 16px; align-items: center; }
        .btn-primary {
            background: var(--accent); color: #fff; border: none;
            padding: 8px 18px; font-family: 'Inter', sans-serif; font-size: 0.9rem;
            cursor: pointer;
        }
        .btn-primary:hover { opacity: 0.9; }
        a.cancel { color: var(--ink-soft); font-size: 0.85rem; text-decoration: none; }
    </style>
</head>
<body>

    <header class="site">
        <a href="{{ route('tasks.index') }}" class="plain"><h1>Task Manager</h1></a>
        <p>a running list, kept in order</p>
    </header>

    <div class="page">
        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

</body>
</html>
