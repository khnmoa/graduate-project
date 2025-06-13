<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# 🚀 Graduation Project – Space Mission Control API

A RESTful Laravel 11 API for managing space mission data including telemetry, commands, payloads, and real-time integration with NASA APIs for asteroid tracking and solar radiation monitoring.

---

## 🛠 Features

- Laravel 11 API with Sanctum authentication  
- Admin/User roles and strict access control  
- Real-time integration with NASA Asteroid & Solar APIs  
- Modules: Telemetry, Payload, Power, GPS, OBC, Thermal & Control  
- AI Model trained with solar data to detect harmful radiation  
- Complete CRUD functionality with validation  
- Fully tested via Postman collection  

---

## 🧪 Technologies Used

- Laravel 11  
- Sanctum  
- MySQL  
- Postman  
- NASA APIs (NEO & POWER)  
- AI (basic ML training from NASA data)  

---

## 🔐 Security

- Role-based access (Admin/User)  
- Mission-based data isolation  
- Token-based authentication  
- Passwords hashed with Bcrypt  

---

## 📡 NASA Integration

- **Asteroid API (NEO):** Fetches and analyzes Near Earth Object data.  
- **Solar Radiation API (POWER):** Used to detect harmful solar levels and train ML model.  

---

## 🧠 AI Training

The collected data is used to train a basic machine learning model that classifies whether current space conditions are **safe** or **harmful** for satellite operations.

---

## 📂 Setup Instructions

```bash
git clone https://github.com/khnmoa/graduate-project.git
cd graduate-project
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
