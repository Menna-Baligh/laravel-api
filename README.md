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

