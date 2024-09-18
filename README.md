![Laravel Logo](https://laravel.com/img/logotype.min.svg)

<svg xmlns="http://www.w3.org/2000/svg" height="25" viewBox="0 0 25 25" width="2418"><path d="m49.626 11.564a.809.809 0 0 1 .028.209v10.972a.8.8 0 0 1 -.402.694l-9.209 5.302v10.509c0 .286-.152.55-.4.694l-19.223 11.066c-.044.025-.092.041-.14.058-.018.006-.035.017-.054.022a.805.805 0 0 1 -.41 0c-.022-.006-.042-.018-.063-.026-.044-.016-.09-.03-.132-.054l-19.219-11.066a.801.801 0 0 1 -.402-.694v-32.916c0-.072.01-.142.028-.21.006-.023.02-.044.028-.067.015-.042.029-.085.051-.124.015-.026.037-.047.055-.071.023-.032.044-.065.071-.093.023-.023.053-.04.079-.06.029-.024.055-.05.088-.069h.001l9.61-5.533a.802.802 0 0 1 .8 0l9.61 5.533h.002c.032.02.059.045.088.068.026.02.055.038.078.06.028.029.048.062.072.094.017.024.04.045.054.071.023.04.036.082.052.124.008.023.022.044.028.068a.809.809 0 0 1 .028.209v20.559l8.008-4.611v-10.51c0-.07.01-.141.028-.208.007-.024.02-.045.028-.068.016-.042.03-.085.052-.124.015-.026.037-.047.054-.071.024-.032.044-.065.072-.093.023-.023.052-.04.078-.06.03-.024.056-.05.088-.069h.001l9.611-5.533a.801.801 0 0 1 .8 0l9.61 5.533c.034.02.06.045.09.068.025.02.054.038.077.06.028.029.048.062.072.094.018.024.04.045.054.071.023.039.036.082.052.124.009.023.022.044.028.068zm-1.574 10.718v-9.124l-3.363 1.936-4.646 2.675v9.124l8.01-4.611zm-9.61 16.505v-9.13l-4.57 2.61-13.05 7.448v9.216zm-36.84-31.068v31.068l17.618 10.143v-9.214l-9.204-5.209-.003-.002-.004-.002c-.031-.018-.057-.044-.086-.066-.025-.02-.054-.036-.076-.058l-.002-.003c-.026-.025-.044-.056-.066-.084-.02-.027-.044-.05-.06-.078l-.001-.003c-.018-.03-.029-.066-.042-.1-.013-.03-.03-.058-.038-.09v-.001c-.01-.038-.012-.078-.016-.117-.004-.03-.012-.06-.012-.09v-21.483l-4.645-2.676-3.363-1.934zm8.81-5.994-8.007 4.609 8.005 4.609 8.006-4.61-8.006-4.608zm4.164 28.764 4.645-2.674v-20.096l-3.363 1.936-4.646 2.675v20.096zm24.667-23.325-8.006 4.609 8.006 4.609 8.005-4.61zm-.801 10.605-4.646-2.675-3.363-1.936v9.124l4.645 2.674 3.364 1.937zm-18.422 20.561 11.743-6.704 5.87-3.35-8-4.606-9.211 5.303-8.395 4.833z" fill="#ff2d20"/></svg>

# Task Management System 
## Overview

This Task Management System allows users to manage tasks with full CRUD (Create, Read, Update, Delete) functionality, along with task filtering and sorting. Additionally, it provides a RESTful API for interaction with other applications. Users can register, log in, and manage their tasks through a user-friendly interface.

## Features

1. **User Authentication**
   - Register: Users can create a new account.
   - Log In: Users can log in to their account.
   - Log Out: Users can log out from their account.

2. **Task CRUD Operations**
   - **Create**: Users can add new tasks.
   - **Read**: Users can view a list of tasks.
   - **Update**: Users can edit existing tasks.
   - **Delete**: Users can remove tasks.

3. **Task Filtering and Sorting**
   - **Filter**: Filter tasks by status (e.g., Pending, In Progress, Completed).
   - **Sort**: Sort tasks by due date.

4. **API Development**
   - A RESTful API is available for interacting with the task management system from external applications.

## Requirements

- PHP 8.x
- Laravel 10.x
- Composer
- MySQL or another supported database

## Installation
1. **Clone the Repository**
    
   ```bash
   git clone https://github.com/your-repository/task-manager.git
   cd task-manager
   
2. **Install Dependencies**
    
   ```bash
   composer install
   
3. **Set Up Environment & Copy the .env.example file to .env & Generate a new application Key: **
       
   ```bash
   composer install
----
           cp .env.example .env
           php artisan key:generate

5. **Configure Database**

   ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
   
6. Run Migrations
   
   ```bash
   php artisan migrate
   
8. **Install Laravel Sanctum & Add Sanctum middleware to api middleware group in app/Http/Kernel.php:**

   ```bash
       composer require laravel/sanctum
       php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
       php artisan migrate
----
            'api' => [
                \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
                'throttle:api',
                \Illuminate\Routing\Middleware\SubstituteBindings::class,
            ],

## usage
Web Interface

1. Register
   - Navigate to /register to create a new account.
2. Log In
   - Navigate to /login to log in.
3. Manage Tasks
   - Navigate to /tasks to view the list of tasks.
   - Use the "Create New Task" button to add a new task.
   - Use the edit button to modify existing tasks.
   - Use the delete button to remove tasks.
4. Filter and Sort Tasks
   - Use the filter dropdown to select task statuses.
   - Use the sort dropdown to order tasks by due date.

## API Endpoints

- Login
  - Endpoint: POST /api/login
  - Parameters:
    - email: User's email address.
    - password: User's password.
      
  - Response: Returns a JSON object with an API token.

- Logout
  - Endpoint: POST /api/logout
  - Authentication Required: Yes
  - Response: Returns a JSON message confirming logout.

- Tasks
  - List Tasks
    - Endpoint: GET /api/tasks
    - Authentication Required: Yes
      
  - Create Task
    - Endpoint: POST /api/tasks
    - Parameters:
      - title: Title of the task.
      - description: Description of the task (optional).
      - status: Status of the task.
      - due_date: Due date of the task (optional).
    - Authentication Required: Yes
      
  - View Task
    - Endpoint: GET /api/tasks/{task}
    - Parameters:
      - task: Task ID.
    - Authentication Required: Yes
      
  - Update Task
    - Endpoint: PUT /api/tasks/{task}
    - Parameters:
      - task: Task ID.
      - title: Title of the task.
      - description: Description of the task (optional).
      - status: Status of the task.
      - due_date: Due date of the task (optional).
    - Authentication Required: Yes
      
  - Delete Task
    - Endpoint: DELETE /api/tasks/{task}
    - Parameters:
      - task: Task ID.
    - Authentication Required: Yes

## **Running the Application & Testing**
To start the local development server, use:

    php artisan serve
    php artisan test

## Results

Here are some screenshots of the application:

![Screenshot 1](results/screenshot1.png)
![Screenshot 2](results/screenshot2.png)
![Screenshot 3](results/screenshot3.png)

## Social Media

[![LinkedIn](https://img.shields.io/badge/LinkedIn-yourprofile-blue)](https://linkedin.com/in/alif-rahman-on-computer)
[![GitHub](https://img.shields.io/github/followers/yourprofile?style=social)](https://github.com/VOID-ALIF)
[![Facebook](https://img.shields.io/badge/Facebook-4267B2?logo=facebook&logoColor=white&style=for-the-badge)](https://www.facebook.com/alif.facebook)
[![Gmail](https://img.shields.io/badge/Gmail-D14836?logo=gmail&logoColor=white&style=for-the-badge)](mailto:alif.rahman.c@gmail.com)
[![WhatsApp](https://img.shields.io/badge/WhatsApp-25D366?logo=whatsapp&logoColor=white&style=for-the-badge)](https://wa.me/+8801300155542)

## Contributing
Feel free to contribute to this project by submitting issues or pull requests. For more details, see CONTRIBUTING.md.

## License
This project is licensed under the MIT License. See the LICENSE.md file for details.
