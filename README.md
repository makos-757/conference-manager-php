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

## Tools you need

Install these before starting. Each section shows the quickest route for Windows, macOS and Linux.

| Tool | Version | Used for |
|------|---------|----------|
| Git | any recent | Cloning the repository |
| PHP | 8.2 or newer | Running Laravel |
| Composer | 2.x | Installing PHP dependencies |
| MySQL or MariaDB | 5.7+ / 10.4+ | The database (XAMPP bundles both PHP and MySQL) |
| Node.js | 18 or newer | Building the frontend assets with Vite |

### Git

- **Windows:** install from [git-scm.com](https://git-scm.com/download/win).
- **macOS:** `brew install git` (or install Xcode Command Line Tools with `xcode-select --install`).
- **Linux:** `sudo apt install git` (Debian/Ubuntu).

Check it:

```bash
git --version
```

### PHP 8.2+

The easiest route on Windows and macOS is **XAMPP**, which bundles PHP, MySQL and phpMyAdmin:

- Download XAMPP from [apachefriends.org](https://www.apachefriends.org/) and install it.
- **macOS:** the binaries live in `/Applications/XAMPP/xamppfiles/bin` — add that folder to your `PATH`, or run commands from the XAMPP shell.
- **Windows:** the binaries live in `C:\xampp\php` — add that folder to your `PATH`, or use the XAMPP shell.

On macOS with Homebrew, or on Linux, you can install PHP directly:

- **macOS:** `brew install php composer`
- **Linux (Debian/Ubuntu):** `sudo apt install php8.2-cli php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl composer`

Laravel needs these PHP extensions: `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath` (XAMPP ships them all).

Check it:

```bash
php -v      # should print PHP 8.2 or newer
php -m      # lists the loaded extensions
```

### Composer

- **Windows:** install the Composer installer from [getcomposer.org](https://getcomposer.org/download/).
- **macOS:** `brew install composer`
- **Linux:** `sudo apt install composer`

Check it:

```bash
composer -V
```

### MySQL / MariaDB

- **XAMPP (Windows/macOS):** start the **MySQL** module from the XAMPP control panel. That is the database server — no separate install needed. phpMyAdmin is available at `http://localhost/phpmyadmin` for creating databases.
- **macOS (Homebrew):** `brew install mysql` then `brew services start mysql`.
- **Linux:** `sudo apt install mysql-server` (or `mariadb-server`) then `sudo service mysql start`.

Check it:

```bash
mysql --version
```

### Node.js 18+

- **Windows/macOS:** install the LTS release from [nodejs.org](https://nodejs.org/), or on macOS with Homebrew: `brew install node`.
- **Linux:** `sudo apt install nodejs npm`.

npm (the Node package manager) ships with Node.js.

Check it:

```bash
node -v
npm -v
```

## Installation

Clone the repository and open a terminal in the project folder:

```bash
git clone https://github.com/makos-757/conference-manager-php.git
cd conference-manager-php
```

### 1. Install the PHP dependencies

```bash
composer install
```

### 2. Configure the environment

```bash
# macOS / Linux
cp .env.example .env

# Windows (cmd)
copy .env.example .env
```

Then generate the application key:

```bash
php artisan key:generate
```

### 3. Create the database

Start MySQL (XAMPP control panel or the service), then create an empty database in phpMyAdmin or from the CLI:

```sql
CREATE DATABASE conference_manager CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 4. Set your database credentials in `.env`

Open `.env` and update the `DB_*` lines to match your MySQL user and the database you just created:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=conference_manager
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

`.env` is git-ignored — never commit your real credentials.

### 5. Create the tables and demo data

```bash
php artisan migrate --seed
```

The seeder creates one demo account per role plus a sample venue, conference, session, speaker and registration. Demo credentials live in `database/seeders/DatabaseSeeder.php` — change the demo password before deploying.

### 6. Build the frontend assets

```bash
npm install
npm run build
```

### 7. Start the app

```bash
php artisan serve
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Notes

- Sessions, cache and the queue use the database, so run `php artisan migrate` before signing in.
- If you change files in `resources/`, rebuild the assets with `npm run build` (or run `npm run dev` while developing).
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

## License

Released under the [MIT License](LICENSE) — free to use, modify and distribute, for learning or real development.

## Contact and support

Questions, issues or need help setting it up? Reach us at [makostech.me/contact](https://makostech.me/contact).