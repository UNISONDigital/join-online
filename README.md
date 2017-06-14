# Join online
UNISON's new join online journey, designed to ultimately replace the existing journey at join.unison.org.uk. 

This is a first pass on a basic functioning prototype, which will allow users to go through the form and have their details stored in the database at the end. It uses real workplace and employer data that UNISON holds to try and match applicants up to their workplace in a more systematised way than the existing system. 

The goal is for it to serve a template for a future agency to take over the ongoing delivery and maintenance of the final product. 

## Tech overview
- Laravel 5.4 application
- Postgres database
- Routes:
  - Members joined in the last seven days 
  - Validate national insurance number and check for previous membership
  - List potential employers based on email domain name
  - List potential workplaces based on email domain name and postcode 
  - Convert salary to UNISON subscription band 
  - Submit all final form details 
- **TBC** Commands to:
  - Update workplace and employer data from Salesforce
  - Dump completed sign-ups to CSV

## Set up 
1. Clone repo
2. `composer install`
3. `php artisan key:generate`
4. `php artisan migrate:seed`
5. `php artisan serve`
6. Visit `localhost:8000`

## Assets (css/js)
1. `npm install`
2. `npm run dev` or `npm run watch`

For further information - [https://laravel.com/docs/5.4/mix](https://laravel.com/docs/5.4/mix)