<?php
session_start();

//Connexion à la BDD
$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}

//Selection de la base de données wsf-php
mysql_select_db('wsf-php', $link);

function __autoload($class_name) {
    include 'class/'.$class_name . '.php';
}

include('models/menu.php');

$page = $_GET['page'];

include('views/layout.php');
