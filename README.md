# 🎓 College Management System (PHP + MySQL)

A simple **College Management System** built with **PHP, MySQL, and CSS**.  
It allows you to manage **Students, Faculty, and Courses** in one platform.  
Fully compatible with **InfinityFree free hosting**.

---

## 🚀 Features
- Add / View Students
- Add / View Faculty
- Add / View Courses
- Responsive Design (CSS)
- Works on Free Hosting (InfinityFree)
- MySQL Database Integration

---

## 📂 Project Structure
/ (root folder)
│── index.php # Dashboard / Redirect
│── add_student.php # Add Student Form
│── add_faculty.php # Add Faculty Form
│── add_course.php # Add Course Form
│── view_students.php # View All Students
│── view_faculty.php # View All Faculty
│── view_course.php # View All Courses
│── config.php # Database Connection File
│── style.css # Main Stylesheet
│── add.css # Styling for Add Pages
│── view.css # Styling for View Pages
│── db.sql # Database Schema
│── README.md # Documentation

---

## ⚙️ Installation Guide (InfinityFree)

1. **Create Hosting**
   - Sign up at [InfinityFree](https://infinityfree.net).
   - Create a hosting account.
   - Get your **FTP details** from cPanel.

2. **Upload Files**
   - Upload all project files (`.php`, `.css`, `db.sql`, etc.) using File Manager or FileZilla.

3. **Create Database**
   - Go to **MySQL Databases** in InfinityFree cPanel.
   - Create a new database.
   - Copy DB **name**, **username**, and **password**.

4. **Import Database**
   - Open **phpMyAdmin** from cPanel.
   - Select your database.
   - Import `db.sql`.

5. **Edit Config File**
   - Open `config.php` and update with your InfinityFree details:
     ```php
     <?php
     $host = "sqlXXX.epizy.com";   // Your DB Host
     $user = "epiz_XXXXXXX";       // Your DB Username
     $pass = "your_password";      // Your DB Password
     $db   = "epiz_XXXXXXX_db";    // Your DB Name

     $conn = mysqli_connect($host, $user, $pass, $db);
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }
     ?>
     ```

6. **Run Website**
   - Open your domain:
     ```
     https://yourdomain.com
     ```

---

## 🗄️ Database Schema (db.sql)

```sql
CREATE DATABASE college_management;

USE college_management;

-- Students Table
CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    course VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Faculty Table
CREATE TABLE faculty (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    department VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Courses Table
CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    description TEXT,
    duration VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
💻 Requirements

PHP 7.4 or higher

MySQL Database

Hosting (InfinityFree Recommended)

📜 License

Free to use and modify for learning purposes. 🚀

---


