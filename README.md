Before installing, make sure you have the following tools installed on your machine:

- PHP >= 8.0
- Composer
- MySQL or any other supported database
- Laravel 8 or newer
- Git

## Installation

Follow these steps to install the project on your local machine.

### 1. Clone the repository

First, clone this repository to your local machine:

```bash
git clone https://github.com/Arash-Ghandi/laravel-login-with-image-capcha.git
cd laravel-login-with-image-capcha
```

### 2. Install dependencies

Install the PHP and JavaScript dependencies using Composer and npm:

```bash
composer install
npm install

```
### 3. Set up environment

Duplicate the .env.example file and rename it to .env. Then configure your environment variables such as database credentials:

```bash
cp .env.example .env

```
Next, generate the application key:

```bash
php artisan key:generate

```
### 4. Set up the database
Create a new database in MySQL (or any supported database) and configure your .env file with the correct database credentials.

After that, run the migrations to create the necessary database tables:

```bash
php artisan key:generate

```
### 5. Serve the application
To start the development server, run:

```bash
php artisan serve

```
The application will now be accessible at http://localhost:8000.
