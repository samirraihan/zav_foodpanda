# Foodpanda App (SSO Consumer)

This project is the **consumer application** in a multi-login system.

Users authenticated in the Ecommerce App can automatically access this system without logging in again.

---

## 🚀 Tech Stack

* Laravel 12
* Laravel Breeze (Blade)
* Laravel Sanctum
* MySQL
* PHP 8+

---

## ⚙️ Installation

```bash
git clone https://github.com/samirraihan/zav_foodpanda.git
cd foodpanda-app
composer install
cp .env.example .env
php artisan key:generate
```

---

## 🗄️ Database Setup

Create database:

```
foodpanda_db
```

Update `.env`:

```
DB_DATABASE=foodpanda_db
```

Run migrations:

```bash
php artisan migrate
```

---

## ▶️ Run Project

```bash
php artisan serve --port=8080
```

Default:

```
http://foodpanda-app.test:8080
```

---

## 🔐 SSO Authentication Flow

When a guest visits a protected route:

1. Laravel redirects guest to Ecommerce app.
2. Ecommerce checks authentication.
3. Ecommerce returns with Sanctum token.
4. Foodpanda verifies token via API.
5. User is automatically logged in locally.

---

## 🔄 Important Routes

### SSO Check

```
GET /check-sso
```

Used to receive token and perform auto login.

---

### Dashboard (Protected)

```
GET /dashboard
```

Automatically triggers SSO if user is not logged in.

---

## 🔧 Environment Variables

```
ECOMMERCE_APP_URL=http://ecommerce-app.test
```

---

## 🧠 Architecture Note

Since browser sessions cannot be shared across domains, authentication is implemented using **redirect-based token exchange**, similar to OAuth SSO providers.

---

## 👨‍💻 Author

Samir Raihan – Laravel Multi Login Task – Hiring Assignment
