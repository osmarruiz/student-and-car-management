# Student and Car Management

## PHP CRUD Website with PHPMyAdmin Database

PHP University Basic Practice. This project is a PHP-based website that implements CRUD (Create, Read, Update, Delete) operations with a database managed through PHPMyAdmin and also with a serialized file, focusing on students and cars.

## Functionalities

- **Create:** Add new student and car records to the database.
- **Read:** View and search for information about stored students and cars.
- **Update:** Modify details of existing records.
- **Delete:** Remove student and car records from the database.
- **Search:** Find a specific element in the database.

## Project Branches

- **`main`:** This branch uses a file-based approach for storing data. Data is saved and loaded from a serialized file instead of a database. Useful for development or testing environments where a full database is not needed.

- **`database`:** This branch uses a PHPMyAdmin database to manage information about students and cars.

## Requirements

To run the project on the `main` branch:

- Web server (e.g., Apache)
- PHP (recommended version: 7.0 or higher)
- XAMPP

To run the project on the `database` branch:

- Web server (e.g., Apache)
- PHP (recommended version: 7.0 or higher)
- PHPMyAdmin (for managing the database)
- XAMPP

## Installation

### `main` Branch

1. Clone this repository and switch to the `main` branch:

    ```bash
    git clone https://github.com/osmarruiz/student-and-car-management
    cd student-and-car-management
    git checkout main
    ```

2. Configure your web server to point to the project directory.

3. Start the application.

### `database` Branch

1. Clone this repository and switch to the `database` branch:

    ```bash
    git clone https://github.com/osmarruiz/student-and-car-management
    cd student-and-car-management
    git checkout database
    ```

2. Configure your web server to point to the project directory.

3. Configure the database connection in the file with the appropriate details.

## Usage

1. Access the main page in your browser.

2. Set up the database with PHPMyAdmin and the SQL provided below.

3. Explore the CRUD options to manage student and car information.

## Database Configuration in project

In all files, the database configuration is independent:

```php
<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "registro";
$DB = new mysqli($host, $user, $pass, $db);

?>

```

## Database SQL

```sql
create database registro;
use registro;

CREATE TABLE `persona` (
  `carnet` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `edad` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `persona`
  ADD PRIMARY KEY (`carnet`);

CREATE TABLE `autos` (
  `id` int(11) NOT NULL,
  `placa` int(200) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `marca` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `autos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

