<?php


const DB_HOST = 'localhost';


const DB_USER = 'root';


const DB_PASS = '';


const DB_NAME = 'wf3_php_intermediaire_anasaboushaar';


$db = new PDO(
    'mysql:host='. DB_HOST .';dbname='. DB_NAME,
    DB_USER,
    DB_PASS,
    [
      
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
       
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
       
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
