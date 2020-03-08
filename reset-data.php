<?php

$connection = new mysqli('localhost', 'web', 'web');
$connection->query('drop database if exists cego_solution');
$connection->query('create database cego_solution character set utf8mb4 collate utf8mb4_unicode_ci');
$connection->query('use cego_solution');
$connection->multi_query(file_get_contents(__DIR__ . '/sqldump.sql'));

if (file_exists(__DIR__ . '/users.cvs')) {
    unlink(__DIR__ . '/users.cvs');
}
