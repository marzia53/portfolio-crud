# Portfolio CRUD Application
A simple Laravel-based CRUD application for managing portfolio projects.

## Laravel Version

- *Laravel*: 12.15.0

## Requirements

- PHP >= 8.1
- Composer
- MySQL (via MAMP(MAC)/ XAMP(WINDOWS) or other)
- Bootstrap

## Setup Instructions

1. *Clone the repository*  
   in terminal -
   git clone https://github.com/marzia53/portfolio-crud.git
   cd portfolio-crud

2. *Install PHP dependencies*
   composer install

3. *Configure your environment file*
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=8889
   DB_DATABASE=portfolio_db
   DB_USERNAME=root
   DB_PASSWORD=root

4. *Generate application key*
   php artisan key:generate

5. *Create the database*
   Using MAMP’s phpMyAdmin:

   - Start MAMP servers.
   - Open phpMyAdmin from the WebStart page.
   - Create a new database named portfolio_db.


## Running the Application

1. Run Server after starting MAMP:
   php artisan serve

2. Visit in your browser:
   http://localhost:8888/projects

## Database

Database name: portfolio_db

## Usage

    -List projects: GET /projects
    -Create project: GET /projects/create
    -View a project: GET /projects/{id}
    -Edit a project: GET /projects/{id}/edit
    -Delete a project: DELETE /projects/{id}