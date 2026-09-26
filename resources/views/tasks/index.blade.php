<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #fdf2f8);
            color: #1f2937;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 240px;
            height: 100vh;
            padding: 30px 18px;
            background: linear-gradient(180deg, #4f46e5, #7c3aed);
            color: white;
            box-shadow: 4px 0 20px rgba(79, 70, 229, 0.2);
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 40px;
        }

        .logo span {
            display: block;
            font-size: 35px;
            margin-bottom: 8px;
        }

        .nav-item {
            display: block;
            color: #e0e7ff;
            text-decoration: none;
            padding: 14px 16px;
            border-radius: 12px;
            margin-bottom: 10px;
            transition: 0.3s ease;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.18);
            color: white;
            transform: translateX(5px);
        }

        .nav-item.active {
            background: white;
            color: #4f46e5;
            font-weight: bold;
        }

        /* MAIN */
        .main {
            margin-left: 240px;
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .topbar h1 {
            margin: 0;
            font-size: 32px;
        }

        .topbar p {
            color: #6b7280;
            margin-top: 8px;
        }

        /* BUTTON */
        .add-button {
            display: inline-block;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: white;
            text-decoration: none;
            padding: 13px 20px;
            border-radius: 12px;
            font-weight: bold;
            box-shadow: 0 8px 18px rgba(79, 70, 229, 0.25);
            transition: 0.3s ease;
        }

        .add-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(79, 70, 229, 0.35);
        }

        .add-button:active {
            transform: translateY(0);
        }

        /* SUCCESS MESSAGE */
        .success {
            background: linear-gradient(135deg, #dcfce7, #d1fae5);
            color: #166534;
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 25px;
            border-left: 5px solid #22c55e;
            animation: slideDown 0.4s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* STAT CARDS */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            padding: 24px;
            border-radius: 18px;
            color: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 28px rgba(0, 0, 0, 0.12);
        }

        .total-card {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
        }

        .pending-card {
            background: linear-gradient(135deg, #f59e0b, #f97316);
        }

        .completed-card {
            background: linear-gradient(135deg, #10b981, #14b8a6);
        }

        .stat-title {
            font-size: 14px;
            opacity: 0.9;
        }

        .stat-number {
            font-size: 35px;
            font-weight: bold;
            margin-top: 8px;
        }

        /* TASK CONTAINER */
        .tasks-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 28px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .tasks-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .tasks-header h2 {
            margin: 0;
        }

        /* TASK CARD */
        .task-card {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            border: 2px solid #f1f5f9;
            border-radius: 15px;
            margin-bottom: 14px;
            background: white;
            transition: 0.3s ease;
        }

        .task-card:hover {
            transform: translateY(-3px);
            border-color: #c7d2fe;
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.1);
        }

        .task-info {
            flex: 1;
        }

        .task-name {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .description {
            color: #6b7280;
            font-size: 14px;
        }

        .due-date {
            color: #64748b;
            font-size: 13px;
            margin-top: 9px;
        }

        /* STATUS */
        .status-form {
            margin: 0;
        }

        .status-form select {
            padding: 9px 12px;
            border-radius: 10px;
            border: 2px solid #e5e7eb;
            background: #f8fafc;
            cursor: pointer;
            transition: 0.2s;
        }

        .status-form select:hover {
            border-color: #818cf8;
        }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            gap: 8px;
        }

        .edit-button,
        .delete-button {
            padding: 9px 13px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.25s ease;
        }

        .edit-button {
            background: #fef3c7;
            color: #b45309;
            text-decoration: none;
        }

        .edit-button:hover {
            background: #f59e0b;
            color: white;
            transform: translateY(-2px);
        }

        .delete-button {
            background: #fee2e2;
            color: #dc2626;
            border: none;
            cursor: pointer;
        }

        .delete-button:hover {
            background: #ef4444;
            color: white;
            transform: translateY(-2px);
        }

        /* COMPLETED TASK */
        .completed {
            opacity: 0.65;
            background: #f0fdf4;
        }

        .completed .task-name {
            text-decoration: line-through;
            color: #64748b;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 60px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        /* MOBILE */
        @media (max-width: 850px) {

            .sidebar {
                width: 75px;
                padding: 25px 10px;
            }

            .logo {
                font-size: 0;
            }

            .logo span {
                font-size: 28px;
            }

            .nav-item {
                font-size: 0;
                text-align: center;
            }

            .main {
                margin-left: 75px;
                padding: 20px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 18px;
            }

            .task-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .status-form {
                width: 100%;
            }

            .status-form select {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">

        <div class="logo">
            <span>✓</span>
            Task Manager
        </div>

        <a href="{{ route('tasks.index') }}"
           class="nav-item active">
            🏠 Dashboard
        </a>

        <a href="{{ route('tasks.create') }}"
           class="nav-item">
            ➕ Add Task
        </a>

    </aside>

    <main class="main">

        <div class="topbar">

            <div>
                <h1>My Tasks 👋</h1>
                <p>Stay organized and get things done.</p>
            </div>

            <a href="{{ route('tasks.create') }}"
               class="add-button">
                ✨ New Task
            </a>

        </div>

        @if(session('success'))

            <div class="success" id="success-message">
                ✓ {{ session('success') }}
            </div>

        @endif

        <div class="stats">

            <div class="stat-card total-card">
                <div class="stat-title">TOTAL TASKS</div>

                <div class="stat-number">
                    {{ $tasks->count() }}
                </div>
            </div>

            <div class="stat-card pending-card">
                <div class="stat-title">PENDING</div>

                <div class="stat-number">
                    {{ $tasks->where('status', 'Pending')->count() }}
                </div>
            </div>

            <div class="stat-card completed-card">
                <div class="stat-title">COMPLETED</div>

                <div class="stat-number">
                    {{ $tasks->where('status', 'Completed')->count() }}
                </div>
            </div>

        </div>

        <section class="tasks-container">

            <div class="tasks-header">
                <h2>📋 Your Tasks</h2>
            </div>

            @forelse($tasks as $task)

                <div class="task-card
                    {{ $task->status == 'Completed' ? 'completed' : '' }}">

                    <div class="task-info">

                        <div class="task-name">
                            {{ $task->task_name }}
                        </div>

                        <div class="description">
                            {{ $task->description ?: 'No description' }}
                        </div>

                        <div class="due-date">
                            📅 Due:
                            {{ $task->due_date ?? 'No due date' }}
                        </div>

                    </div>

                    <div class="status-form">

                        <form action="{{ route('tasks.updateStatus', $task) }}"
                              method="POST">

                            @csrf
                            @method('PATCH')

                            <select name="status"
                                    onchange="this.form.submit()">

                                <option value="Pending"
                                    {{ $task->status == 'Pending' ? 'selected' : '' }}>
                                    🟠 Pending
                                </option>

                                <option value="Completed"
                                    {{ $task->status == 'Completed' ? 'selected' : '' }}>
                                    🟢 Completed
                                </option>

                            </select>

                        </form>

                    </div>

                    <div class="actions">

                        <a href="{{ route('tasks.edit', $task) }}"
                           class="edit-button">
                            ✏️ Edit
                        </a>

                        <form action="{{ route('tasks.destroy', $task) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="delete-button"
                                    onclick="return confirm('Are you sure you want to delete this task?')">
                                🗑️ Delete
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="empty">

                    <div class="empty-icon">
                        📝
                    </div>

                    <h3>No tasks yet!</h3>

                    <p>Create your first task and start organizing your day.</p>

                    <a href="{{ route('tasks.create') }}"
                       class="add-button">
                        ✨ Create My First Task
                    </a>

                </div>

            @endforelse

        </section>

    </main>

    <script>

        setTimeout(function () {

            const message =
                document.getElementById('success-message');

            if (message) {
                message.style.display = 'none';
            }

        }, 3000);

    </script>

</body>
</html>