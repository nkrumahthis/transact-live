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

## todo

- only one transaction updated has the styling at a time. update it so that it can be multiple at the same time.
- rearrange the transaction table to bubble up the recently updated transactions to the top of the table
- don't actually write stuff to databases
