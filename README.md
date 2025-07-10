
# Laravel Feedback API – Docker Setup

This is the backend API built with Laravel 12 and PHP 8.2, containerized using Docker.

---

## 🚀 Setup (Using Docker)

### 1. Build the image

```bash
docker build -t laravel-feedback-api .
```

### 2. Run the container

```bash
docker run -p 8000:8000 laravel-feedback-api
```

### 3. Access the API

Visit: [http://localhost:8000/api/feedback](http://localhost:8000/api/feedback)

---

## 🔧 Running Locally (Without Docker)

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Make sure your `.env` is configured with correct DB connection.

---

## 📦 Endpoints

- `POST /api/feedback` – Submit feedback
- `GET /api/feedback` – Get all feedback
