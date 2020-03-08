# Job interview assignment

## Preparations
 
Required
 - mysql root user with name: web and password: web
 - php

To create database and reset data run:

    php reset-data.php


## Run solution
To export the data from database and save to a file run:

    php export-data.php


##  What is next

file run should be secured by flock if run as cron job

Limit in database query is set to 10 in example and could be set to a much larger limit eg. 1000

Errors are just echoed. Actions should be considered.
