# Instruction on how to install the application.

## SYSTEM REQUIREMENTS

PHP 8.1+
MYSQL OR MariaDb installed

## Steps on how to get started
1) Clone the code into your local machine. After cloning the code, make sure to add an .env file at the root of the project. Take .env.example as an example.
2) Update the Database connection keys to match your setup.
3) On the root of the project, execute `composer install`
4) Run the migrations by executing `php artisan migrate`
5) (Optional) To add fake data to the database, execute the seeder `php artisan db:seed`
6) To start the server locally execute `php artisan serve`. This will provide the url of the project which you can open up in a browser.

## Testing
You can use POSTMAN to test all the routes of the app.

### List of APIs:
Domain example: http://127.0.0.1:8000 (This is an example domain. When running `php artisan serve` a domain will show up. Thats the domain that should be used.)

1) Get Books: GET: {domain}/api/books

2) Create Loans: POST: {domain}/api/loan
Request Body 
book_id: int
member_id: int

3) Return Loan: POST: {domain}/api/loans/{loan_id}/return
