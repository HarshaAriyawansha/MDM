MDM (Master Data Management)

A web application built with Laravel to manage master data entities such as Brands, Categories, and Items. This project provides functionalities for creating, viewing, updating, and deleting records, with user authentication and role-based permissions.

Features

    User Authentication: Secure login and registration system.

    Role-Based Permissions: Manage user roles and permissions using Laravel's built-in capabilities.

    CRUD Operations:

        Brands: Create, view, update, and delete brand records.
        Categories: Manage categories associated with brands.
        Items: Create items linked to brands and categories, with file attachments.

File Export: Data can Export for supported formats.

Pagination: Display records with pagination for better user experience.

Installation

    Clone the Repository:

    git clone https://github.com/HarshaAriyawansha/MDM.git
        cd MDM


Install Dependencies:

    composer install
    npm install


Set Up Environment Variables:

    Copy the example environment file and configure your database and other services:

        cp .env.example .env
        Edit the .env file to set your database connection and other necessary configurations.

Generate Application Key:

    php artisan key:generate

Run Migrations:

    php artisan migrate

Seed Database (Optional):

    php artisan db:seed

Compile Assets:

    npm run dev

Serve the Application:

    php artisan serve
    The application will be accessible at http://localhost:8000.

Usage

    Authentication: Access the login and registration pages via the routes /login and /register.
    Dashboard: After logging in, users can access the dashboard to manage brands, categories, and items.
    CRUD Operations: Use the provided interfaces to create, view, update, and delete records.
    File Attachments: When creating or updating items, users can upload files which will be stored in the public/uploads/items directory.

Technologies Used

    Backend: Laravel 10.x
    Frontend: Blade templating engine, Bootstrap 5
    Database: MySQL
    Authentication: Laravel Breeze

File Storage: Local storage in the public/uploads/items directory

Contributing

    Contributions are welcome! Please fork the repository, create a new branch, and submit a pull request with your proposed changes.

