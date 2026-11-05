# CONVENE – CONFERENCE MANAGEMENT SYSTEM

**Application Programming for the Internet – Laravel Group Project**

**Framework:** Laravel 12 (PHP)  
**Database:** MySQL  
**Frontend:** Laravel Blade, HTML, CSS and JavaScript  
**Development Environment:** XAMPP, Composer and Visual Studio Code  
**Version Control:** Git and GitHub

---

## Table of Contents

1. Project Overview
2. Project Purpose and Problem Statement
3. Project Users and Roles
4. Project Scope and Main Features
5. Functional Requirements
6. Non-Functional Requirements
7. Technology Stack
8. Prerequisites
9. Getting Started
10. Project Structure
11. Database Design
12. Database Tables and Fields
13. Database Relationships
14. Business Rules
15. Authentication and Authorization
16. Application Routes
17. Controllers and Their Responsibilities
18. Blade Views and User Interface
19. JSON API
20. Validation and Error Handling
21. Testing Strategy
22. Git and GitHub Team Workflow
23. Team Structure and Task Allocation
24. File Ownership and Contribution Rules
25. Three-Week Development Plan
26. Environment Configuration
27. Security Considerations
28. Deployment and Submission
29. Final Project Checklist
30. Team Members

---

# 1. Project Overview

**Convene** is a web-based Conference Management System developed using Laravel and PHP.

The application provides a centralized platform for organising academic conferences, workshops, seminars and professional events.

It enables conference organisers to manage conferences, venues, sessions and speakers while allowing attendees to browse available conferences, register for sessions and record their attendance.

The application uses a relational MySQL database to store and manage information. Laravel handles application routing, database operations, authentication, authorization, validation and business logic.

The system uses Laravel Blade to generate dynamic web pages.

### Main Features

- User registration and authentication.
- Role-based access control.
- Conference creation and management.
- Venue management.
- Session creation and scheduling.
- Speaker profile management.
- Speaker-to-session assignment.
- Attendee session registration.
- Session capacity management.
- Session attendance and check-in.
- Conference and session search.
- Basic dashboard and registration summaries.
- JSON API endpoint.

---

# 2. Project Purpose and Problem Statement

## 2.1 Problem Statement

Universities and organisations frequently organise conferences, workshops and seminars using spreadsheets, emails and paper-based registration systems.

These methods create several challenges:

1. Attendees may register more than once for the same session.
2. Organisers may struggle to monitor session capacity.
3. Conference schedules and speaker information may be scattered across different documents.
4. Attendee registration records may be difficult to retrieve.
5. Session attendance may be recorded manually using paper lists.
6. Organisers may find it difficult to identify registered attendees and monitor attendance.

## 2.2 Proposed Solution

Convene provides a centralized web application that allows conference organisers to manage conferences, sessions, speakers and attendee registrations.

The system automatically enforces registration rules, prevents duplicate registrations, checks session capacity and prevents attendees from registering for overlapping sessions.

It also provides a check-in mechanism that allows organisers to record attendance electronically.

---

# 3. Project Users and Roles

The system has four main user roles.

| Role | Description |
|---|---|
| Administrator | Manages users, roles and overall system activities. |
| Organiser | Creates and manages conferences, venues, sessions and speakers. |
| Speaker | Views assigned sessions and speaker information. |
| Attendee | Browses conferences, registers for sessions and views personal registrations. |

## 3.1 Administrator

The administrator has the highest level of access.

Responsibilities:

- View the system dashboard.
- View all registered users.
- Create and manage user accounts.
- Assign user roles.
- Activate or deactivate accounts.
- View all conferences.
- Monitor system activities.

## 3.2 Organiser

Responsibilities:

- Create conferences.
- View conferences they manage.
- Update conference information.
- Delete conferences where permitted.
- Manage conference venues.
- Create and manage sessions.
- Assign speakers to sessions.
- View session registrations.
- Check in attendees.
- View registration and attendance summaries.

## 3.3 Speaker

Responsibilities:

- View their speaker profile.
- View assigned conferences.
- View assigned sessions.
- View session dates, times and venues.
- View the number of registered attendees.

Speakers cannot create or delete conferences.

## 3.4 Attendee

Responsibilities:

- Register an account.
- Log in and log out.
- Browse available conferences.
- Search for conferences and sessions.
- View conference details.
- View available sessions.
- Register for sessions.
- Cancel eligible registrations.
- View personal registrations.
- View attendance status.

---

# 4. Project Scope and Main Features

The project will focus on the essential workflow of conference organisation.

## 4.1 Core Modules

| Module | Main Functionality |
|---|---|
| Authentication | Registration, login and logout. |
| User Management | Manage users and assign roles. |
| Conference Management | Create, view, update and delete conferences. |
| Venue Management | Manage conference venues and room capacity. |
| Session Management | Create and schedule conference sessions. |
| Speaker Management | Manage speaker profiles and assignments. |
| Attendee Registration | Register attendees for sessions. |
| Attendance Management | Record session check-ins. |
| Search and Filtering | Search conferences and filter records. |
| Dashboard | Display basic conference and registration statistics. |
| JSON API | Return conference information in JSON format. |

## 4.2 Features Outside the Initial Scope

To keep the project manageable within the semester, the following are not part of the initial implementation:

- Online payment integration.
- SMS notifications.
- Live chat.
- Mobile applications.
- Artificial intelligence.
- Complex analytics.
- Microservices.
- External cloud storage integrations.
- Large-scale reporting infrastructure.

These features may be considered in the future but are not necessary for the lecturer's minimum requirements.

---

# 5. Functional Requirements

The system shall:

| ID | Requirement | Priority |
|---|---|---|
| FR01 | Allow users to register and log in. | Must |
| FR02 | Restrict access according to user roles. | Must |
| FR03 | Allow administrators to manage users. | Must |
| FR04 | Allow organisers to create conferences. | Must |
| FR05 | Allow organisers to update and delete conferences. | Must |
| FR06 | Allow users to view available conferences. | Must |
| FR07 | Allow organisers to manage venues. | Must |
| FR08 | Allow organisers to create and manage sessions. | Must |
| FR09 | Allow organisers to create and manage speaker profiles. | Must |
| FR10 | Allow organisers to assign speakers to sessions. | Must |
| FR11 | Allow attendees to register for sessions. | Must |
| FR12 | Prevent duplicate session registrations. | Must |
| FR13 | Prevent registration when a session is full. | Must |
| FR14 | Prevent registration after the deadline. | Must |
| FR15 | Prevent registration for overlapping sessions. | Must |
| FR16 | Allow attendees to cancel eligible registrations. | Must |
| FR17 | Allow organisers to check in registered attendees. | Must |
| FR18 | Allow speakers to view assigned sessions. | Must |
| FR19 | Provide conference search and filtering. | Must |
| FR20 | Provide a JSON endpoint for conference information. | Must |
| FR21 | Display basic dashboard statistics. | Should |
| FR22 | Prevent overlapping venue bookings. | Should |

---

# 6. Non-Functional Requirements

| Category | Requirement |
|---|---|
| Security | Passwords must be securely hashed using Laravel authentication mechanisms. |
| Security | Protected pages must require authentication. |
| Authorization | Users must only access operations permitted by their roles. |
| Validation | All form submissions must undergo server-side validation. |
| Performance | Database queries should be efficient and properly indexed. |
| Usability | The interface should be simple and easy to navigate. |
| Reliability | Invalid operations should return appropriate errors. |
| Maintainability | Code should follow Laravel naming conventions and structure. |
| Portability | The project should be reproducible using migrations and seeders. |
| Version Control | Development must be tracked using Git and GitHub. |

---

# 7. Technology Stack

| Layer | Technology |
|---|---|
| Backend Framework | Laravel 12 |
| Programming Language | PHP |
| Dependency Management | Composer |
| Frontend | Blade Templates |
| Markup | HTML5 |
| Styling | CSS3 |
| Client-side Interaction | JavaScript |
| Database | MySQL |
| Database Administration | phpMyAdmin |
| ORM | Laravel Eloquent ORM |
| Routing | Laravel Routing |
| Authentication | Laravel Authentication |
| Authorization | Middleware and Policies |
| Validation | Laravel Validation |
| API | Laravel JSON Responses |
| Local Server | XAMPP Apache |
| Version Control | Git |
| Repository Hosting | GitHub |
| Code Editor | Visual Studio Code |

**Important:** Composer manages PHP dependencies. Laravel's frontend asset tooling may also use Node.js and npm if Vite is used. npm is not the backend framework.

---

# 8. Prerequisites

Before running the project, install:

- PHP 8.2 or higher, compatible with Laravel 12.
- Composer.
- XAMPP.
- MySQL.
- Git.
- Visual Studio Code.
- Node.js and npm if compiling Vite frontend assets.

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

# 9. Getting Started

## 9.1 Clone the Repository

```bash
git clone https://github.com/makos-757/conference-manager-php.git
```

Enter the project:

```bash
cd conference-manager-php
```

Open Visual Studio Code:

```bash
code .
```

## 9.2 Install PHP Dependencies

```bash
composer install
```

## 9.3 Configure Environment Variables

Copy the example environment file:

```bash
cp .env.example .env
```

Generate the Laravel application key:

```bash
php artisan key:generate
```

## 9.4 Create the MySQL Database

Start Apache and MySQL in XAMPP.

Open:

```text
http://localhost/phpmyadmin
```

Create a database named:

```text
convene_db
```

Use the `utf8mb4` character set.

## 9.5 Configure Database Connection

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
DB_DATABASE=convene_db
DB_USERNAME=root
DB_PASSWORD=
```

Set the database password according to your local MySQL configuration.

## 9.6 Run Database Migrations

```bash
php artisan migrate
```

## 9.7 Seed Initial Data

```bash
php artisan db:seed
```

## 9.8 Start the Application

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

If frontend assets are being compiled through Vite, install and build them:

```bash
npm install

npm run build
```

---

# 10. Project Structure

The project follows Laravel's standard directory structure.

The following is the planned application structure. Some folders and files will be created as development progresses.

```text
conference-manager-php/
│
├── app/
│   │
│   ├── Http/
│   │   │
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   ├── Admin/
│   │   │   │   └── UserController.php
│   │   │   │
│   │   │   ├── Organiser/
│   │   │   │   ├── ConferenceController.php
│   │   │   │   ├── VenueController.php
│   │   │   │   ├── SessionController.php
│   │   │   │   └── RegistrationController.php
│   │   │   │
│   │   │   ├── Speaker/
│   │   │   │   └── SpeakerDashboardController.php
│   │   │   │
│   │   │   ├── Attendee/
│   │   │   │   ├── ConferenceController.php
│   │   │   │   └── RegistrationController.php
│   │   │   │
│   │   │   ├── DashboardController.php
│   │   │   └── Api/
│   │   │       └── ConferenceApiController.php
│   │   │
│   │   ├── Middleware/
│   │   │   └── RoleMiddleware.php
│   │   │
│   │   └── Requests/
│   │       ├── StoreConferenceRequest.php
│   │       ├── UpdateConferenceRequest.php
│   │       ├── StoreSessionRequest.php
│   │       ├── StoreVenueRequest.php
│   │       └── RegisterForSessionRequest.php
│   │
│   ├── Models/
│   │   ├── User.php
│   │   ├── Conference.php
│   │   ├── Venue.php
│   │   ├── Session.php
│   │   ├── SpeakerProfile.php
│   │   └── SessionRegistration.php
│   │
│   ├── Policies/
│   │   ├── ConferencePolicy.php
│   │   ├── SessionPolicy.php
│   │   └── RegistrationPolicy.php
│   │
│   ├── Providers/
│   │   └── AppServiceProvider.php
│   │
│   └── Services/
│       └── SessionRegistrationService.php
│
├── bootstrap/
│   ├── app.php
│   └── providers.php
│
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   └── filesystems.php
│
├── database/
│   │
│   ├── factories/
│   │   ├── UserFactory.php
│   │   ├── ConferenceFactory.php
│   │   └── SessionFactory.php
│   │
│   ├── migrations/
│   │   ├── xxxx_create_users_table.php
│   │   ├── xxxx_create_conferences_table.php
│   │   ├── xxxx_create_venues_table.php
│   │   ├── xxxx_create_sessions_table.php
│   │   ├── xxxx_create_speaker_profiles_table.php
│   │   ├── xxxx_create_session_speaker_table.php
│   │   └── xxxx_create_session_registrations_table.php
│   │
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── UserSeeder.php
│       ├── ConferenceSeeder.php
│       └── RoleSeeder.php
│
├── public/
│   ├── css/
│   ├── images/
│   ├── js/
│   └── index.php
│
├── resources/
│   │
│   ├── css/
│   │   └── app.css
│   │
│   ├── js/
│   │   └── app.js
│   │
│   └── views/
│       │
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── guest.blade.php
│       │
│       ├── components/
│       │
│       ├── auth/
│       │   ├── login.blade.php
│       │   └── register.blade.php
│       │
│       ├── admin/
│       │   ├── dashboard.blade.php
│       │   └── users/
│       │
│       ├── organiser/
│       │   ├── dashboard.blade.php
│       │   ├── conferences/
│       │   ├── venues/
│       │   ├── sessions/
│       │   └── registrations/
│       │
│       ├── speaker/
│       │   ├── dashboard.blade.php
│       │   └── sessions/
│       │
│       ├── attendee/
│       │   ├── dashboard.blade.php
│       │   ├── conferences/
│       │   └── registrations/
│       │
│       └── welcome.blade.php
│
├── routes/
│   ├── web.php
│   ├── api.php
│   └── console.php
│
├── storage/
│   ├── app/
│   ├── framework/
│   └── logs/
│
├── tests/
│   ├── Feature/
│   │   ├── AuthenticationTest.php
│   │   ├── ConferenceTest.php
│   │   ├── RegistrationTest.php
│   │   └── RoleAuthorizationTest.php
│   │
│   └── Unit/
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

### Important Laravel Folder Responsibilities

| Folder | Responsibility |
|---|---|
| app/Models | Represents database tables and relationships. |
| app/Http/Controllers | Processes application requests. |
| app/Http/Middleware | Controls access to protected routes. |
| app/Http/Requests | Handles server-side form validation. |
| app/Policies | Defines record-level permissions. |
| app/Services | Contains reusable business logic. |
| database/migrations | Defines and modifies database tables. |
| database/seeders | Inserts initial demonstration data. |
| resources/views | Contains Blade templates. |
| routes/web.php | Defines browser-facing routes. |
| routes/api.php | Defines JSON API routes. |
| tests | Contains automated tests. |
| public | Public entry point and public assets. |
| storage | Stores application files, logs and generated data. |

**Note:** The Laravel installation already contains some files. We should extend the existing structure rather than recreate Laravel's directories.

---

# 11. Database Design

The application uses MySQL as its relational database and Laravel Eloquent ORM for database operations.

The initial design contains seven main tables.

### Main Database Tables

| Table | Purpose |
|---|---|
| users | Stores user accounts and roles. |
| conferences | Stores conference information. |
| venues | Stores conference locations and rooms. |
| sessions | Stores scheduled conference sessions. |
| speaker_profiles | Stores additional speaker information. |
| session_speaker | Connects speakers to sessions. |
| session_registrations | Stores attendee registrations and attendance. |

These tables support the main application workflow without introducing unnecessary complexity.

---

# 12. Database Tables and Fields

## 12.1 users

Stores all system user accounts.

| Field | Type | Description |
|---|---|---|
| id | BIGINT | Primary key |
| name | VARCHAR(255) | Full name |
| email | VARCHAR(255) | Unique email |
| password | VARCHAR(255) | Hashed password |
| role | VARCHAR(30) | admin, organiser, speaker or attendee |
| is_active | BOOLEAN | Account activation status |
| email_verified_at | TIMESTAMP | Email verification |
| remember_token | VARCHAR(100) | Remember-me token |
| created_at | TIMESTAMP | Creation date |
| updated_at | TIMESTAMP | Last update |

The role field determines the user's access level.

A user must have exactly one primary role in this initial implementation.

## 12.2 conferences

Stores conference information.

| Field | Type | Description |
|---|---|---|
| id | BIGINT | Primary key |
| organiser_id | BIGINT | Foreign key to users |
| title | VARCHAR(255) | Conference title |
| description | TEXT | Conference description |
| location | VARCHAR(255) | General location |
| start_date | DATE | Conference starting date |
| end_date | DATE | Conference ending date |
| registration_deadline | DATETIME | Registration closing date |
| status | VARCHAR(30) | draft, published or cancelled |
| created_at | TIMESTAMP | Creation date |
| updated_at | TIMESTAMP | Last update |

## 12.3 venues

Stores conference venues and rooms.

| Field | Type | Description |
|---|---|---|
| id | BIGINT | Primary key |
| conference_id | BIGINT | Foreign key to conferences |
| name | VARCHAR(255) | Venue or room name |
| building | VARCHAR(255) | Building name |
| room_number | VARCHAR(50) | Room number |
| capacity | INTEGER | Maximum venue capacity |
| created_at | TIMESTAMP | Creation date |
| updated_at | TIMESTAMP | Last update |

## 12.4 sessions

Stores individual conference sessions.

| Field | Type | Description |
|---|---|---|
| id | BIGINT | Primary key |
| conference_id | BIGINT | Foreign key to conferences |
| venue_id | BIGINT | Foreign key to venues |
| title | VARCHAR(255) | Session title |
| description | TEXT | Session description |
| start_time | DATETIME | Session starting time |
| end_time | DATETIME | Session ending time |
| capacity | INTEGER | Maximum number of attendees |
| status | VARCHAR(30) | scheduled, cancelled or completed |
| created_at | TIMESTAMP | Creation date |
| updated_at | TIMESTAMP | Last update |

The venue_id may be nullable when a session has not yet been assigned a venue.

## 12.5 speaker_profiles

Stores additional information about users registered as speakers.

| Field | Type | Description |
|---|---|---|
| id | BIGINT | Primary key |
| user_id | BIGINT | Foreign key to users, unique |
| biography | TEXT | Speaker biography |
| organisation | VARCHAR(255) | Speaker's institution |
| photo | VARCHAR(255) | Profile photo path |
| created_at | TIMESTAMP | Creation date |
| updated_at | TIMESTAMP | Last update |

The speaker's name and email are obtained from the users table.

## 12.6 session_speaker

Connects speakers to conference sessions.

This is a pivot table implementing a many-to-many relationship.

| Field | Type | Description |
|---|---|---|
| id | BIGINT | Primary key |
| session_id | BIGINT | Foreign key to sessions |
| speaker_profile_id | BIGINT | Foreign key to speaker_profiles |
| speaker_role | VARCHAR(50) | keynote, speaker, moderator or panelist |
| created_at | TIMESTAMP | Creation date |
| updated_at | TIMESTAMP | Last update |

A session can have multiple speakers, and a speaker can participate in multiple sessions.

A unique constraint should prevent assigning the same speaker to the same session twice.

## 12.7 session_registrations

Stores attendee session registrations and check-in information.

| Field | Type | Description |
|---|---|---|
| id | BIGINT | Primary key |
| session_id | BIGINT | Foreign key to sessions |
| attendee_id | BIGINT | Foreign key to users |
| status | VARCHAR(30) | registered, attended, cancelled or no_show |
| registered_at | DATETIME | Registration timestamp |
| checked_in_at | DATETIME | Attendance timestamp |
| created_at | TIMESTAMP | Creation date |
| updated_at | TIMESTAMP | Last update |

A unique database constraint on session_id and attendee_id prevents duplicate registrations.

---

# 13. Database Relationships

The database relationships are as follows:

```text
USERS
  |
  |------< CONFERENCES
  |          |
  |          |------< VENUES
  |          |
  |          |------< SESSIONS
  |                     |
  |                     |------< SESSION_SPEAKER >------ SPEAKER_PROFILES
  |                     |
  |                     |------< SESSION_REGISTRATIONS
  |
  |------ SPEAKER_PROFILES
  |
  |------< SESSION_REGISTRATIONS
```

### Relationship Explanations

1. One user can organise multiple conferences.
2. One conference belongs to one organiser.
3. One conference can have multiple venues.
4. One conference can have multiple sessions.
5. One venue can host multiple sessions at different times.
6. One speaker profile belongs to one user.
7. One speaker can be assigned to multiple sessions.
8. One session can have multiple speakers.
9. One attendee can register for multiple sessions.
10. One session can have multiple attendee registrations.

### Laravel Eloquent Relationships

The relationships will be implemented using:

- `hasMany()`
- `belongsTo()`
- `hasOne()`
- `belongsToMany()`

For example:

**User model:**

```php
public function conferences()
{
    return $this->hasMany(Conference::class, 'organiser_id');
}

public function speakerProfile()
{
    return $this->hasOne(SpeakerProfile::class);
}
```

**Conference model:**

```php
public function organiser()
{
    return $this->belongsTo(User::class, 'organiser_id');
}

public function sessions()
{
    return $this->hasMany(Session::class);
}

public function venues()
{
    return $this->hasMany(Venue::class);
}
```

**Session model:**

```php
public function conference()
{
    return $this->belongsTo(Conference::class);
}

public function venue()
{
    return $this->belongsTo(Venue::class);
}

public function speakers()
{
    return $this->belongsToMany(
        SpeakerProfile::class,
        'session_speaker'
    )->withPivot('speaker_role')->withTimestamps();
}

public function registrations()
{
    return $this->hasMany(SessionRegistration::class);
}
```

**These are planned examples, not files that should all be created before the group has discussed and approved the design.**

---

# 14. Business Rules

The system must enforce the following business rules.

## BR01: Session Capacity Rule

A session cannot accept more registrations than its available capacity.

Example:

- Session capacity: 50 attendees.
- Existing confirmed registrations: 50.
- New registration attempt: Rejected.

The system must check capacity on the server before saving a registration.

## BR02: No Duplicate Registration

An attendee cannot register for the same session twice.

This must be enforced using both application validation and a database unique constraint.

## BR03: Registration Deadline

An attendee cannot register for a session when its conference registration deadline has passed.

## BR04: No Overlapping Sessions

An attendee cannot register for two sessions that overlap in time.

For example:

- Session A: 10:00 AM–11:30 AM.
- Session B: 11:00 AM–12:00 PM.

The second registration must be rejected.

## BR05: Session Date Validation

A session must fall within its conference dates.

Its end time must also be later than its start time.

## BR06: Venue Scheduling

A venue cannot host two sessions at overlapping times.

This rule should be implemented if time permits.

## BR07: Check-in Restriction

Only an authorised organiser can check in attendees.

An attendee cannot check in someone else, and an already cancelled registration cannot be checked in.

---

# 15. Authentication and Authorization

The system will use Laravel authentication mechanisms.

## Authentication

Users must be able to:

- Register.
- Log in.
- Log out.
- Access protected pages only after authentication.

Passwords must be hashed using Laravel's secure password hashing facilities.

## Authorization

Role-based middleware will protect routes.

The planned roles are:

```text
admin
organiser
speaker
attendee
```

Example access permissions:

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

### Important Security Decision

Public registration must only create attendee accounts.

Users must not be able to select `admin` or `organiser` from a registration form.

Administrator accounts should be created through a controlled seeder or by an authorised administrator.

---

# 16. Application Routes

The application will use Laravel's web routing system.

## 16.1 Public Routes

| Method | Route | Description |
|---|---|---|
| GET | / | Homepage |
| GET | /conferences | Browse conferences |
| GET | /conferences/{id} | View conference details |
| GET | /login | Login page |
| GET | /register | Registration page |

## 16.2 Authentication Routes

The authentication implementation will provide:

| Method | Route | Description |
|---|---|---|
| POST | /register | Create attendee account |
| POST | /login | Authenticate user |
| POST | /logout | Log out |

These routes may be provided by the chosen Laravel authentication implementation.

## 16.3 Administrator Routes

Protected by authentication and administrator middleware.

| Method | Route | Description |
|---|---|---|
| GET | /admin/dashboard | Admin dashboard |
| GET | /admin/users | List users |
| GET | /admin/users/create | Create user |
| POST | /admin/users | Store user |
| GET | /admin/users/{id}/edit | Edit user |
| PUT | /admin/users/{id} | Update user |
| DELETE | /admin/users/{id} | Delete user |

## 16.4 Organiser Routes

Protected by authentication and organiser middleware.

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

Additional resource routes:

```text
/organiser/venues
/organiser/sessions
/organiser/speakers
/organiser/registrations
```

## 16.5 Attendee Routes

Protected by authentication and attendee middleware.

| Method | Route | Description |
|---|---|---|
| GET | /attendee/dashboard | Attendee dashboard |
| GET | /attendee/conferences | Browse conferences |
| GET | /attendee/sessions | Browse sessions |
| POST | /attendee/sessions/{id}/register | Register for session |
| DELETE | /attendee/registrations/{id} | Cancel registration |
| GET | /attendee/registrations | View own registrations |

## 16.6 Speaker Routes

Protected by authentication and speaker middleware.

| Method | Route | Description |
|---|---|---|
| GET | /speaker/dashboard | Speaker dashboard |
| GET | /speaker/profile | View speaker profile |
| GET | /speaker/sessions | View assigned sessions |

## 16.7 Check-in Routes

| Method | Route | Description |
|---|---|---|
| GET | /organiser/registrations | View registered attendees |
| POST | /organiser/registrations/{id}/check-in | Check in attendee |

---

# 17. Controllers and Their Responsibilities

Controllers receive requests, interact with models and return responses or views.

| Controller | Responsibility |
|---|---|
| UserController | Manage system users. |
| ConferenceController | Manage conferences. |
| VenueController | Manage venues. |
| SessionController | Manage sessions. |
| RegistrationController | Handle registrations and cancellations. |
| SpeakerDashboardController | Display speaker information. |
| DashboardController | Display role-specific dashboard information. |
| ConferenceApiController | Return conference information as JSON. |

Controllers should not contain unnecessarily duplicated business logic.

The registration business rules should be handled through a reusable service class.

---

# 18. Blade Views and User Interface

The frontend will use Laravel Blade.

Blade allows dynamic data to be displayed using Laravel's template syntax.

Example:

```blade
<h1>Available Conferences</h1>

@foreach ($conferences as $conference)
    <div>
        <h2>{{ $conference->title }}</h2>

        <p>{{ $conference->description }}</p>

        <a href="{{ route('conferences.show', $conference) }}">
            View Conference
        </a>
    </div>
@endforeach
```

### Main Interface Pages

**Public pages**

- Homepage.
- Conference listing.
- Conference details.
- Login.
- Registration.

**Administrator pages**

- Admin dashboard.
- User management.
- Role management.

**Organiser pages**

- Organiser dashboard.
- Conference management.
- Venue management.
- Session management.
- Speaker management.
- Registration list.
- Attendance management.

**Speaker pages**

- Speaker dashboard.
- Speaker profile.
- Assigned sessions.

**Attendee pages**

- Attendee dashboard.
- Conference listing.
- Session listing.
- My registrations.
- Registration details.

---

# 19. JSON API

The lecturer requires at least one useful JSON endpoint.

The application will provide a conference listing endpoint.

### Endpoint

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

The endpoint should retrieve actual conference records from MySQL using Eloquent.

It must not simply return hardcoded demonstration data.

### Additional Endpoint

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

The API routes will be defined in `routes/api.php`.

For a fresh Laravel 12 installation, API routing can be installed using:

```bash
php artisan install:api
```

---

# 20. Validation and Error Handling

All user-submitted data must be validated on the server.

Examples:

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

Registration validation must also check:

- Whether the session exists.
- Whether the conference is published.
- Whether registration is still open.
- Whether the attendee has already registered.
- Whether the session has available capacity.
- Whether the attendee has another overlapping session.

---

# 21. Testing Strategy

The application must be tested using realistic scenarios.

### Required Test Cases

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

### Automated Testing

Laravel tests can be executed using:

```bash
php artisan test
```

Testing should use an isolated test database rather than deleting or modifying the team's development database.

---

# 22. Git and GitHub Team Workflow

The project uses Git and GitHub for version control.

**Repository:**

https://github.com/makos-757/conference-manager-php

### Main Branch

The `main` branch contains the stable integrated application.

Members should not directly push development work to `main`.

### Branch Structure

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

### Before Starting Work

```bash
git checkout main

git pull origin main
```

Create a feature branch:

```bash
git checkout -b feature/conference-management
```

### After Completing Work

Check changed files:

```bash
git status
```

Add the relevant files:

```bash
git add app/Http/Controllers/Organiser/ConferenceController.php
```

Commit the work:

```bash
git commit -m "feat: add conference management controller"
```

Push the feature branch:

```bash
git push -u origin feature/conference-management
```

Open a Pull Request on GitHub.

After review and approval, merge into `main`.

### Conventional Commit Examples

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

### Important Git Rules

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

# 23. Team Structure and Task Allocation

The project has eight members.

To ensure everyone contributes meaningfully, the application is divided into eight responsibilities grouped into four major development areas.

Each member has specific files and responsibilities.

| Member | Student Number | Primary Responsibility |
|---|---|---|
| Makokha Samuel | 204411 | Project Leader, Authentication and Authorization |
| Austin Omondi | 218839 | Conference Management |
| Larry Kosgey | 212858 | Database Design and Eloquent Models |
| Jeff Muiruri | 222174 | Venue and Session Management |
| Sean Mwangi | 220451 | Attendee Registration and Check-in |
| Stephen Njoroge | 223006 | Speaker Management |
| Maina Wilfred | 223605 | JSON API, Dashboard and Testing |
| Elvis Adachi | 212657 | Blade Views and Frontend Integration |

## 23.1 Samuel – Project Leader and Authentication

**Responsibilities:**

- Coordinate development.
- Manage project integration.
- Implement authentication.
- Implement role-based authorization.
- Configure middleware.
- Review team contributions.

**Primary files:**

```text
app/Http/Controllers/Auth/
app/Http/Middleware/RoleMiddleware.php
app/Http/Controllers/Admin/UserController.php
app/Models/User.php
bootstrap/app.php
routes/web.php
```

**Deliverables:**

- Working login and registration.
- Role-based access control.
- Protected application routes.
- User account management.

**Collaborates with:** Austin and Larry.

## 23.2 Austin – Conference Management

**Responsibilities:**

- Implement conference CRUD operations.
- Manage conference information.
- Implement conference search and filtering.
- Ensure organisers can manage their conferences.
- Validate conference dates and deadlines.

**Primary files:**

```text
app/Http/Controllers/Organiser/ConferenceController.php
app/Models/Conference.php
app/Policies/ConferencePolicy.php
app/Http/Requests/StoreConferenceRequest.php
app/Http/Requests/UpdateConferenceRequest.php
resources/views/organiser/conferences/
```

**Deliverables:**

- Create conferences.
- Display conferences.
- Update conferences.
- Delete conferences.
- Search and filter conferences.

**Collaborates with:** Samuel and Larry.

## 23.3 Larry – Database Design and Models

**Responsibilities:**

- Design the MySQL database.
- Create database migrations.
- Define foreign keys.
- Define database constraints.
- Implement Eloquent relationships.
- Prepare database seeders and factories.

**Primary files:**

```text
database/migrations/
database/seeders/
database/factories/
app/Models/Conference.php
app/Models/Venue.php
app/Models/Session.php
app/Models/SpeakerProfile.php
app/Models/SessionRegistration.php
```

**Deliverables:**

- Complete database schema.
- Working migrations.
- Correct table relationships.
- Seed data for demonstration.
- Database documentation.

**Collaborates with:** Samuel and all module developers.

## 23.4 Jeff – Venue and Session Management

**Responsibilities:**

- Implement venue CRUD operations.
- Implement session CRUD operations.
- Assign sessions to conferences and venues.
- Validate session dates and times.
- Prevent overlapping venue bookings.
- Ensure sessions have valid capacities.

**Primary files:**

```text
app/Http/Controllers/Organiser/VenueController.php
app/Http/Controllers/Organiser/SessionController.php
app/Models/Venue.php
app/Models/Session.php
app/Http/Requests/StoreVenueRequest.php
app/Http/Requests/StoreSessionRequest.php
resources/views/organiser/venues/
resources/views/organiser/sessions/
```

**Deliverables:**

- Venue management.
- Session management.
- Session scheduling.
- Venue conflict prevention.

**Collaborates with:** Larry and Austin.

## 23.5 Sean – Attendee Registration and Check-in

**Responsibilities:**

- Implement attendee session registration.
- Prevent duplicate registrations.
- Enforce session capacity.
- Enforce registration deadlines.
- Prevent overlapping attendee sessions.
- Implement registration cancellation.
- Implement attendance check-in.

**Primary files:**

```text
app/Http/Controllers/Attendee/RegistrationController.php
app/Http/Controllers/Organiser/RegistrationController.php
app/Models/SessionRegistration.php
app/Services/SessionRegistrationService.php
app/Http/Requests/RegisterForSessionRequest.php
app/Policies/RegistrationPolicy.php
resources/views/attendee/registrations/
resources/views/organiser/registrations/
```

**Deliverables:**

- Session registration.
- Duplicate registration prevention.
- Capacity enforcement.
- Registration cancellation.
- Attendance check-in.

**Collaborates with:** Larry and Jeff.

## 23.6 Stephen – Speaker Management

**Responsibilities:**

- Create and update speaker profiles.
- Associate speaker profiles with user accounts.
- Assign speakers to sessions.
- Support different speaker roles.
- Display assigned sessions.
- Implement speaker dashboard information.

**Primary files:**

```text
app/Models/SpeakerProfile.php
app/Http/Controllers/Speaker/
app/Http/Controllers/Organiser/SpeakerController.php
resources/views/speaker/
resources/views/organiser/speakers/
```

**Deliverables:**

- Speaker profile management.
- Speaker-to-session assignment.
- Speaker schedule.
- Speaker dashboard.

**Collaborates with:** Jeff and Larry.

## 23.7 Maina Wilfred – Dashboard, JSON API and Testing

**Responsibilities:**

- Implement the conference JSON endpoint.
- Implement the health-check endpoint.
- Develop basic dashboard summaries.
- Test application functionality.
- Test authorization and validation.
- Document API endpoints.

**Primary files:**

```text
app/Http/Controllers/Api/ConferenceApiController.php
app/Http/Controllers/DashboardController.php
routes/api.php
tests/Feature/
tests/Unit/
```

**Deliverables:**

- Working JSON endpoint.
- Health-check endpoint.
- Dashboard statistics.
- Feature tests.
- API documentation.

**Collaborates with:** Samuel and Sean.

## 23.8 Elvis Adachi – Blade Views and Frontend Integration

**Responsibilities:**

- Develop reusable Blade layouts.
- Develop navigation components.
- Build forms and tables.
- Develop role-specific dashboards.
- Connect views to controller data.
- Implement success and error messages.
- Ensure responsive and consistent styling.

**Primary files:**

```text
resources/views/layouts/
resources/views/components/
resources/views/auth/
resources/views/admin/
resources/views/organiser/
resources/views/speaker/
resources/views/attendee/
resources/css/app.css
resources/js/app.js
```

**Deliverables:**

- Main application layout.
- Navigation.
- Authentication pages.
- Role-specific interfaces.
- Conference forms and listings.
- Registration and attendance interfaces.

**Collaborates with:** All module developers.

---

# 24. File Ownership and Contribution Rules

This section is important because all eight members must make identifiable contributions to the GitHub repository.

## 24.1 File Ownership

Each member is responsible for the assigned files.

| Member | Main Files to Work On |
|---|---|
| Samuel | RoleMiddleware.php, UserController.php, authentication and access-control files |
| Austin | ConferenceController.php, conference validation and conference views |
| Larry | Migrations, seeders, factories and database relationships |
| Jeff | VenueController.php, SessionController.php and scheduling files |
| Sean | RegistrationController.php, SessionRegistrationService.php and registration files |
| Stephen | SpeakerController.php, SpeakerProfile.php and speaker views |
| Wilfred | ConferenceApiController.php, DashboardController.php and tests |
| Adachi | Blade layouts, components, dashboards and shared frontend styling |

## 24.2 How Each Member Should Work

For example, if Austin is working on conference management:

```bash
git checkout main

git pull origin main

git checkout -b feature/conference-management
```

He works on his assigned files:

```text
app/Http/Controllers/Organiser/ConferenceController.php

resources/views/organiser/conferences/index.blade.php

resources/views/organiser/conferences/create.blade.php

resources/views/organiser/conferences/edit.blade.php
```

After completing the functionality:

```bash
git status

git add app/Http/Controllers/Organiser/ConferenceController.php

git add resources/views/organiser/conferences/

git commit -m "feat: implement conference management"

git push -u origin feature/conference-management
```

He then opens a Pull Request.

The project leader or assigned reviewer checks the implementation before merging.

## 24.3 Shared Files

Some files are required by several modules.

Examples:

```text
routes/web.php

routes/api.php

app/Models/User.php

bootstrap/app.php

database/seeders/DatabaseSeeder.php
```

These files should have designated maintainers.

Other members should request or coordinate changes instead of independently overwriting them.

## 24.4 Individual Contribution Evidence

Every member should:

- Work on their assigned module.
- Commit changes using their own GitHub account.
- Use descriptive commit messages.
- Push feature branches.
- Submit Pull Requests.
- Participate in code reviews.
- Test their functionality.
- Explain their implementation during the demonstration.

The goal is to maintain a clear development history showing the contribution of all eight members.

---

# 25. Three-Week Development Plan

The project will follow the lecturer's three-week development schedule.

## Week 1 – Foundation and CRUD

**Objectives:**

- Finalise the approved project idea.
- Set up the Laravel project.
- Configure MySQL.
- Create migrations and models.
- Establish authentication.
- Implement initial role-based access.
- Create conference CRUD.
- Begin venue and session CRUD.
- Create initial Blade layouts.

**Expected deliverables:**

- Working Laravel application.
- Database connected.
- User authentication.
- Basic role management.
- Conference creation and listing.
- Initial session and venue management.

## Week 2 – Business Logic and Integration

**Objectives:**

- Complete conference CRUD.
- Complete venue and session CRUD.
- Complete speaker management.
- Implement attendee registration.
- Implement registration validation.
- Implement capacity restrictions.
- Prevent duplicate registrations.
- Implement registration deadlines.
- Prevent overlapping sessions.
- Implement attendance check-in.
- Integrate all Blade views.

**Expected deliverables:**

- Complete main application workflow.
- Working access restrictions.
- Working registration rules.
- Speaker management.
- Attendance functionality.

## Week 3 – Testing and Finalisation

**Objectives:**

- Implement JSON endpoints.
- Complete dashboard summaries.
- Test all major operations.
- Test invalid form submissions.
- Test unauthorized access.
- Test registration business rules.
- Fix application defects.
- Update README documentation.
- Review GitHub history.
- Prepare demonstration accounts.

**Expected deliverables:**

- Complete working application.
- Working JSON API.
- Tested business rules.
- Documentation.
- GitHub repository with progressive commits.
- Demonstration-ready application.

---

# 26. Environment Configuration

The `.env` file contains environment-specific configuration.

Example:

```env
APP_NAME=Convene
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=convene_db
DB_USERNAME=root
DB_PASSWORD=
```

The actual `.env` file must never be committed to GitHub.

The `.env.example` file should contain the necessary configuration keys without private credentials.

---

# 27. Security Considerations

The application should follow these security practices:

1. Use Laravel's password hashing mechanisms.
2. Protect private pages using authentication middleware.
3. Enforce role permissions on the server.
4. Validate all incoming form data.
5. Use CSRF protection on web forms.
6. Use Eloquent ORM and parameterised queries.
7. Prevent users from editing records belonging to other users without permission.
8. Prevent users from assigning themselves administrator privileges.
9. Validate uploaded files if file uploads are introduced.
10. Keep database credentials outside the Git repository.

---

# 28. Deployment and Submission

The initial development environment will be XAMPP with MySQL.

The application can run locally using:

```bash
php artisan serve
```

Before submission, ensure that:

- Composer dependencies are installable.
- Database migrations run successfully.
- Seeders insert demonstration records.
- The application can authenticate users.
- The main workflows work.
- The JSON endpoint returns valid data.
- The README contains setup instructions.
- The GitHub repository contains progressive development history.

### Required Submission Items

1. Complete Laravel source code.
2. GitHub repository link.
3. README documentation.
4. Database migrations.
5. Database seeders.
6. Demonstration user accounts.
7. Working application.

---

# 29. Final Project Checklist

## Application

- [ ] Laravel application runs successfully.
- [ ] MySQL database connection works.
- [ ] Users can register.
- [ ] Users can log in and log out.
- [ ] Administrator access works.
- [ ] Organiser access works.
- [ ] Speaker access works.
- [ ] Attendee access works.

## Conference Management

- [ ] Create conference.
- [ ] View conference.
- [ ] Update conference.
- [ ] Delete conference.
- [ ] Search conferences.

## Venue and Session Management

- [ ] Create venue.
- [ ] Update venue.
- [ ] Delete venue.
- [ ] Create session.
- [ ] Update session.
- [ ] Delete session.
- [ ] Validate session scheduling.

## Speaker Management

- [ ] Create speaker profile.
- [ ] Update speaker profile.
- [ ] Assign speakers to sessions.
- [ ] View assigned sessions.

## Registration and Attendance

- [ ] Register for a session.
- [ ] Prevent duplicate registration.
- [ ] Enforce session capacity.
- [ ] Enforce registration deadlines.
- [ ] Prevent overlapping sessions.
- [ ] Cancel registration.
- [ ] Check in attendees.

## Technical Requirements

- [ ] Server-side validation.
- [ ] Role-based authorization.
- [ ] Meaningful database relationships.
- [ ] Database migrations.
- [ ] Database seeders.
- [ ] Search or filtering.
- [ ] JSON API endpoint.
- [ ] Health-check endpoint.
- [ ] Automated or documented testing.
- [ ] Progressive Git commits.

## Submission

- [ ] README updated.
- [ ] GitHub repository accessible.
- [ ] All eight members have identifiable contributions.
- [ ] No private credentials committed.
- [ ] Application can be set up from scratch.
- [ ] All group members can explain their modules.

---

# 30. Team Members

| No. | Name | Student Number | Responsibility |
|---|---|---|---|
| 1 | Makokha Samuel | 204411 | Project Leader, Authentication |
| 2 | Austin Omondi | 218839 | Conference Management |
| 3 | Larry Kosgey | 212858 | Database Design |
| 4 | Jeff Muiruri | 222174 | Venue and Session Management |
| 5 | Sean Mwangi | 220451 | Registration and Check-in |
| 6 | Stephen Njoroge | 223006 | Speaker Management |
| 7 | Maina Wilfred | 223605 | Dashboard, API and Testing |
| 8 | Elvis Adachi | 212657 | Blade Views and Frontend Integration |

---

**Project Name:** Convene – Conference Management System

**Course:** Application Programming for the Internet

**Framework:** Laravel 12

**Project Type:** Laravel Group Web Application

**Development Approach:** Collaborative development using Git and GitHub.

**Project Objective:** To demonstrate the application of Laravel programming concepts through a working conference management application.

**Note:** This documentation describes the proposed project architecture and scope. The implementation will proceed after the lecturer approves the project idea.
