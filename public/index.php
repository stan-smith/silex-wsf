<?php

// web/index.php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

require_once __DIR__.'/../config/database.php';

$app['sql'] = new Blog\Sql(
    $config['server'],
    $config['database'],
    $config['id'],
    $config['password']
);


$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

$app->get('/hello/{name}', function ($name) use ($app) {
    return $app['twig']->render('hello.twig', array(
        'name' => $name,
    ));
});

$app->get('/', function () use ($app) {
    return include __DIR__.'/../pages/home.php';
});

$app->get('/shell', function () use ($app) {
    return include __DIR__.'/../pages/shell.php';
});

$app->post('/shell', function () use ($app) {
    return include __DIR__.'/../pages/shell.php';
});

$app->run();
