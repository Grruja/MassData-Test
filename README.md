## MassData-Test 📊

After cloning the repository, navigate to the project's root directory and run the following commands:

```sh
composer install
npm install
php artisan migrate
```

## Admin User Login 👤

You can log in to the admin user-management interface with the following credentials:

- **Email:** admin@gmail.com
- **Password:** 12345678 (all users have this password)

## Required Packages 📦

To ensure the project works correctly, you'll need to install the following packages:

1. **Laravel-AdminLTE**
   ```sh
   composer require jeroennoten/laravel-adminlte
   php artisan adminlte:install
   ```

2. **Laravel UI**
   ```sh
   composer require laravel/ui
   ```

3. **Laravel Excel**
   ```sh
   composer require maatwebsite/excel
   ```

## Running the Project Locally 🖥️

To run the project locally, execute the following commands:

```sh
php artisan serve
npm run dev
```
