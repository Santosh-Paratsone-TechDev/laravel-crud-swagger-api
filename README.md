# Laravel CRUD Swagger API

A comprehensive Laravel REST API with Swagger documentation for managing Users, Products, and Orders with role-based access control.

## Quick Start

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL or SQLite
- Git

### Clone the Project

```bash
git clone https://github.com/Santosh-Paratsone-TechDev/laravel-crud-swagger-api.git
cd laravel-crud-swagger-api
```

### Local Setup Steps

#### 1. Install PHP Dependencies
```bash
composer install
```

#### 2. Configure Environment
```bash
cp .env.example .env
```

Edit `.env` file and configure:
```env
APP_NAME="Laravel CRUD Swagger API"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_crud_api
DB_USERNAME=root
DB_PASSWORD=
```

#### 3. Generate Application Key
```bash
php artisan key:generate
```

#### 4. Create Database & Run Migrations
```bash
# Create the database first (manually)
# Then run migrations:
php artisan migrate
```

#### 5. Seed Sample Data
```bash
php artisan db:seed
```

#### 6. Install & Build Frontend Assets (Optional)
```bash
npm install
npm run build
```

#### 7. Generate Swagger Documentation
```bash
php artisan l5-swagger:generate
```

#### 8. Start Development Server
```bash
php artisan serve
```

The application will be available at:
- **API Base URL**: http://localhost:8000/api
- **Swagger UI**: http://localhost:8000/api/documentation
- **Learning Page**: http://localhost:8000

---

## About This Project

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## API Features

- **User Management**: CRUD operations for users with role-based access
- **Product Management**: Create, Read, Update, Delete products (authenticated users)
- **Product Inventory**: Track product stock with quantity management
- **Role-Based Access Control**: Admin, user, and guest roles
- **API Documentation**: Interactive Swagger/OpenAPI documentation
- **Authentication**: Laravel Sanctum for API authentication
- **Database Migrations**: Easy database schema management
- **Seeders**: Sample data for testing and development

## API Documentation

Interactive API documentation is available at: **http://localhost:8000/api/documentation**

The Swagger UI provides:
- All available endpoints
- Request/response examples
- Parameter definitions
- Authentication setup

---

## API Endpoints

### Public Endpoints (No Authentication Required)

#### Users
- **GET** `/api/users` - List all users (paginated)
- **GET** `/api/users/{id}` - Get user details

#### Products
- **GET** `/api/products` - List all products (paginated)
- **GET** `/api/products/{id}` - Get product details

---

### Protected Endpoints (Authentication Required)

#### Users (Authenticated)
- **POST** `/api/users` - Create new user
- **PUT** `/api/users/{id}` - Update user
- **DELETE** `/api/users/{id}` - Delete user



### Product Model Structure

**File**: [app/Models/Product.php](app/Models/Product.php)

Fields:
- `id` - Primary key
- `user_id` - Foreign key (vendor/admin user)
- `name` - Product name (required, unique)
- `description` - Product description (optional)
- `price` - Product price (required, decimal)
- `stock` - Stock quantity (required, integer)
- `image` - Product image path (optional)
- `created_at`, `updated_at` - Timestamps

### Get All Products

**Endpoint**: `GET /api/products`

**Query Parameters**:
- `per_page` - Items per page (default: 15)

**Example**: `/api/products?per_page=10`

**Success Response** (200):
```json
{
  "data": [
    {
      "id": 1,
      "user_id": 1,
      "name": "Laptop Pro",
      "description": "High-performance laptop",
      "price": "1299.99",
      "stock": 50,
      "image": "/images/laptop.jpg",
      "created_at": "2026-02-06T10:30:00Z",
      "updated_at": "2026-02-06T10:30:00Z"
    }
  ],
  "links": {
    "first": "http://localhost:8000/api/products?page=1",
    "last": "http://localhost:8000/api/products?page=1",
    "prev": null,
    "next": null
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "path": "http://localhost:8000/api/products",
    "per_page": 15,
    "to": 1,
    "total": 1
  }
}
```

### Get Product by ID

**Endpoint**: `GET /api/products/{id}`

**Example**: `/api/products/1`

**Success Response** (200):
```json
{
  "id": 1,
  "name": "Laptop Pro",
  "description": "High-performance laptop",
  "price": "1299.99",
  "quantity": 50,
  "sku": "LAPTOP-001",
  "category": "Electronics",
  "created_at": "2026-02-06T10:30:00Z",
  "updated_at": "2026-02-06T10:30:00Z"
}
```

**Error Response** (404):
```json
{
  "message": "Not found"
}
```

### Protected Routes (Admin Only)
- `POST /api/users` - Create user
- `PUT /api/users/{id}` - Update user
- `DELETE /api/users/{id}` - Delete user

---

## Troubleshooting

### Database Connection Error
Ensure MySQL service is running and `.env` credentials are correct.

### Storage Permissions Error
```bash
php artisan storage:link
chmod -R 775 storage bootstrap/cache
```

### Clear Cache
```bash
php artisan optimize:clear
php artisan view:clear
php artisan config:clear
```

### Swagger Documentation Not Loading
```bash
php artisan l5-swagger:generate
php artisan l5-swagger:publish-config
```

---

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## Support

For issues and questions, please open a [GitHub Issue](https://github.com/Santosh-Paratsone-TechDev/laravel-crud-swagger-api/issues).

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


---

## Orders API & Swagger Notes

This project includes an `Order` and `OrderItem` API to manage customer orders. Below are quick references and notes about how the API is presented in the bundled Swagger UI.

- API Base URL: `http://localhost:8000/api`
- Swagger UI: `http://localhost:8000/api/documentation`

Important presentation notes:
- The Schemas/Models panel in the Swagger UI has been disabled to simplify the view. If you need to inspect schemas, open `storage/api-docs/api-docs.json` or re-enable models in the published view.
- Tags ordering has been preserved (AUTH, USERS, PRODUCTS, ORDER) to surface key groups first.

### Quick Order Endpoints Reference

- `GET /api/orders` — List orders (paginated). Returns `order_items` for each order.
- `GET /api/orders/{id}` — Get order details (includes `order_items`).
```

### Order Model Fields

- `id`, `user_id`, `total_amount`, `status`, `created_at`, `updated_at`

### OrderItem Model Fields

- `id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`

If you'd like, I can also add a short `curl` example or expand the README with sample authenticated requests for Orders.
