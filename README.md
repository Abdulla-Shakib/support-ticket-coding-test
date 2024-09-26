# Laravel Support ticket system project

This is a Laravel project. Follow the steps below to set up the project on your local machine.

## Setup Instructions

Run the following commands step by step in your console:

```bash
# 1. Clone the Repository
[https://github.com/netcodengit/support-ticket-coding-test.git]
cd support-ticket-coding-test
git checkout AbdullaAlAnon

# 2. Install PHP Dependencies
composer install

# 3. Install Node.js Dependencies
npm install

# 4. Generate Application Key
php artisan key:generate

# 5. Create a Database
# - Create a database in your DBMS in mysql
# - Update the .env file with your database credentials
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=support_ticket_system
# DB_USERNAME=your_database_username
# DB_PASSWORD=your_database_password

QUEUE_CONNECTION=sync to database

# 6. Run Migrations (Optional)
php artisan migrate:fresh --seed

------Demo user-----
[
    For admin:
                email:admin@gmail.com
                password:admin@gmail.com

    For customer:
                email:customer@gmail.com
                password:customer@gmail.com
]

# 7. Start the Laravel Server
php artisan serve

# 8. Compile Assets for Development
npm run dev

# 0. Run Queue Jobs
php artisan queue:listen

```
