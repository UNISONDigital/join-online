# Join online
UNISON's new join online journey, designed to ultimately replace the existing journey at join.unison.org.uk. 

This is a first pass on a basic functioning prototype, which will allow users to go through the form and have their details stored in the database at the end. It uses real workplace and employer data that UNISON holds to try and match applicants up to their workplace in a more systematised way than the existing system. 

The goal is for it to serve a template for a future agency to take over the ongoing delivery and maintenance of

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
- **TBC** Artisan command to update workplace and employer data from Salesforce

## Set up 
1. Clone repo
2. Create database called XXX and run `php artisan migrate:seed` 
3. Something something
