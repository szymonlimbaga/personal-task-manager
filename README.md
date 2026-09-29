<img width="1920" height="1080" alt="Screenshot 2026-09-29 214418" src="https://github.com/user-attachments/assets/d4c284b3-cc7f-4710-9f07-dae8fb16e552" /># Personal Task Manager

## Project Information

## Project Code: 
WST21-PM-2026-SF

## Student Name: 
Szymon Darwin C. Limbaga

## Course & Year:
BSIT - 2nd Year

## Database Used:
MySQL

## Features

- Add Task
- View Tasks
- Edit Task
- Delete Task
- Update Status
  - Pending
  - Completed

## Technologies Used

- Laravel
- PHP
- MySQL
- Blade
- HTML
- CSS
- JavaScript

## Project Description

The Personal Task Manager is a simple Laravel web application that allows users to manage their personal tasks.

The system uses Laravel Routes, Controllers, Models, Blade Views, and a MySQL database.

## UI

<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/57b713c9-3bab-411b-8a6a-b6defd4cd7c6" />

## By clicking the new task it will bring you to the create new task page

<img width="1920" height="1080" alt="Screenshot 2026-09-29 212848" src="https://github.com/user-attachments/assets/ddeb4526-d66e-46f7-8549-bb8fde98a913" />
<img width="1920" height="1080" alt="Screenshot 2026-09-29 213625" src="https://github.com/user-attachments/assets/15f925b7-1c90-4747-9ce7-467936d0c3b2" />

## In order to create new task all fields must be filled

<img width="1920" height="1080" alt="Screenshot 2026-09-29 213952" src="https://github.com/user-attachments/assets/e296d23a-e8b6-417b-8af5-396b449615a3" />



## After creating new task, your task will appear in dashboard




## Database

The project uses a MySQL database named:

`personal_task_manager`

The `tasks` table contains:

- id
- task_name
- description
- status
- due_date
- created_at
- updated_at

## How to Run

1. Clone the repository.
2. Open the project folder in VS Code.
3. Install the Laravel dependencies:

```bash
composer install
Create and configure the .env file.
Set the MySQL database information.
Run the migrations:
php artisan migrate
Start the Laravel development server:
php artisan serve
Open the application in your browser:
http://127.0.0.1:8000/tasks
Project Structure

The project follows the Laravel MVC structure:

Routes - Handles application URLs.
Controller - Handles the task operations.
Model - Communicates with the database.
Database - Stores task information.
Blade Views - Displays the application interface.

Then press **Ctrl + S**. ✅

**Important:** If your actual course/year is different from `IT - 1st Year`, change that one line before saving.

After that, **don't change anything else yet**. Tell me when you've saved it, and I'll guide you through the **GitHub upload step-by-step**.
