# Naiki

![Home page screenshot](./WebOverview.png)

# Overview

Our Nike shoe sales project offers authentic products like Air Max, Air Jordan, and Flyknit. We not only sell shoes but also build a community for sports enthusiasts, helping customers share experiences and stay updated on new trends. With excellent customer service, we ensure a great shopping experience.

# Technologies

This Laravel 10 shoe-selling web application leverages modern and efficient technologies to deliver a high-performance, secure, and scalable user experience:

-   **Blade Templates**: For rendering dynamic and reusable HTML views.
-   **Eloquent ORM**: Simplifies database interactions using an intuitive and expressive syntax.
-   **MySQL Database**: A reliable and scalable relational database system.
-   **Redis Cache**: Enhances performance by caching frequently accessed data for faster retrieval.
-   **Environment Variables (dotenv)**: Ensures secure and configurable application settings.
-   **Tailwind CSS**: A utility-first framework for styling with speed and flexibility.
-   **Livewire**: Enables seamless interaction between the frontend and backend without writing JavaScript.
-   **PHPStan**: For static analysis to maintain high-quality, error-free code.
-   **Laravel Mix/Vite**: For compiling and optimizing frontend assets with modern build tools.
-   **Sanctum & Fortify**: Provides robust authentication for APIs and web-based login systems.
-   **Scramble**: Enhances database security by obfuscating sensitive data.
-   **Telescope**: Offers powerful debugging and monitoring tools for real-time application insights.
-   **Laravel Pulse**: Tracks and visualizes key application metrics for better performance management.
-   **Job Queues**: Handles time-consuming tasks asynchronously to improve application responsiveness.
-   **Slack Integration**: Facilitates real-time communication and alerts for application events.
-   **Vite**: Compiles and optimizes frontend assets for production environments.
-   **Middleware**: For security, data validation, and performance optimizations.
-   **Compression**: Reduces response size for faster page loads.
-   **Monolog**: Integrated logging system for debugging and error tracking.
-   **Laravel Debugbar**: A developer tool to debug and profile the application during development.
-   **Testing Suite**: PHPUnit and Laravel's testing features for ensuring application reliability.

# Our production

https://sungoat1001.github.io/TuyenTienShoes/

# Contributors

-   Le Pham Ngoc Tien - 22090007
-   Huynh Anh Tien - 22090016
-   Nguyen The Tuyen - 22090003
-   Nguyen Hoang Phuc - 22090014

# Table of content

1. [wireframe](./wireframe/README.md)
2. [screenshot](./screenshot/README.md)
3. [database schema](./database-schema/README.md)
4. [unit test result](./unit-test-result/README.md)
5. [benchmark test result](./benchmark-test-result/README.md)

## Video demo

[![Watch the video](TienTuyenShoes.png)](TienTuyenShoes%20-%20Google%20Chrome%20-%201%20July%202024.mp4)

## Setup Instructions

1. **Clone the Repository**

```bash
git clone https://github.com/SunGoat1001/Naiki
cd Naiki
```

2. **Install Dependencies**

Install all required dependencies using npm:

```bash
npm install
composer install
```

3. **Database Setup**

-   Ensure MySQL is running on your machine.
-   Create a new database called `apps`.
-   Update the database configuration in environment variables (`.env` file).

Create `.env` like `.env.example` and set the values. For example:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=naiki
DB_USERNAME=root
DB_PASSWORD=lephamngoctien
```

4. **Run Database Migrations**

Run the migrations to set up the database schema:

```bash
php artisan migrate
```

5. **Seed the Database**

Populate the database with initial data:

```bash
php artisan db:seed
```

6. **Start the Server**

Compile Front-End Assets

```bash
npm run dev
```

Start the Server

```bash
php artisan serve
```

### Reset Database

To reset the database, you could run the following command to undo all migrations and re-run them.

```bash
php artisan migrate:refresh
php artisan db:seed
```
