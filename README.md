# Web-Site Construction Company - Admin Panel (Laravel + MySQL)

## ✨ Features
* Admin panel for managing website content
* Admin authentication system
* Database migrations and seeding
* Dockerized development environment

## Default Admin Credentials
```
🔑 Login: admin
🔒 Password: password
```

## 🚀 Quick Start
### Prerequisites
```
        Docker & Docker Compose
        Git
```
### Installation
```
    git clone https://github.com/AlNech/construction_company.git
    cd construction_company
    make init
```

## ⚙️ Makefile Commands
| Command                 | Description                                                        |
|-------------------------|-----------------------------------------------------------------|
| `make init`             | Full setup (up + deps + db)                                 |
| `make up`            | Start Docker containers                                  |
| `make down`              | Stop containers                                      |
| `make composer-install`       | Install PHP dependencies                                             |
| `make npm-install`     | nstall Node.js dependencies                                                |
| `make npm-build`     | Production frontend build                                                 |
| `make npm-dev`     | Dev frontend build (Vite/HMR)                                                |
| `make seed`     | Seed database with test data                                                |
| `make migrate`     | Run database migrations                                                |
| `make cli`     | Access PHP CLI container                                                 |
| `make fpm`     | Access PHP-FPM container                                               |
| `make mysql`     | Access MySQL database                                                 |

## 🌐 Access
After installation:
```
    Website: http://localhost:8080

    Admin Panel: http://localhost/admin

    phpAdmin: http://localhost:8081
 ```   

