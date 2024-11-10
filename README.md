# PhoneBook API

## Overview

The PhoneBook API is a backend application for managing a simple phone book database, allowing users to add, update, delete, and retrieve contacts. This project is designed for testing and development, with support for API testing tools like **Postman** and **Insomnia**. As this repository is backend-only, all interactions are handled via API requests.

## Getting Started

1. **Clone the Repository**:
   ```bash
       Install Dependencies: Make sure you have Composer installed, then run:
   
      git clone https://github.com/bornamashayekh/phoneBook.git
      composer install
      cd phoneBook




Set Up the Database: (Database details will be added to the repository soon.)

Run the Server: Using XAMPP, ensure the Apache and MySQL modules are running. Place the project folder in the XAMPP htdocs directory, then navigate to:

    http://localhost/phoneBook

Usage

For testing, use Postman or Insomnia to interact with the available routes in routes.php


Code Analysis

    Structure: The code follows RESTful principles, with CRUD (Create, Read, Update, Delete) functionality defined in the controller files.
    Database: A database connection will soon be added to persist contact data.
    Testing: The API can be tested comprehensively with tools like Postman or Insomnia to simulate different requests and ensure functionality.

--------------------------
رابط برنامه‌نویسی دفترچه تلفن
معرفی

رابط برنامه‌نویسی دفترچه تلفن یک اپلیکیشن بک‌اند است که امکان مدیریت یک دفترچه تلفن ساده را فراهم می‌کند و به کاربران اجازه می‌دهد مخاطبین خود را اضافه، به‌روزرسانی، حذف و بازیابی کنند. این مخزن برای تست و توسعه طراحی شده و از ابزارهای تست API مانند Postman و Insomnia پشتیبانی می‌کند. در حال حاضر، این پروژه فاقد رابط کاربری است و همه تعاملات از طریق درخواست‌های API انجام می‌شود.
شروع کار

   ```کلون کردن مخزن

git clone https://github.com/bornamashayekh/phoneBook.git
cd phoneBook
```
نصب وابستگی‌ها: مطمئن شوید که Composer نصب است، سپس دستور زیر را اجرا کنید:
```
composer install
```
پیکربندی پایگاه داده: (جزئیات پایگاه داده به زودی به مخزن اضافه خواهد شد.)

اجرای سرور: از XAMPP استفاده کنید و مطمئن شوید که ماژول‌های Apache و MySQL در حال اجرا هستند. سپس پوشه پروژه را در دایرکتوری htdocs قرار دهید و به آدرس زیر بروید:

    http://localhost/phoneBook

استفاده

برای تست از ابزارهایی مانند Postman یا Insomnia استفاده کنید و به مسیرهای داخل فایل route.php درخواست ارسال کنید


تحلیل کد

    ساختار: کد مطابق با اصول RESTful است و قابلیت‌های CRUD (ایجاد، خواندن، به‌روزرسانی، حذف) در فایل‌های کنترلر مربوطه تعریف شده‌اند.
    پایگاه داده: به زودی اتصال به پایگاه داده اضافه خواهد شد.
    تست: این API به گونه‌ای ساخته شده که می‌توان آن را با ابزارهایی مانند Postman یا Insomnia تست کرد و درخواست‌های مختلف را شبیه‌سازی کرد.

