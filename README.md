# Customer CRUD with PHP Slim

Mini PHP app to list customers built with PHP Slim 3, Slim/PDO, MySQL and Bootstrap.

## Basic functions

 - View/Add/Edit/Delete Customers
 - Search Customers

## Database structure

 Single table MySQL database with customer information.

  id | int
  join_date | timestamp
  first_name | varchar
  last_name | varchar
  company | varchar
  job_title | varchar
  email | varchar
  phone | varchar
  website | varchar

  Database dump located at ~sql/schema.sql

  Update database information at ~app/settings.php

## Basic project structure

    /wwwroot
    |~app/
    | |Customers/
    |~public/
    |~sql/
    |~templates/
    |~tests/
    |~vendor/