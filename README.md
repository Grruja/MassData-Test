## MassData-Test 📊

After cloning the repository:
- Create .env in project's root -> copy .env.example file -> paste in .env
- Navigate to the project's root directory and run the following commands:

```sh
composer install
php artisan key:generate
npm install
php artisan migrate
```

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

## Admin User Login 👤

You can log in to the admin user-management interface with the following credentials:

- **Email:** admin@gmail.com
- **Password:** 123456 (all users have this password)
