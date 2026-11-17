# Event Hall Booking Management System

## Project Overview

The **Event Hall Booking Management System** is a web-based application developed using Laravel. It provides a platform where customers can explore available event halls and make bookings for different occasions, while administrators can manage halls, bookings, customers, and reviews.

The system aims to make the event hall booking process easier, more organized, and convenient for both customers and administrators.

## Features

### Customer Features
- User registration and login
- Browse available event halls
- View hall details, capacity, location, and pricing
- Book halls for different events
- View personal booking history
- Cancel bookings
- Submit ratings and reviews for eligible bookings
- Manage profile information

### Admin Features
- Admin login and dashboard
- Add, edit, and delete event halls
- Upload and manage hall images
- View registered customers
- Manage customer bookings
- Approve or reject booking requests
- View and manage customer reviews

## Technologies Used

- **Backend:** PHP, Laravel
- **Frontend:** HTML, Tailwind CSS, JavaScript
- **Database:** MySQL
- **Development Environment:** XAMPP
- **Version Control:** Git and GitHub

## Installation and Setup

Follow these steps to run the project on your local computer.

### 1. Clone the Repository

```bash
git clone https://github.com/lamiha-faija/Event-Hall-Booking.git
```

### 2. Navigate to the Project Folder

```bash
cd Event-Hall-Booking
```

### 3. Install PHP Dependencies

```bash
composer install
```

### 4. Install Frontend Dependencies

```bash
npm install
```

### 5. Configure the Environment File

Copy `.env.example` and create a new file named `.env`.

Update the database settings in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=event-hall-booking
DB_USERNAME=root
DB_PASSWORD=
```

Make sure the database exists in MySQL/phpMyAdmin.

### 6. Generate the Application Key

```bash
php artisan key:generate
```

### 7. Run Database Migrations

```bash
php artisan migrate
```

### 8. Build Frontend Assets

```bash
npm run build
```

### 9. Start the Laravel Development Server

```bash
php artisan serve
```

Open the application in your browser:

```text
http://127.0.0.1:8000
```

## Project Structure

```text
Event-Hall-Booking/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── database/
│   └── migrations/
├── public/
│   └── images/halls/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
│   └── web.php
├── .env.example
└── README.md
```

## Purpose of the Project

This project was developed as an academic project to apply practical knowledge of web development, database management, Laravel framework concepts, authentication, CRUD operations, and responsive user interface design.

## Author

Developed as an academic project.

