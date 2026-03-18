# Restaurant Menu Management API

## Overview

This project is a RESTful API designed to manage restaurants and their menu items.
It was developed as part of a technical assessment for HungryHub.

The implementation focuses on clean architecture, maintainability, and practical API design aligned with real-world backend systems.

---

## Tech Stack

* Laravel 13 (PHP ^8.4)
* MySQL ^8
* Laravel Sanctum (Token-based Authentication)
* Eloquent ORM
* PHPUnit (Feature Testing)

---

## Key Features

### Core Functionality

* Full CRUD operations for Restaurants
* Full CRUD operations for Menu Items
* One-to-many relationship between Restaurant and Menu Items

### Additional Capabilities

* Token-based authentication using Laravel Sanctum
* Pagination for listing endpoints
* Filtering menu items by category
* Search functionality by menu item name
* Centralized error handling with consistent API responses
* Basic feature test coverage

---

## System Design

The application follows a layered architecture to ensure separation of concerns:

* **Controller Layer**
  Handles HTTP requests and responses

* **Service Layer**
  Contains business logic and orchestration

* **Repository Layer**
  Manages data access and database interactions

* **Request Validation Layer**
  Handles input validation using Form Request classes

This structure improves code readability, testability, and scalability.

---

## Installation & Setup

```bash
git clone https://github.com/rawp-id/hungryhub-api.git
cd hungryhub-api

composer install

cp .env.example .env
php artisan key:generate
```

### Database Configuration

Update the `.env` file with your database credentials:

```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### Run Migrations & Seeders

```bash
php artisan migrate --seed
```

### Start Development Server

```bash
php artisan serve
```

---

## Authentication

This API uses token-based authentication via Laravel Sanctum.

### Default User

Email: test@hungryhub.com
Password: password123

### Login

```http
POST /api/login
```

### Authorization Header

```http
Authorization: Bearer {token}
Accept: application/json
```

---

## API Endpoints

### Restaurants

| Method | Endpoint              | Description                 |
| ------ | --------------------- | --------------------------- |
| GET    | /api/restaurants      | Retrieve all restaurants    |
| POST   | /api/restaurants      | Create a new restaurant     |
| GET    | /api/restaurants/{id} | Retrieve restaurant details |
| PUT    | /api/restaurants/{id} | Update a restaurant         |
| DELETE | /api/restaurants/{id} | Delete a restaurant         |

---

### Menu Items

| Method | Endpoint                         | Description         |
| ------ | -------------------------------- | ------------------- |
| GET    | /api/restaurants/{id}/menu_items | Retrieve menu items |
| POST   | /api/restaurants/{id}/menu_items | Create menu item    |
| PUT    | /api/menu_items/{id}             | Update menu item    |
| DELETE | /api/menu_items/{id}             | Delete menu item    |

---

## Filtering & Search

The API supports filtering and search via query parameters.

### Filter by Category

```http
GET /api/restaurants/{id}/menu_items?category=main
```

### Search by Name

```http
GET /api/restaurants/{id}/menu_items?search=nasi
```

### Combined Query

```http
GET /api/restaurants/{id}/menu_items?category=main&search=ayam
```

---

## Response Structure

### Successful Response

```json
{
  "message": "Success",
  "data": {}
}
```

### Error Response

```json
{
  "message": "Resource not found",
  "data": null
}
```

---

## Error Handling

The application implements centralized exception handling to ensure consistent API responses across all endpoints.
Internal error details are not exposed, ensuring better security and cleaner output.

---

## Testing

Run the test suite:

```bash
php artisan test
```

Test coverage includes:

* Authentication flow
* Restaurant endpoints
* Menu item filtering and search
* Validation scenarios

---

## Scalability Considerations

* Current search implementation uses SQL-based filtering (`LIKE`)
* Layered structure supports future migration to microservices if needed

---

## Future Improvements

* Integration with Elasticsearch for advanced search capabilities
* Background job processing (e.g., indexing) using queue workers
* Expanded unit and integration test coverage
* API documentation (OpenAPI / Postman)
* Containerization using Docker

---

## Running with Docker

This project includes a Docker setup for easy local development and consistent environment configuration.

### Requirements

* Docker
* Docker Compose

### Build & Run Containers

```bash
docker compose up -d --build
```

### Run Migrations & Seeders

```bash
docker exec -it restaurant_app php artisan migrate --seed
```

### Access Application

```
http://localhost:8000
```

---

### Environment Configuration (Docker)

Make sure your `.env` is configured to use the Docker database service:

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=restaurant_db
DB_USERNAME=user
DB_PASSWORD=root
```

---

### Stopping Containers

```bash
docker compose down
```

---

### Rebuild Without Cache (Optional)

```bash
docker compose build --no-cache
docker compose up -d
```

---

### Notes

* File permissions are automatically handled inside the container.
* The setup uses:

  * PHP 8.4 (FPM)
  * Nginx
  * MySQL 8
* Designed to reflect a production-like environment.

---

## Author

Rifky Aryo

---

## Notes

This project prioritizes clarity, maintainability, and alignment with real-world backend practices over unnecessary complexity.
