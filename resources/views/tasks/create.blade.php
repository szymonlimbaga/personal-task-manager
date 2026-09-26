<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        button {
            background-color: #198754;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button {
            display: inline-block;
            margin-left: 10px;
            text-decoration: none;
            color: #333;
        }

        .error {
            background-color: #f8d7da;
            color: #842029;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add New Task</h1>

    @if($errors->any())
        <div class="error">
            <strong>Please fix the following:</strong>

            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label for="task_name">Task Name</label>

        <input
            type="text"
            id="task_name"
            name="task_name"
            value="{{ old('task_name') }}"
            placeholder="Enter task name"
            required
        >

        <label for="description">Description</label>

        <textarea
            id="description"
            name="description"
            placeholder="Enter task description"
        >{{ old('description') }}</textarea>

        <label for="status">Status</label>

        <select id="status" name="status">

            <option value="Pending">
                Pending
            </option>

            <option value="Completed">
                Completed
            </option>

        </select>

        <label for="due_date">Due Date</label>

        <input
            type="date"
            id="due_date"
            name="due_date"
            value="{{ old('due_date') }}"
        >

        <button type="submit">
            Add Task
        </button>

        <a href="{{ route('tasks.index') }}" class="back-button">
            Cancel
        </a>

    </form>

</div>

</body>
</html>