# Job interview assignment

## Preparations
 
System need to have
 - mysql user with name: web and password: web
 - php

- Run `php reset-data.php` to create database and reset data


## Run solution
- Run `php export-data.php` to export the data from database and save to a file


##  What is next

file run should be secured by flock if run as cron job

Limit in database query is set to 10 in example and could be set to a much larger limit eg. 1000

Errors are just echoed. Actions should be considered.
