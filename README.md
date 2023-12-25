# TransactLive

Live real-time transaction management system in laravel.

## requirements

- php >= 8
- mysql >= 8

## set up

```bash
cp .env.example .env
php artisan migrate
php artisan db:seed --class=TransactionSeeder
php artisan app:simulate

```
