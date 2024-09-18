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

3. **Set Up Environment**

   ```bash
   composer install
  Copy the .env.example file to .env & Generate a new application Key:
  ```bash
   cp .env.example .env
   php artisan key:generate

4. **Configure Database**

   ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password



  
