# Ashkanet Inventory - Backend

This repository contains the Laravel-based backend API for the Ashkanet Inventory Management System. It handles inventory tracking, stock adjustments, and history logging.

> **Note:** This documentation covers the Backend API only. The Vue.js frontend is documented separately.

## 🚀 Features

- **Item Management**: Add and maintain inventory items with granular units.
- **Stock Control**: Deduct stock levels with validation (prevents negative stock).
- **History Tracking**: Automatically logs every "Add" or "Deduct" action for auditing.
- **Search**: basic search functionality for inventory items.

## 🛠 Tech Stack

- **Framework**: [Laravel 12.x](https://laravel.com)
- **Language**: PHP 8.2+
- **Database**: MySQL 
- **Authentication**: Laravel Fortify (Session/Cookie based)

## 📋 Prerequisites

Ensure you have the following installed on your local machine:
- [PHP](https://www.php.net/) >= 8.2
- [Composer](https://getcomposer.org/)

## ⚙️ Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd ashkanet-inventory-laravel-vue
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Environment Configuration**
   Copy the example environment file:
   ```bash
   cp .env.example .env
   ```
   *Note: configure your database settings in `.env` if not using the default SQLite.*

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**
   Set up the database tables:
   ```bash
   php artisan migrate
   ```

## 🏃‍♂️ Running the Application

To start the local development server:

```bash
php artisan serve
```

The API will be available at `http://localhost:8000`.

## 🔌 API Endpoints

The backend exposes several routes for managing inventory. Note that these routes are currently protected by `auth` middleware in the web group.

### Inventory

| Method | Endpoint                 | Description                                      | Parameters |
|:-------|:-------------------------|:-------------------------------------------------|:-----------|
| `GET`  | `/inventory`             | Retrieve all inventory items (Sorted by Name).   | -          |
| `POST` | `/inventory/add`         | Add stock to an item (Creates item if new).      | `name`, `unit`, `quantity` |
| `POST` | `/inventory/deduct`      | Deduct stock from an existing item.              | `item_id`, `quantity` |
| `GET`  | `/inventory/search`      | Search for items by name.                        | `query`    |
| `GET`  | `/inventory/{id}/history`| View simple audit history for a specific item.   | -          |

### Example Requests

**Add Item**
```http
POST /inventory/add
Content-Type: application/json

{
    "name": "Widget A",
    "unit": "pcs",
    "quantity": 100
}
```

**Deduct Item**
```http
POST /inventory/deduct
Content-Type: application/json

{
    "item_id": 1,
    "quantity": 5
}
```

## 🧪 Testing

Run the included feature/unit tests using Artisan:

```bash
php artisan test
```

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
