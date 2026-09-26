<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #eef2ff, #fdf2f8);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .back {
            display: inline-block;
            color: #4f46e5;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
            transition: 0.2s;
        }

        .back:hover {
            transform: translateX(-5px);
        }

        .card {
            background: white;
            padding: 38px;
            border-radius: 22px;
            box-shadow: 0 15px 40px rgba(79, 70, 229, 0.12);
        }

        .icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f59e0b, #f97316);
            color: white;
            font-size: 27px;
            border-radius: 16px;
            margin-bottom: 18px;
        }

        h1 {
            margin: 0;
            font-size: 30px;
        }

        .subtitle {
            color: #6b7280;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 8px;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px;
            border: 2px solid #e5e7eb;
            border-radius: 11px;
            font-size: 14px;
            transition: 0.25s;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        input:hover,
        textarea:hover,
        select:hover {
            border-color: #a5b4fc;
        }

        input:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            gap: 12px;
        }

        .update-button {
            background: linear-gradient(135deg, #f59e0b, #f97316);
            color: white;
            border: none;
            padding: 13px 22px;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
        }

        .update-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(245, 158, 11, 0.25);
        }

        .cancel-button {
            background: #f1f5f9;
            color: #475569;
            text-decoration: none;
            padding: 13px 22px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .cancel-button:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 5px solid #ef4444;
        }

    </style>

</head>

<body>

<div class="container">

    <a href="{{ route('tasks.index') }}" class="back">
        ← Back to Dashboard
    </a>

    <div class="card">

        <div class="icon">
            ✏
        </div>

        <h1>Edit Task</h1>

        <p class="subtitle">
            Update your task information.
        </p>

        @if($errors->any())

            <div class="error">

                <strong>Please fix the following:</strong>

                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif

        <form action="{{ route('tasks.update', $task) }}"
              method="POST">

            @csrf
            @method('PUT')

            <label for="task_name">
                Task Name
            </label>

            <input
                type="text"
                id="task_name"
                name="task_name"
                value="{{ old('task_name', $task->task_name) }}"
                required
            >

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
            >{{ old('description', $task->description) }}</textarea>

            <label for="status">
                Status
            </label>

            <select id="status" name="status">

                <option value="Pending"
                    {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                    🟠 Pending
                </option>

                <option value="Completed"
                    {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                    🟢 Completed
                </option>

            </select>

            <label for="due_date">
                Due Date
            </label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="{{ old('due_date', $task->due_date) }}"
            >

            <div class="buttons">

                <button type="submit" class="update-button">
                    💾 Save Changes
                </button>

                <a href="{{ route('tasks.index') }}"
                   class="cancel-button">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>