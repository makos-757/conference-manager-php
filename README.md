# CONVENE – CONFERENCE MANAGEMENT SYSTEM

**Application Programming for the Internet – Academic Group Project**

**Framework:** Laravel 12 (PHP)
**Database:** MySQL
**Frontend:** Laravel Blade, HTML, CSS and JavaScript
**Development Environment:** XAMPP, Composer and Visual Studio Code
**Version Control:** Git and GitHub

> **Status:** This is a fresh Laravel 12 installation. The README documents both what currently exists and what the eight team members will build over the three-week project.

---

## Table of Contents

1. Project Overview
2. Problem Statement
3. Project Objectives
4. Main Application Features
5. User Roles and Permissions
6. Technology Stack
7. System Requirements
8. Installation and Setup
9. Database Configuration
10. Database Tables and Relationships
11. Actual Laravel Project Structure
12. Main Application Routes
13. JSON API Endpoint
14. Business Rules
15. Validation and Authorization
16. Testing Instructions
17. Git and GitHub Workflow
18. Group Members and Task Allocation
19. Current Project Status

---

# 1. Project Overview

**Convene** is a web-based Conference Management System developed using Laravel 12 and PHP.

The application provides a centralized platform for organising academic conferences, workshops, seminars and professional events. It enables conference organisers to manage conferences, venues, sessions and speakers while allowing attendees to browse available conferences, register for sessions and record their attendance.

The system uses a relational database (MySQL) to store and manage information. Laravel handles application routing, database operations, authentication, authorization, validation and business logic. The frontend uses Laravel Blade templates with HTML, CSS and JavaScript.

---

# 2. Problem Statement

Universities and organisations frequently organise conferences, workshops and seminars using spreadsheets, emails and paper-based registration systems.

These methods create several challenges:

1. Attendees may register more than once for the same session.
2. Organisers may struggle to monitor session capacity.
3. Conference schedules and speaker information may be scattered across different documents.
4. Attendee registration records may be difficult to retrieve.
5. Session attendance may be recorded manually using paper lists.
6. Organisers may find it difficult to identify registered attendees and monitor attendance.

---

# 3. Project Objectives

The application manages academic conferences, sessions, speakers, venues, attendee registrations and attendance.

The application must demonstrate the Laravel concepts required by the lecturer:

- Laravel routes
- Controllers
- Blade views
- Eloquent models
- Database migrations and relationships
- CRUD operations
- Server-side validation
- User authentication
- Role-based authorization
- Business rules
- Search and filtering
- A simple JSON API endpoint
- Basic application testing

This is a modest academic application. The team will avoid introducing unnecessary enterprise architecture or advanced features.

---

# 4. Main Application Features

## Completed Features

| Feature | Status |
|---|---|
| Laravel 12 installation | Completed |
| MySQL database configuration | Completed |
| Default users migration (users, password_reset_tokens, sessions) | Completed |
| Basic welcome page (Blade view) | Completed |
| Example unit and feature tests | Completed |
| Database seeder (creates one test user) | Completed |
| User model with mass-assignable fields | Completed |
| Composer dependencies installed | Completed |
| Vite frontend tooling configured | Completed |

## Planned Features

| Feature | Owner |
|---|---|
| User authentication (register, login, logout) | Samuel |
| Role-based access control middleware | Samuel |
| User management (admin CRUD) | Samuel |
| Conference CRUD | Austin |
| Venue CRUD | Jeff |
| Session CRUD | Jeff |
| Speaker profile management | Stephen |
| Speaker-to-session assignment | Stephen |
| Attendee session registration | Sean |
| Registration business rules enforcement | Sean |
| Attendance check-in | Sean |
| JSON API endpoint | Maina |
| Dashboard summaries | Maina |
| Automated feature tests | Maina |
| Blade layouts and navigation | Adachi |
| Role-specific views | Adachi |

---

# 5. User Roles and Permissions

The application will implement four user roles. Access restrictions must be enforced on the server using middleware and policies.

| Role | Responsibilities |
|---|---|
| Administrator | Manage users, assign roles and oversee conferences. |
| Organiser | Create and manage conferences, venues, sessions and speakers. |
| Speaker | View assigned sessions and speaker information. |
| Attendee | Browse conferences, register for sessions and view personal registrations. |

## Planned Permission Matrix

| Function | Admin | Organiser | Speaker | Attendee |
|---|---|---|---|---|
| Manage users | Yes | No | No | No |
| View all conferences | Yes | Yes | Assigned | Public |
| Create conferences | Yes | Yes | No | No |
| Edit conferences | Yes | Yes* | No | No |
| Manage venues | Yes | Yes* | No | No |
| Manage sessions | Yes | Yes* | No | No |
| Assign speakers | Yes | Yes* | No | No |
| View assigned sessions | Yes | Yes | Yes | No |
| Register for sessions | No | No | No | Yes |
| Cancel own registration | No | No | No | Yes |
| Check in attendees | Yes | Yes* | No | No |
| View own registrations | No | No | No | Yes |

`*` Organisers can manage records belonging to conferences they are authorised to manage.

**Important:** Public registration must only create attendee accounts. Users must not be able to select admin or organiser roles from a registration form. Administrator accounts should be created through a controlled seeder or by an authorised administrator.

---

# 6. Technology Stack

| Layer | Technology |
|---|---|
| Backend Framework | Laravel 12 |
| Programming Language | PHP 8.2+ |
| Dependency Management | Composer |
| Frontend | Blade Templates |
| Markup | HTML5 |
| Styling | CSS3 |
| Client-side Interaction | JavaScript |
| Database | MySQL |
| Database Administration | phpMyAdmin (for MySQL) |
| ORM | Laravel Eloquent ORM |
| Routing | Laravel Routing |
| Authentication | Laravel Authentication |
| Authorization | Middleware and Policies |
| Validation | Laravel Validation |
| API | Laravel JSON Responses |
| Local Server | XAMPP Apache or PHP built-in server |
| Version Control | Git |
| Repository Hosting | GitHub |
| Code Editor | Visual Studio Code |
| Frontend Build Tool | Vite (via package.json) |

**Note:** Composer manages PHP dependencies. Node.js and npm are used only for frontend asset compilation through Vite. They are not the backend framework.

---

# 7. System Requirements

Before running the project, install:

- PHP 8.2 or higher, compatible with Laravel 12.
- Composer.
- XAMPP (for MySQL and Apache) or PHP built-in server.
- MySQL (required).
- Git.
- Visual Studio Code.
- Node.js and npm (only if compiling Vite frontend assets).

Check installed versions:

```bash
php -v
composer -V
mysql --version
git --version
node -v
npm -v
```

---

# 8. Installation and Setup

## 8.1 Clone the Repository

```bash
git clone https://github.com/makos-757/conference-manager-php.git
cd conference-manager-php
```

## 8.2 Install PHP Dependencies

```bash
composer install
```

## 8.3 Configure Environment Variables

Copy the example environment file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

## 8.4 Create the Database

The default database is MySQL. Configure your `.env` file with the MySQL connection details.

To use MySQL instead, start Apache and MySQL in XAMPP, then create a database:

```text
http://localhost/phpmyadmin
```

Create a database named `conference-manager_db` using the `utf8mb4` character set.

## 8.5 Configure Database Connection (MySQL)

Edit the `.env` file:

```env
APP_NAME=Convene
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=conference-manager_db
DB_USERNAME=root
DB_PASSWORD=
```

Set the database password according to your local MySQL configuration.

## 8.6 Run Database Migrations

```bash
php artisan migrate
```

## 8.7 Seed Initial Data

```bash
php artisan db:seed
```

## 8.8 Start the Application

```bash
php artisan serve
```

Open `http://127.0.0.1:8000`

If frontend assets are being compiled through Vite, install and build them:

```bash
npm install
npm run build
```

For a one-time automated setup, you can also run:

```bash
composer run setup
```

---

# 9. Database Configuration

The application uses MySQL. SQLite is not used.

## Current Database Tables

Only the default Laravel tables exist:

| Table | Purpose |
|---|---|
| users | Stores user accounts (id, name, email, password, remember_token, timestamps) |
| password_reset_tokens | Stores password reset tokens |
| sessions | Stores application session data |

## Planned Database Tables

The following tables will be created as development progresses:

| Table | Purpose |
|---|---|
| conferences | Stores conference information |
| venues | Stores conference locations and rooms |
| sessions | Stores scheduled conference sessions |
| speaker_profiles | Stores additional speaker information |
| session_speaker | Connects speakers to sessions (many-to-many pivot) |
| session_registrations | Stores attendee registrations and attendance |

## Database Relationships (Planned)

1. One user can organise multiple conferences (`hasMany`).
2. One conference belongs to one organiser (`belongsTo`).
3. One conference can have multiple venues (`hasMany`).
4. One conference can have multiple sessions (`hasMany`).
5. One venue can host multiple sessions at different times (`hasMany`).
6. One speaker profile belongs to one user (`hasOne`).
7. One speaker can be assigned to multiple sessions (`belongsToMany`).
8. One session can have multiple speakers (`belongsToMany`).
9. One attendee can register for multiple sessions (`hasMany`).
10. One session can have multiple attendee registrations (`hasMany`).

---

# 10. Actual Laravel Project Structure

The project follows Laravel's standard directory structure. The following reflects the actual current state:

```text
conference-manager/
│
├── app/
│   │
│   ├── Http/
│   │   │
│   │   ├── Controllers/
│   │   │   └── Controller.php (base abstract controller)
│   │   │
│   │   └── Middleware/ (empty - planned for role middleware)
│   │
│   ├── Models/
│   │   └── User.php (extends Authenticatable)
│   │
│   ├── Providers/
│   │   └── AppServiceProvider.php
│   │
│   └── Policies/ (empty - planned for authorization policies)
│
├── bootstrap/
│   ├── app.php
│   └── providers.php
│
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   └── other Laravel config files
│
├── database/
│   │
│   ├── factories/
│   │   └── UserFactory.php
│   │
│   ├── migrations/
│   │   ├── 0001_01_01_000000_create_users_table.php (users, password_reset_tokens, sessions)
│   │   ├── 0001_01_01_000001_create_cache_table.php
│   │   └── 0001_01_01_000002_create_jobs_table.php
│   │
│   └── seeders/
│       └── DatabaseSeeder.php (creates one test user)
│
├── public/
│   ├── index.php
│   └── vite hot reload / build assets
│
├── resources/
│   │
│   ├── css/
│   │   └── app.css (planned)
│   │
│   ├── js/
│   │   └── app.js (planned)
│   │
│   └── views/
│       └── welcome.blade.php (default welcome page)
│
├── routes/
│   ├── web.php (only defines the root route)
│   ├── console.php
│   └── api.php (not yet created - planned for JSON API)
│
├── storage/ (Laravel storage directories)
│
├── tests/
│   ├── TestCase.php
│   ├── Feature/
│   │   └── ExampleTest.php
│   └── Unit/
│       └── ExampleTest.php
│
├── .env
├── .env.example
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── package.json
├── phpunit.xml
├── README.md
└── vite.config.js
```

### Planned Additional Directories

| Directory | Purpose |
|---|---|
| app/Http/Controllers/Auth/ | Authentication controllers |
| app/Http/Controllers/Admin/ | Administrator controllers |
| app/Http/Controllers/Organiser/ | Organiser controllers |
| app/Http/Controllers/Attendee/ | Attendee controllers |
| app/Http/Controllers/Speaker/ | Speaker controllers |
| app/Http/Controllers/Api/ | JSON API controllers |
| app/Http/Middleware/ | Role-based middleware |
| app/Http/Requests/ | Form request validation classes |
| app/Policies/ | Authorization policies |
| app/Services/ | Reusable business logic |
| resources/views/layouts/ | Shared Blade layouts |
| resources/views/auth/ | Authentication views |
| resources/views/admin/ | Administrator views |
| resources/views/organiser/ | Organiser views |
| resources/views/speaker/ | Speaker views |
| resources/views/attendee/ | Attendee views |

---

# 11. Main Application Routes

## Current Routes

The `routes/web.php` file currently contains only:

```php
Route::get('/', function () {
    return view('welcome');
});
```

## Planned Routes

### Public Routes

| Method | Route | Description |
|---|---|---|
| GET | / | Homepage |
| GET | /conferences | Browse conferences |
| GET | /conferences/{id} | View conference details |
| GET | /login | Login page |
| GET | /register | Registration page |

### Authentication Routes

| Method | Route | Description |
|---|---|---|
| POST | /register | Create attendee account |
| POST | /login | Authenticate user |
| POST | /logout | Log out |

### Administrator Routes (planned)

| Method | Route | Description |
|---|---|---|
| GET | /admin/dashboard | Admin dashboard |
| GET | /admin/users | List users |
| GET | /admin/users/create | Create user |
| POST | /admin/users | Store user |
| GET | /admin/users/{id}/edit | Edit user |
| PUT | /admin/users/{id} | Update user |
| DELETE | /admin/users/{id} | Delete user |

### Organiser Routes (planned)

| Method | Route | Description |
|---|---|---|
| GET | /organiser/dashboard | Organiser dashboard |
| GET | /organiser/conferences | List conferences |
| GET | /organiser/conferences/create | Create conference form |
| POST | /organiser/conferences | Store conference |
| GET | /organiser/conferences/{id} | View conference |
| GET | /organiser/conferences/{id}/edit | Edit conference |
| PUT | /organiser/conferences/{id} | Update conference |
| DELETE | /organiser/conferences/{id} | Delete conference |

Additional resource routes will be added for venues, sessions, speakers and registrations.

### Attendee Routes (planned)

| Method | Route | Description |
|---|---|---|
| GET | /attendee/dashboard | Attendee dashboard |
| GET | /attendee/conferences | Browse conferences |
| GET | /attendee/sessions | Browse sessions |
| POST | /attendee/sessions/{id}/register | Register for session |
| DELETE | /attendee/registrations/{id} | Cancel registration |
| GET | /attendee/registrations | View own registrations |

### Speaker Routes (planned)

| Method | Route | Description |
|---|---|---|
| GET | /speaker/dashboard | Speaker dashboard |
| GET | /speaker/profile | View speaker profile |
| GET | /speaker/sessions | View assigned sessions |

### Check-in Routes (planned)

| Method | Route | Description |
|---|---|---|
| GET | /organiser/registrations | View registered attendees |
| POST | /organiser/registrations/{id}/check-in | Check in attendee |

---

# 12. JSON API Endpoint

The lecturer requires at least one useful JSON endpoint.

## Planned Endpoint

```http
GET /api/conferences
```

### Example Response

```json
{
    "success": true,
    "data": [
        {
            "id": 1,
            "title": "Technology Innovation Conference",
            "description": "An academic technology conference",
            "start_date": "2026-11-20",
            "end_date": "2026-11-22",
            "status": "published"
        }
    ]
}
```

The endpoint should retrieve actual conference records from the database using Eloquent. It must not return hardcoded demonstration data.

### Additional Endpoint (planned)

```http
GET /api/healthz
```

Example:

```json
{
    "status": "ok",
    "application": "Convene"
}
```

The API routes will be defined in `routes/api.php`, which has not yet been created.

For a fresh Laravel 12 installation, API routing can be installed using:

```bash
php artisan install:api
```

---

# 13. Business Rules

The system must enforce the following business rules. All four rules are planned and not yet implemented.

## BR01: Session Capacity Rule

A session cannot accept more registrations than its available capacity.

Example:
- Session capacity: 50 attendees.
- Existing confirmed registrations: 50.
- New registration attempt: Rejected.

The system must check capacity on the server before saving a registration.

## BR02: No Duplicate Registration

An attendee cannot register for the same session twice.

This must be enforced using both application validation and a database unique constraint on (session_id, attendee_id).

## BR03: Registration Deadline

An attendee cannot register for a session when its conference registration deadline has passed.

## BR04: No Overlapping Sessions

An attendee cannot register for two sessions that overlap in time.

For example:
- Session A: 10:00 AM–11:30 AM.
- Session B: 11:00 AM–12:00 PM.

The second registration must be rejected.

## Additional Planned Rules

- **BR05: Session Date Validation** – A session must fall within its conference dates. Its end time must also be later than its start time.
- **BR06: Venue Scheduling** – A venue cannot host two sessions at overlapping times.
- **BR07: Check-in Restriction** – Only an authorised organiser can check in attendees. An attendee cannot check in someone else, and an already cancelled registration cannot be checked in.

---

# 14. Validation and Authorization

All user-submitted data must be validated on the server.

## Planned Validation Rules

### Conference Validation

```php
$request->validate([
    'title' => 'required|string|max:255',
    'description' => 'required|string',
    'start_date' => 'required|date',
    'end_date' => 'required|date|after_or_equal:start_date',
    'registration_deadline' => 'required|date',
]);
```

### Venue Validation

```php
$request->validate([
    'name' => 'required|string|max:255',
    'capacity' => 'required|integer|min:1',
]);
```

### Session Validation

```php
$request->validate([
    'title' => 'required|string|max:255',
    'start_time' => 'required|date',
    'end_time' => 'required|date|after:start_time',
    'capacity' => 'required|integer|min:1',
]);
```

### Registration Validation

Registration validation must also check:
- Whether the session exists.
- Whether the conference is published.
- Whether registration is still open.
- Whether the attendee has already registered.
- Whether the session has available capacity.
- Whether the attendee has another overlapping session.

## Authorization

Role-based middleware will protect routes. The planned roles are:

```text
admin
organiser
speaker
attendee
```

Access restrictions must be enforced on the server. Users must not be able to assign themselves elevated roles during registration.

---

# 15. Testing Instructions

## Current Test Setup

The project includes default Laravel testing infrastructure:

- `tests/TestCase.php` – Base test case
- `tests/Unit/ExampleTest.php` – Default unit test
- `tests/Feature/ExampleTest.php` – Default feature test

## Running Tests

```bash
php artisan test
```

The test environment uses an in-memory SQLite database (see `phpunit.xml`), so tests will not modify the development MySQL database.

## Planned Test Cases

| Test | Expected Result |
|---|---|
| Register with valid details | Account created |
| Register with invalid email | Validation error |
| Login with correct credentials | Successful login |
| Login with incorrect password | Login rejected |
| Access protected page without login | Redirect to login |
| Attendee accesses admin page | Access denied |
| Organiser creates conference | Conference saved |
| Organiser updates conference | Changes saved |
| Organiser deletes conference | Record removed where permitted |
| Attendee registers for available session | Registration successful |
| Attendee registers twice | Duplicate rejected |
| Attendee registers for full session | Registration rejected |
| Attendee registers after deadline | Registration rejected |
| Attendee registers for overlapping session | Registration rejected |
| Organiser checks in attendee | Attendance recorded |
| JSON endpoint requested | Valid JSON returned |

---

# 16. Git and GitHub Workflow

## Repository

https://github.com/makos-757/conference-manager-php

## Main Branch

The `main` branch contains the stable integrated application. Members should not directly push development work to `main`.

## Branch Structure

```text
main
  |
  |---- feature/authentication
  |
  |---- feature/conference-management
  |
  |---- feature/database-design
  |
  |---- feature/venue-session-management
  |
  |---- feature/speaker-management
  |
  |---- feature/attendee-registration
  |
  |---- feature/attendance-checkin
  |
  |---- feature/dashboard-api
```

## Individual Git Workflow

### Before Starting Work

```bash
git checkout main
git pull origin main
git checkout -b feature/conference-management
```

### After Completing Work

```bash
git status
git add app/Http/Controllers/Organiser/ConferenceController.php
git commit -m "feat: implement conference management"
git push -u origin feature/conference-management
```

Open a Pull Request on GitHub. After review and approval, merge into `main`.

## Conventional Commit Examples

```text
feat: add user authentication
feat: implement role-based access control
feat: add conference CRUD operations
feat: implement session registration
feat: add speaker management
fix: prevent duplicate session registration
fix: validate conference dates
test: add registration feature tests
docs: update project README
```

## Important Git Rules

1. Do not force push.
2. Do not delete the main branch.
3. Do not push directly to main.
4. Pull the latest changes before starting new work.
5. Work on assigned files and modules.
6. Avoid modifying another member's files without communication.
7. Test your changes before committing.
8. Every member must make identifiable commits.
9. Submit completed work through Pull Requests.
10. Do not commit `.env` or private credentials.

---

# 17. Group Members and Task Allocation

The project has eight members. To ensure everyone contributes meaningfully, the application is divided into eight responsibilities grouped into major development areas.

| Member | Student Number | Primary Responsibility |
|---|---|---|
| Makokha Samuel | 204411 | Project coordination, authentication and access control |
| Austin Omondi | 218839 | Conference management |
| Larry Kosgey | 212858 | Database design and integration |
| Jeff Muiruri | 222174 | Venues and session scheduling |
| Sean Mwangi | 220451 | Attendee registration and check-in |
| Stephen Njoroge | 223006 | Speaker management |
| Maina Wilfred | 223605 | JSON API and testing |
| Elvis Adachi | 212657 | User interface and integration |

## File Ownership

| Member | Main Files to Work On |
|---|---|
| Samuel | `app/Models/User.php`, authentication controllers, `app/Http/Middleware/RoleMiddleware.php`, `app/Http/Controllers/Admin/UserController.php`, `routes/web.php` |
| Austin | `app/Models/Conference.php`, `app/Http/Controllers/Organiser/ConferenceController.php`, conference validation, conference views |
| Larry | `database/migrations/`, `database/seeders/`, `database/factories/`, Eloquent models and relationships |
| Jeff | `app/Models/Venue.php`, `app/Models/Session.php`, `app/Http/Controllers/Organiser/VenueController.php`, `app/Http/Controllers/Organiser/SessionController.php` |
| Sean | `app/Models/SessionRegistration.php`, `app/Http/Controllers/Attendee/RegistrationController.php`, `app/Http/Controllers/Organiser/RegistrationController.php`, `app/Services/SessionRegistrationService.php` |
| Stephen | `app/Models/SpeakerProfile.php`, speaker controller, speaker views, speaker-to-session assignment |
| Maina | `routes/api.php`, `app/Http/Controllers/Api/ConferenceApiController.php`, `app/Http/Controllers/DashboardController.php`, `tests/Feature/`, `tests/Unit/` |
| Adachi | `resources/views/layouts/`, `resources/views/components/`, `resources/views/auth/`, `resources/css/app.css`, `resources/js/app.js`, shared navigation and styling |

## Collaboration Guidelines

- Each member works primarily on their assigned files.
- Coordinate shared changes (e.g., `routes/web.php`, `routes/api.php`, `app/Models/User.php`, `bootstrap/app.php`, `database/seeders/DatabaseSeeder.php`) through pull requests and discussions.
- Use descriptive commit messages.
- Submit completed work through Pull Requests for review.

---

# 18. Current Project Status

## What Exists

- Fresh Laravel 12 installation with all default files.
- MySQL database configured for the project.
- Default users migration with `users`, `password_reset_tokens` and `sessions` tables.
- Default welcome Blade view.
- Default unit and feature test examples.
- Database seeder that creates one test user.
- User model with mass-assignable `name`, `email` and `password` fields.
- Composer dependencies installed.
- Vite frontend tooling configured via `package.json`.

## What Needs to Be Built

- User authentication (register, login, logout).
- Role-based access control middleware.
- User management (admin CRUD).
- Conference CRUD.
- Venue CRUD.
- Session CRUD.
- Speaker profile management.
- Speaker-to-session assignment.
- Attendee session registration.
- Registration business rules enforcement.
- Attendance check-in.
- JSON API endpoint.
- Dashboard summaries.
- Automated feature tests.
- Blade layouts and navigation.
- Role-specific views.

## Next Steps

1. Team members review this README and confirm task allocation.
2. Each member creates their feature branch from `main`.
3. Development begins according to the three-week plan.
4. Weekly integration and review sessions.