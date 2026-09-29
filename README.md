# Personal Task Manager

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

## By clicking the 'new task button', it will bring you to the create new task page.

<img width="1920" height="1080" alt="Screenshot 2026-09-29 212848" src="https://github.com/user-attachments/assets/ddeb4526-d66e-46f7-8549-bb8fde98a913" />
<img width="1920" height="1080" alt="Screenshot 2026-09-29 213625" src="https://github.com/user-attachments/assets/15f925b7-1c90-4747-9ce7-467936d0c3b2" />

## In order to create new task all fields must be filled.

<img width="1920" height="1080" alt="Screenshot 2026-09-29 213952" src="https://github.com/user-attachments/assets/e296d23a-e8b6-417b-8af5-396b449615a3" />

## After creating new task, your task will appear in dashboard.

<img width="1920" height="1080" alt="Screenshot 2026-09-29 214418" src="https://github.com/user-attachments/assets/53eb8124-be4d-4223-ac52-af26249352f9" />

## By clicking the 'drop down arrow', it will show the pending and completed option.

<img width="1920" height="1080" alt="Screenshot 2026-09-29 214418" src="https://github.com/user-attachments/assets/30e30a59-be4e-4ade-8d2f-30d82089bc2b" />
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/73a69f71-2ed2-433d-bbfa-d77b9fa382c4" />

## By clicking the 'edit button', it will bring you to the edit task page.

<img width="1920" height="1080" alt="Screenshot 2026-09-29 215355" src="https://github.com/user-attachments/assets/b32a2ea9-a62f-4fb2-8941-85538bfc2778" />
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/81cde052-0618-4a0b-a61e-3ed5540f999a" />

## By clicking the 'back to dashboard' it will bring you back to the dashboard.

<img width="1920" height="1080" alt="Screenshot 2026-09-29 215936" src="https://github.com/user-attachments/assets/c103f561-3bc5-41d7-9df1-af3e4e0995dd" />
<img width="1920" height="1080" alt="Screenshot 2026-09-29 220051" src="https://github.com/user-attachments/assets/6e376177-d3f2-461d-b66f-c7fd33295992" />

## By clicking the 'delete button' the system will ask to confirm their action. Clicking 'OK' the task will be deleted, while clicking 'cancel' disclose the dialog.

<img width="1920" height="1080" alt="Screenshot 2026-09-29 220449" src="https://github.com/user-attachments/assets/669c13ed-3143-4ffa-9ccf-faf8082e8f12" />
<img width="1920" height="1080" alt="image" src="https://github.com/user-attachments/assets/f10656b8-94c8-4e20-870a-19681b1dfd28" />

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
