Task Management System
Installation
Prerequisites

    PHP >= 7.3
    Composer
    MySQL
    Node.js & npm

Steps

    Clone the repository:

    sh

git clone https://github.com/AmitNaik01/TaskManager.git
cd TaskManager

Install dependencies:

composer install
npm install

Copy .env.example to .env and set your environment variables:

cp .env.example .env
php artisan key:generate

Set up your database and run migrations:

php artisan migrate

Run the development server:

php artisan serve

Compile assets:

    npm run dev

User Manual
Creating a Task

    Navigate to the task list page.
    Use the form at the bottom of the page to add a new task by entering the title, description, and status.
    Click the "Add Task" button to save the task.

Editing a Task

    On the task list page, click the "Edit" button next to the task you want to edit.
    Modify the task details in the form and click "Update Task" to save changes.

Deleting a Task

    On the task list page, click the "Delete" button next to the task you want to delete.