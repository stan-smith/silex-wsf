<?php
$data = array();

$articles = $app['sql']->query('SELECT * FROM  articles');
$data['articles'] = $articles->fetchAll();

return $app['twig']->render('home.twig', $data);

