# ARIB

![Project Logo](https://arib.com.sa/media/m5sprxaa/group-19003.png)

## Introduction

This is a brief description of my project. Here you can explain what my project is about and what it does.

## Note on Image Handling

In this project, we have handled images in a simple approach for demonstration purposes. However, there are more professional and efficient ways to handle images in a production environment. Please consider this when reviewing the code.

## Installation

Follow these steps to install and run the project:

1. Clone the repository: `git clone git@github.com:Dev-Ahmed-Alaa/Arib.git`
2. Navigate to the project directory: `cd your-repo-name`
3. Install dependencies: `composer install` and `npm install`
4. Copy the `.env.example` file to create your own environment file: `cp .env.example .env`
5. Generate an app key: `php artisan key:generate`
6. Run the migrations: `php artisan migrate --seed`
7. Start the server: `php artisan serve`
8. Run npm : `npm run dev`


Now, you should be able to access the application at `http://localhost:8000`.

## Endpoints

Here are the main endpoints of the project:

### Departments

- `GET /departments`: Fetch all departments. (DepartmentController@index)
- `POST /departments`: Create a new department. (DepartmentController@store)
- `GET /departments/create`: Display the department creation form. (DepartmentController@create)
- `GET /departments/search`: Search for a department. (DepartmentController@searchDepartment)
- `PATCH /departments/{department}`: Update an existing department by ID. (DepartmentController@update)
- `DELETE /departments/{department}`: Delete an existing department by ID. (DepartmentController@destroy)
- `GET /departments/{department}/edit`: Display the department edit form. (DepartmentController@edit)

### Employees

- `GET /employees`: Fetch all employees. (EmployeeController@index)
- `POST /employees`: Create a new employee. (EmployeeController@store)
- `GET /employees/create`: Display the employee creation form. (EmployeeController@create)
- `GET /employees/search`: Search for an employee. (EmployeeController@searchEmployee)
- `PATCH /employees/{employee}`: Update an existing employee by ID. (EmployeeController@update)
- `DELETE /employees/{employee}`: Delete an existing employee by ID. (EmployeeController@destroy)
- `GET /employees/{employee}/edit`: Display the employee edit form. (EmployeeController@edit)

### Authentication

- `GET /forgot-password`: Display the password reset link request form. (Auth\PasswordResetLinkController@create)
- `POST /forgot-password`: Email the password reset link. (Auth\PasswordResetLinkController@store)
- `GET /login`: Display the login form. (Auth\AuthenticatedSessionController@create)
- `POST /login`: Handle an incoming authentication request. (Auth\AuthenticatedSessionController@store)
- `POST /logout`: Log the user out of the application. (Auth\AuthenticatedSessionController@destroy)

