# LAB7 - PHP Microblog Forum

A simple PHP-based microblog forum application where users can register, log in, create posts, and browse a shared community feed.

## Features

- **User registration** with email and password validation
- **User authentication** with session management and optional "Remember Me" (30-day cookie)
- **Create and update blog posts** (users can only edit their own posts)
- **Community feed** showing all posts from all users
- **Responsive UI** built with Bootstrap 5

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | PHP |
| Database | MySQL / MariaDB (via MySQLi) |
| Templating | [Smarty](https://www.smarty.net/) v4 |
| Frontend | Bootstrap 5, HTML, CSS |
| Dev environment | XAMPP |

## Project Structure

```
LAB7/
├── db.php                 # Database connection configuration
├── model.php              # Database query functions
├── index.php              # Homepage – community feed
├── blog.php               # Create / edit post form
├── newblog_action.php     # Handler: create a new post
├── updateblog_action.php  # Handler: update an existing post
├── login.php              # Login form
├── login_action.php       # Handler: authenticate user
├── logout_action.php      # Handler: log out user
├── register.php           # Registration form
├── register_action.php    # Handler: register new user
├── message.php            # Redirect page with status messages
├── templates/             # Smarty .tpl template files
├── templates_c/           # Compiled Smarty templates (auto-generated)
├── styles/                # CSS stylesheets
└── images/                # Image assets
```

## Database Schema

### `users`
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK) | Auto-increment primary key |
| name | VARCHAR | Username |
| email | VARCHAR (UNIQUE) | Login email |
| password_digest | VARCHAR | Hashed password (currently MD5 – see notes below) |
| remember_digest | VARCHAR | Token for "Remember Me" cookie |
| created_at | DATETIME | Account creation timestamp |
| updated_at | DATETIME | Last update timestamp |

### `microposts`
| Column | Type | Description |
|--------|------|-------------|
| id | INT (PK) | Auto-increment primary key |
| content | TEXT | Post content |
| user_id | INT (FK) | Reference to `users.id` |
| likes | INT | Like counter (default 0) |
| created_at | DATETIME | Post creation timestamp |
| updated_at | DATETIME | Last update timestamp |

## Setup

### Prerequisites

- [XAMPP](https://www.apachefriends.org/) (or any Apache + PHP + MySQL stack)
- PHP 7.4+
- MySQL / MariaDB

### Installation

1. **Clone the repository** into your web server's document root (e.g. `htdocs` for XAMPP):
   ```bash
   git clone https://github.com/JoaoSouza129/LAB7.git
   ```

2. **Create the database** by running the following SQL in phpMyAdmin or your MySQL client:
   ```sql
   CREATE DATABASE lab7;
   USE lab7;

   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(255) NOT NULL,
       email VARCHAR(255) NOT NULL UNIQUE,
       password_digest VARCHAR(255) NOT NULL,
       remember_digest VARCHAR(255),
       created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
       updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
   );

   CREATE TABLE microposts (
       id INT AUTO_INCREMENT PRIMARY KEY,
       content TEXT NOT NULL,
       user_id INT NOT NULL,
       likes INT DEFAULT 0,
       created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
       updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
       FOREIGN KEY (user_id) REFERENCES users(id)
   );
   ```

3. **Configure the database connection** in `db.php`:
   ```php
   $host = 'localhost';
   $db   = 'lab7';
   $user = 'root';       // your MySQL username
   $pass = '';           // your MySQL password
   ```

4. **Start Apache and MySQL** via the XAMPP control panel.

5. **Open the app** in your browser:
   ```
   http://localhost/LAB7/index.php
   ```

## Usage

1. Open the application and click **Register** to create an account.
2. Log in with your email and password.
3. Use the **New Post** button to write and publish a blog post.
4. Browse the community feed on the homepage.
5. Click **Update** on any of your own posts to edit them.
6. Click **Logout** to end your session.

## Notes

> **⚠️ Educational project** – This application was built as a lab exercise and has known security limitations that should be addressed before any production use:
>
> - **Passwords** are hashed with MD5, which is cryptographically broken. A production application should use PHP's [`password_hash()`](https://www.php.net/manual/en/function.password-hash.php) with `PASSWORD_BCRYPT` or `PASSWORD_ARGON2ID` and verify with `password_verify()`.
> - Some database queries use string concatenation instead of prepared statements, which may expose SQL injection vulnerabilities.
> - There is no CSRF token protection on forms.
