# Convene – Conference Management System

A web-based conference management system. Staff manage conferences, venues, sessions, speakers and registrations; attendees browse conferences and register for sessions.

Developed by **Makos Tech** (Samuel Makokha).

## Features

- **Authentication** – login, logout and self-registration (attendees and speakers only).
- **Roles** – admin, organiser, speaker and attendee, enforced by role middleware.
- **Conferences, venues and sessions** – full staff CRUD with capacity and scheduling.
- **Speakers** – profiles and assignment to sessions (keynote, speaker, panelist, moderator).
- **Registration** – conference and session registration with capacity, duplicate, deadline and scheduling-conflict checks, plus cancellation.
- **Members** – manage attendees and speakers.
- **Reports** – registration and attendance summaries.
- **Dashboard** – counts and quick actions.

## Tech stack

- PHP 8.2+ / Laravel 12
- Blade templates + Tailwind CSS (Vite)
- MySQL / MariaDB
- Composer, Node.js 18+

## Requirements

- PHP 8.2+ with the `pdo_mysql`, `mbstring` and `openssl` extensions
- Composer
- MySQL or MariaDB (XAMPP works fine)
- Node.js 18+ and npm

## Installation

```bash
# 1. Get the code
git clone https://github.com/makos-757/conference-manager-php.git
cd conference-manager-php

# 2. Install dependencies
composer install
npm install

# 3. Configure the environment
cp .env.example .env
php artisan key:generate

# 4. Build the frontend assets
npm run build
```

### 1. Create the database

Create an empty database in phpMyAdmin or from the MySQL CLI:

```sql
CREATE DATABASE conference_manager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Edit the environment variables

Open `.env` and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=conference_manager
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

Use the database name you created above. `.env` is git-ignored — never commit your real credentials.

### 3. Create the tables and demo data

```bash
php artisan migrate --seed
```

The seeder creates one demo account per role plus a sample venue, conference, session, speaker and registration. Demo credentials live in `database/seeders/DatabaseSeeder.php` — change the demo password before deploying.

### 4. Start the app

```bash
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Notes

- Sessions, cache and the queue use the database, so run `php artisan migrate` before signing in.
- Run the test suite with `php artisan test`.

## Project layout

| Path | What it holds |
|------|---------------|
| `app/Http/Controllers` | Request handling for auth, conferences, venues, sessions, speakers, registrations, members and reports |
| `app/Models` | Eloquent models and relationships |
| `app/Http/Middleware` | Role-based route protection |
| `database/migrations` | Database schema |
| `database/seeders` | Demo accounts and sample data |
| `resources/views` | Blade templates (layout, navigation, sidebar, screens) |
| `routes/web.php` | Application routes |

## Contact and support

Questions, issues or need help setting it up? Reach us at [makostech.me/contact](https://makostech.me/contact).