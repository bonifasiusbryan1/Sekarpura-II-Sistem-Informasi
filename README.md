# 🛠️ Sekarpura II Sistem Informasi

<div align="center">
  
  <img src="public/sekarpura.png" alt="Sekarpura II" width="200"/>
  
  ### **A Laravel + MySQL app built for PT Angkasa Pura II (IT Non-Public Division).**  
Designed from real staff interviews to streamline internal operations: **Agenda (events & attachments)**, **Forum (threads, comments, likes, notifications)**, and **User/Role management**.
  
[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vitejs.dev/)
  
</div>

---

## ✨ Overview

> **My first professional internship project** to solve real problem at **PT Angkasa Pura II – IT Non-Public Division**.

Developed based on employee interviews and feedback. It has an attractive yet professional appearance. Team of 3 developers - I was responsible for database design and full-stack development of the agenda and user management modules.

## 🔧 Modules & Key Features

| 📦 Module | 🌟 Key Features | 📝 Description |
|:---------:|----------------|:---------------:|
| **📅 Agenda** <br> *(Events & Attachments)* | • Create, edit, delete events <br> • Drag-drop reschedule event <br> • Detailed event information view <br> • Upload, download, delete file attachments <br> • Today & upcoming agenda widgets <br> | Event management with file attachments |
| **🗣️ Forum** <br> *(Community Discussion)* | • Threaded discussion system <br> • Comments & likes interaction <br> • Real-time notifications to thread owners <br> • Status workflow (approved/pending/rejected) <br> • Search and filtering capabilities | Community forum with moderation |
| **👤 Users & Roles** <br> *(User Management)* | • Role-based access control mapping <br> • Profile customization (bio, image) <br> • User directory and listing <br> • Basic user management tools <br> • SSO integration ready <br> | User system with SSO support |

---

## 🛠️ Technology Stack

<div align="center">

### Backend
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)

### Frontend
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=flat-square&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat-square&logo=bootstrap&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=flat-square&logo=vite&logoColor=white)

</div>

---

## 📸 Application Screenshots

> **Using Dummy Data of Banking Case Study with Admin, Manager, an Staff Roles**.

<details>
<summary>🖼️ <strong>Click to view application interface</strong></summary>

<br>

<div align="center">

### ✈️ Landing Page
<img src="public/screenshots/landingpage.png" width="600" />

### 🔐 Authentication
<img src="public/screenshots/login.png" width="600" />

### 📊 Admin - Dashboard
<img src="public/screenshots/admin_dashboard.png" width="600" />

### 📊 Manager - Dashboard
<img src="public/screenshots/manager_dashboard.png" width="600" />

### 📊 Staff - Dashboard
<img src="public/screenshots/staff_dashboard.png" width="600" />

### 📋 Admin & Manager - Event Details
<img src="public/screenshots/adminManager_eventDetails.png" width="600" />

### 📋 Staff - Event Details
<img src="public/screenshots/staff_eventDetails.png" width="600" />

### ⏰ Admin & Manager - Add Event
<img src="public/screenshots/adminManager_addEvent.png" width="600" />

### 🔗 Admin & Manager - Attachments
<img src="public/screenshots/adminManager_attachments.png" width="600" />

### 🔗 Staff - Attachments
<img src="public/screenshots/staff_attachments.png" width="600" />

### 💭 Threads
<img src="public/screenshots/threads.png" width="600" />

</div>

</details>

---

## 🚀 Quick Start Guide

### Prerequisites
- 🐘 **PHP 8.1+**
- 🎵 **Composer**
- 🗄️ **MySQL 8.0+**
- 📦 **Node.js & NPM**

### Installation

```bash
# 📥 Clone the repository
git clone https://github.com/bonifasiusbryan1/Simple-Student-Monitoring-System.git
cd Simple-Student-Monitoring-System

# 📦 Install dependencies
composer install && npm install

# ⚙️ Environment setup
cp .env.example .env
# Configure your database settings in .env

# 🗄️ Database setup
mysql -u root -p -e "CREATE DATABASE monitoring_mahasiswa;"
mysql -u root -p monitoring_mahasiswa < monitoring_mahasiswa.sql

# 🔑 Generate application key
php artisan key:generate

# 🔗 Create storage symlink
php artisan storage:link

# 🚀 Launch the application
php artisan serve
```

### 🌐 Access the Application
Open your browser and navigate to: `http://127.0.0.1:8000`

---

## 📂 Project Structure

```
Simple-Student-Monitoring-System/
├── 📁 app/                 # Application core files
├── 📁 database/            # Database migrations & seeds
├── 📁 public/              # Public assets & screenshots
├── 📁 resources/           # Views, CSS, JS resources
├── 📁 routes/              # Application routes
└── 📄 monitoring_mahasiswa.sql  # Database schema
```

</div>
