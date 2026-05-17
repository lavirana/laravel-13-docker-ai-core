# Laravel 13 + Docker + AI SDK Boilerplate

This is a cutting-edge development environment for building AI-powered web applications using **Laravel 13**.

## Tech Stack
- **Framework:** Laravel 13 (Latest)
- **Runtime:** PHP 8.3-FPM
- **Web Server:** Nginx (Alpine)
- **Database:** MySQL 8.0
- **Caching/Queue:** Redis
- **Frontend:** Node.js 20+ (Vite)
- **AI Integration:** Laravel AI SDK / OpenAI Client

## Docker Services
- `php`: Laravel Application Core
- `nginx`: Web Server (Port 8000)
- `mysql`: Database (Port 3307)
- `redis`: Fast Caching
- `phpmyadmin`: GUI for Database (Port 8080)

## Quick Start
1. Clone the repo: `git clone [your-repo-link]`
2. Start Docker: `docker compose up -d`
3. Install Dependencies: `docker compose exec php composer install`
4. Run Migrations: `docker compose exec php php artisan migrate`

## AI Features
Ready to integrate with Google Gemini and OpenAI. Check `app/Services/AIService.php` for implementation.