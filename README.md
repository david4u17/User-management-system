# User Management System

A simple CRUD (Create, Read, Update, Delete) application built with Laravel and MySQL for managing users.

## Features

- List all users
- Create a new user
- View user details
- Update user information
- Delete a user

## Prerequisites

- PHP (version 7.4 or higher)
- Composer
- MySQL

## Installation

### Clone the repository:
git clone https://github.com/david4u17/User-management-system.git

2. Navigate to the project directory:
cd user-management-system

3. Install the dependencies:
composer install

4. Create a new `.env` file by copying the `.env.example` file:
cp .env.example .env

5. Generate a new application key:
php artisan key:generate

6. Configure the database connection in the `.env` file:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

7. Run the database migrations:
php artisan migrate

8. Start the development server:
php artisan serve

The application should now be accessible at `http://localhost:8000`.

## Usage

- Visit `http://localhost:8000/users` to view the list of users.
- Click the "Create User" button to create a new user.
- Click the "View" button to view the details of a user.
- Click the "Edit" button to update a user's information.
- Click the "Delete" button to delete a user.

