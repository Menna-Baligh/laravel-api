# Laravel RESTful API Learning Project 

> Note: This project is built for **learning purposes** only. 


**🛠 Tools Used:**  
![VS Code](https://img.shields.io/badge/VS%20Code-007ACC?style=for-the-badge&logo=visual-studio-code&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-F05440?style=for-the-badge&logo=laravel&logoColor=white) 
![Postman](https://img.shields.io/badge/Postman-FF6C37?style=for-the-badge&logo=postman&logoColor=white) 
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

## ✨ What I Learned

In this project, I learned how to:

- Build a **RESTful API** using Laravel.
- Perform **CRUD operations** on `posts`.
- Implement **authentication**.
- Protect routes using **middleware** (`auth:sanctum`).

## API Routes

### 🌼 Public Routes

- **Register** (get token):

```http
POST /register
```

- **Login** (get token):

```http
POST /login
```

- **Get all posts**:

```http
GET /posts
```

- **Get a post by ID**:

```http
GET /posts/{id}
```

- **Search posts by title**:

```http
GET /posts/search/{title}
```

### 🌟 Protected Routes (require token)

All routes below require `Authorization: Bearer {token}` header.

- **Create a post**:

```http
POST /posts
```

- **Update a post**:

```http
PUT /posts/{id}
```

- **Delete a post**:

```http
DELETE /posts/{id}
```

- **Logout** (delete token):

```http
POST /logout
```

## 🛠 How to Run the Project

1. **Clone the repository**:

```bash
git clone https://github.com/your-username/your-project.git
cd your-project
```

2. **Install dependencies**:

```bash
composer install
```

3. **Set up environment**:

```bash
cp .env.example .env
```

- Update your `.env` file with database credentials.

4. **Generate application key**:

```bash
php artisan key:generate
```

5. **Run migrations**:

```bash
php artisan migrate
```

6. **Start the development server**:

```bash
php artisan serve
```

7. **Test the API**:

- You can use **Postman** to send requests to the API routes above.
---
## 🚨 CSRF Token Mismatch Issue & Fix in Laravel Breeze

### **Problem**
When using **Laravel Breeze** for authentication, it works by default with **web sessions**.
- This means every POST, PUT, or DELETE request expects a **CSRF token** for security.
- If you try to make API requests (e.g., via Postman, SPA, or mobile apps), Laravel cannot verify the CSRF token, resulting in:

```
CSRF Token Mismatch
```

This happens because API requests are usually **stateless**, and Laravel cannot access the session data to validate the token.

---

### **Solution**
Follow these steps to fix the CSRF Token Mismatch when using API requests:

#### **Step 1: Separate API Routes**
- Create dedicated route files for API authentication (e.g., `guest.php` or `auth.php`).
- Include routes for **register, login, and logout**.
- Keeping API routes separate ensures they do not rely on web sessions.

#### **Step 2: Load Routes Under API Middleware**
- In Laravel 12, all routes are loaded through **bootstrap/app.php**.
- Make sure your API route files are loaded under the **API middleware group**.
- This makes the routes **stateless**, so Laravel does **not expect a CSRF token**.

#### **Step 3: Use Token-Based Authentication**
- For API requests, use **personal access tokens** (Laravel Sanctum) instead of session authentication.
- Include the token in the request headers for authentication.
- This eliminates the need for CSRF tokens entirely.

---

✅ **Result:**
- API requests for login, register, and logout now work **without CSRF errors**.
- Authentication becomes **stateless**, suitable for Postman, SPA, or mobile apps.
- Backend remains secure while being easier to interact with via API.


---
## 📦 Laravel-postman Package
To make testing easier, I installed the **yasin_tgh/laravel-postman** package.  
This package generates a **Postman Collection file from your Laravel API routes** that you can directly import into Postman.

### 🔗 Package Repository
[Laravel-Postman](https://github.com/yasintqvi/laravel-postman)

### 📥 Installation Steps
1. **Install the package**:
```bash
composer require --dev yasin_tgh/laravel-postman
```
2. **Publish the configuration file**:
```bash
php artisan vendor:publish --provider="YasinTgh\LaravelPostman\PostmanServiceProvider" --tag="postman-config"
```
3. **Generate the Postman collection file**:
```bash
php artisan postman:generate
```
   This will create a file like:
```
storage/postman/api_collection
```
4. **Import into Postman**:
   - Open **Postman**.
   - Click **Import**.
   - Select the generated file.
   - Done 🎉 — Now you have all API routes ready to test.
