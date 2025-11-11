# Invoices

A simple, clean invoice management system built with Laravel 12.

## Table of Contents

- [Features](#features)  
- [Requirements](#requirements)  
- [Installation](#installation)  
- [Configuration](#configuration)  
- [Usage](#usage)  
- [Screenshots](#screenshots)
- [Contributing](#contributing)  
- [License](#license)

## Features

- Create, edit and delete invoices  
- Manage clients and items/products  
- Generate PDF versions of invoices  
- Send invoices via email  
- User authentication and roles  
- Responsive UI built with Blade + Tailwind/Vite  
 ## Screenshots
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(152).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(153).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(154).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(155).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(156).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(157).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(158).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(159).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(160).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(161).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(162).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(163).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(164).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(165).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(166).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(167).png)
   ![Invoices](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(168).png)


## Requirements

- PHP 8.x (compatible with Laravel 12)  
- Composer  
- Node.js & npm/yarn  
- A database supported by Laravel (MySQL, PostgreSQL, etc.)  
- Web server (Apache, Nginx, etc.)

## Installation

1. Clone the repository  
   ```bash
   git clone https://github.com/TaherZreeka/invoices.git
   cd invoices
1. Install PHP dependencies  
   ```bash
    composer install
1. Install JavaScript dependencies 
   ```bash
   npm install
1. Copy environment file and configure 
   ```bash
   cp .env.example .env
1. Generate application key
   ```bash
   
     php artisan key:generate
   
   DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=invoices
    DB_USERNAME=your_username
    DB_PASSWORD=your_password

   php artisan migrate
 
 1. Start the development server
   ```bash
    php artisan serve




