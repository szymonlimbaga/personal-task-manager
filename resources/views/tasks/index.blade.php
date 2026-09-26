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
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            background: #212529;
            color: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .header p {
            margin-bottom: 0;
            color: #ced4da;
        }

        .top-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .task-count {
            font-size: 18px;
            font-weight: bold;
        }

        .add-button {
            background: #198754;
            color: white;
            padding: 11px 16px;
            text-decoration: none;
            border-radius: 6px;
        }

        .add-button:hover {
            opacity: 0.85;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .table-container {
            background: white;
            border-radius: 10px;
            overflow-x: auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #343a40;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #dee2e6;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .completed-task {
            opacity: 0.65;
        }

        .completed-task .task-name {
            text-decoration: line-through;
        }

        select {
            padding: 7px;
            border-radius: 5px;
            border: 1px solid #ced4da;
        }

        .edit-button {
            background: #ffc107;
            color: black;
            padding: 7px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete-button {
            background: #dc3545;
            color: white;
            padding: 7px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .edit-button:hover,
        .delete-button:hover {
            opacity: 0.85;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #6c757d;
        }

        @media (max-width: 700px) {
            .top-section {
                flex-direction: column;
                gap: 15px;
                align-items: stretch;
            }

            .add-button {
                text-align: center;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Personal Task Manager</h1>
        <p>Organize your tasks and keep track of your deadlines.</p>
    </div>

    @if(session('success'))
        <div class="success" id="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="top-section">

        <div class="task-count">
            Total Tasks: {{ $tasks->count() }}
        </div>

        <a href="{{ route('tasks.create') }}" class="add-button">
            + Add Task
        </a>

    </div>

    <div class="table-container">

        <table>

            <thead>
                <tr>
                    <th>Task Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($tasks as $task)

                    <tr class="{{ $task->status == 'Completed' ? 'completed-task' : '' }}">

                        <td class="task-name">
                            {{ $task->task_name }}
                        </td>

                        <td>
                            {{ $task->description }}
                        </td>

                        <td>

                            <form action="{{ route('tasks.updateStatus', $task) }}"
                                  method="POST">

                                @csrf
                                @method('PATCH')

                                <select name="status"
                                        onchange="this.form.submit()">

                                    <option value="Pending"
                                        {{ $task->status == 'Pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>

                                    <option value="Completed"
                                        {{ $task->status == 'Completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>

                                </select>

                            </form>

                        </td>

                        <td>
                            {{ $task->due_date ?? 'No due date' }}
                        </td>

                        <td>

                            <a href="{{ route('tasks.edit', $task) }}"
                               class="edit-button">
                                Edit
                            </a>

                            <form action="{{ route('tasks.destroy', $task) }}"
                                  method="POST"
                                  style="display: inline;">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="empty">
                            No tasks available yet.<br>
                            Click "+ Add Task" to create your first task.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
<script>
    setTimeout(function () {
        const message = document.getElementById('success-message');

        if (message) {
            message.style.display = 'none';
        }
    }, 3000);
</script>
</html>